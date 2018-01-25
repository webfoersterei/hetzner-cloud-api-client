<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 23.01.18
 */

namespace Webfoersterei\HetznerCloudApiClient;


use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ClientFactory
{

    protected const AUTH_TYPE = 'Bearer';
    protected const API_URL = 'https://api.hetzner.cloud/v1/';

    public static function create($apiKey): Client
    {
        $config = [
            'base_uri' => static::API_URL,
            'headers' =>
                ['Authorization' => sprintf('%s %s', static::AUTH_TYPE, $apiKey)],
        ];
        $httpClient = new \GuzzleHttp\Client($config);

        $serializer = static::createSerializer();

        return new Client($serializer, $httpClient);
    }

    protected static function createSerializer()
    {
        $objectNormalizer = new ObjectNormalizer(null, null, null, new PhpDocExtractor());
        $normalizers = [new DateTimeNormalizer(), new ArrayDenormalizer(), $objectNormalizer];
        $encoders = [new JsonEncoder()];

        return new Serializer($normalizers, $encoders);
    }

}