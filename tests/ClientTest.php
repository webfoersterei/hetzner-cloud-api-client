<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 30.01.18
 */

namespace Webfoersterei\HetznerCloudApiClient\Tests;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use function GuzzleHttp\Psr7\stream_for;
use PHPUnit\Framework\TestCase;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Serializer;
use Webfoersterei\HetznerCloudApiClient\Client;
use Webfoersterei\HetznerCloudApiClient\Model\Server\ChangeNameResponse;
use Webfoersterei\HetznerCloudApiClient\Model\Server\CreatedFrom;
use Webfoersterei\HetznerCloudApiClient\Model\Server\CreateRequest;
use Webfoersterei\HetznerCloudApiClient\Model\Server\Datacenter;
use Webfoersterei\HetznerCloudApiClient\Model\Server\GetAllResponse;
use Webfoersterei\HetznerCloudApiClient\Model\Server\Image;
use Webfoersterei\HetznerCloudApiClient\Model\Server\Ip4Settings;
use Webfoersterei\HetznerCloudApiClient\Model\Server\Ip6Settings;
use Webfoersterei\HetznerCloudApiClient\Model\Server\Iso;
use Webfoersterei\HetznerCloudApiClient\Model\Server\Location;
use Webfoersterei\HetznerCloudApiClient\Model\Server\Price;
use Webfoersterei\HetznerCloudApiClient\Model\Server\PriceDetail;
use Webfoersterei\HetznerCloudApiClient\Model\Server\Ptr;
use Webfoersterei\HetznerCloudApiClient\Model\Server\PublicNet;
use Webfoersterei\HetznerCloudApiClient\Model\Server\Server;
use Webfoersterei\HetznerCloudApiClient\Model\Server\ServerType;
use Webfoersterei\HetznerCloudApiClient\Normalizer\OmitNullObjectNormalizer;

class ClientTest extends TestCase
{

    public function testClientValidServerCreateSerialization()
    {
        $responseContent = stream_for(file_get_contents(__DIR__.'/Fixtures/serverCreateResponse_official.json'));
        $fakeResponse = new Response(200, ['Content-Type' => 'application/json'], $responseContent);

        $httpClient = $this->createGuzzleMock();
        $httpClient->expects($this->once())
            ->method('send')
            ->with($this->callback(function (Request $request) {
                $this->assertJsonStringEqualsJsonFile(__DIR__.'/Fixtures/serverCreateRequest_official.json',
                    $request->getBody()->getContents());

                return true;
            }))
            ->willReturn($fakeResponse);

        $createServerRequest = new CreateRequest();
        $createServerRequest->name = 'my-server';
        $createServerRequest->server_type = 'cx11';
        $createServerRequest->start_after_create = true;
        $createServerRequest->image = 'ubuntu16.04-standard-x64';
        $createServerRequest->ssh_keys = [2323];
        $createServerRequest->user_data = '``';

        $serializer = self::createSerializer();
        $client = new Client($serializer, $httpClient);

        $client->createServer($createServerRequest);
    }

    /**
     * @return \PHPUnit\Framework\MockObject\MockObject|\GuzzleHttp\Client
     */
    private function createGuzzleMock()
    {
        return $this->getMockBuilder(\GuzzleHttp\Client::class)->disableOriginalConstructor()
            ->setMethods(['send'])
            ->getMock();
    }

    private static function createSerializer()
    {
        $objectNormalizer = new OmitNullObjectNormalizer(null, null, null, new PhpDocExtractor());
        $normalizers = [new DateTimeNormalizer(), new ArrayDenormalizer(), $objectNormalizer];
        $encoders = [new JsonEncoder()];

        return new Serializer($normalizers, $encoders);
    }

    public function testClientValidServerRenameSerialization()
    {
        $responseContent = stream_for(file_get_contents(__DIR__.'/Fixtures/serverRenameResponse_official.json'));
        $fakeResponse = new Response(200, ['Content-Type' => 'application/json'], $responseContent);

        $httpClient = $this->createGuzzleMock();
        $httpClient->expects($this->once())
            ->method('send')
            ->with($this->callback(function (Request $request) {
                $this->assertJsonStringEqualsJsonFile(__DIR__.'/Fixtures/serverRenameRequest_official.json',
                    $request->getBody()->getContents());

                return true;
            }))
            ->willReturn($fakeResponse);

        $serializer = self::createSerializer();
        $client = new Client($serializer, $httpClient);

        $changeNameResponse = $client->changeServerName(1337, 'new-name');
        $this->assertInstanceOf(ChangeNameResponse::class, $changeNameResponse);
    }

    public function testClientValidServerGetAllDeserialization()
    {
        $expectedResponseContent = stream_for(file_get_contents(__DIR__.'/Fixtures/serversGetAll_official.json'));
        $fakeResponse = new Response(200, ['Content-Type' => 'application/json'], $expectedResponseContent);
        $httpClient = $this->createGuzzleMock();
        $httpClient->expects($this->once())->method('send')->willReturn($fakeResponse);

        $serializer = self::createSerializer();
        $client = new Client($serializer, $httpClient);

        $server1 = new Server();
        $server1->id = 42;
        $server1->name = 'my_server01';
        $server1->status = 'running';
        $server1->created = new \DateTime('2016-01-30T23:50+00:00');
        $server1->public_net = new PublicNet();
        $server1->public_net->ipv4 = new Ip4Settings();
        $server1->public_net->ipv4->ip = '1.2.3.4';
        $server1->public_net->ipv4->blocked = false;
        $server1->public_net->ipv4->dns_ptr = 'server01.example.com';
        $server1->public_net->ipv6 = new Ip6Settings();
        $server1->public_net->ipv6->ip = '2001:db8::/64';
        $server1->public_net->ipv6->blocked = false;
        $dnsPtr1 = new Ptr();
        $dnsPtr1->ip = '2001:db8::1';
        $dnsPtr1->dns_ptr = 'server.example.com';
        $server1->public_net->ipv6->dns_ptr = [$dnsPtr1];
        $server1->public_net->floating_ips = [478];
        $server1->server_type = new ServerType();
        $server1->server_type->id = 1;
        $server1->server_type->name = 'cx11';
        $server1->server_type->description = 'CX11';
        $server1->server_type->cores = 1;
        $server1->server_type->memory = 1;
        $server1->server_type->disk = 25;
        $price1 = new Price();
        $price1->location = 'fsn1';
        $price1->price_hourly = new PriceDetail();
        $price1->price_hourly->net = 1;
        $price1->price_hourly->gross = 1.19;
        $price1->price_monthly = new PriceDetail();
        $price1->price_monthly->net = 1;
        $price1->price_monthly->gross = 1.19;
        $server1->server_type->prices = [$price1];
        $server1->server_type->storage_type = 'local';
        $server1->datacenter = new Datacenter();
        $server1->datacenter->id = 1;
        $server1->datacenter->name = 'fsn1-dc8';
        $server1->datacenter->description = 'Falkenstein 1 DC 8';
        $server1->datacenter->location = new Location();
        $server1->datacenter->location->id = 1;
        $server1->datacenter->location->name = 'fsn1';
        $server1->datacenter->location->description = 'Falkenstein DC Park 1';
        $server1->datacenter->location->country = 'DE';
        $server1->datacenter->location->city = 'Falkenstein';
        $server1->datacenter->location->latitude = 50.47612;
        $server1->datacenter->location->longitude = 12.370071;
        $server1->image = new Image();
        $server1->image->id = 4711;
        $server1->image->type = 'system';
        $server1->image->status = 'available';
        $server1->image->name = 'ubuntu16.04-standard-x64';
        $server1->image->description = 'Ubuntu 16.04 Standard 64 bit';
        $server1->image->image_size = 2.3;
        $server1->image->disk_size = 10;
        $server1->image->created = new \DateTime('2016-01-30T23:50+00:00');
        $server1->image->created_from = new CreatedFrom();
        $server1->image->created_from->id = 1;
        $server1->image->created_from->name = 'Server';
        $server1->image->bound_to = 1;
        $server1->image->os_flavor = 'ubuntu';
        $server1->image->os_version = '16.04';
        $server1->image->rapid_deploy = false;
        $server1->iso = new Iso();
        $server1->iso->id = 4711;
        $server1->iso->name = 'FreeBSD-11.0-RELEASE-amd64-dvd1';
        $server1->iso->description = 'FreeBSD 11.0 x64';
        $server1->iso->type = 'public';
        $server1->rescue_enabled = false;
        $server1->locked = false;
        $server1->backup_window = '22-02';
        $server1->outgoing_traffic = 123456;
        $server1->ingoing_traffic = 123456;
        $server1->included_traffic = 654321;

        $expectedServerAllResponse = new GetAllResponse();
        $expectedServerAllResponse->servers = [$server1];

        $actualServerAllResponse = $client->getServers();

        $this->assertEquals($expectedServerAllResponse, $actualServerAllResponse);
    }

}
