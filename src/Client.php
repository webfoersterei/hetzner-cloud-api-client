<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 23.01.18
 */

namespace Webfoersterei\HetznerCloudApiClient;


use Psr\Log\LoggerAwareTrait;
use Psr\Log\NullLogger;
use Symfony\Component\Serializer\SerializerInterface;
use Webfoersterei\HetznerCloudApiClient\Model\Action\GetAllResponse;
use Webfoersterei\HetznerCloudApiClient\Model\Action\GetResponse;

class Client implements ClientInterface
{
    use LoggerAwareTrait;

    public const FORMAT = 'json';

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var \GuzzleHttp\ClientInterface
     */
    private $httpClient;

    public function __construct(SerializerInterface $serializer, \GuzzleHttp\ClientInterface $httpClient)
    {
        $this->serializer = $serializer;
        $this->httpClient = $httpClient;

        $this->logger = new NullLogger();
    }

    /**
     * @inheritdoc
     */
    public function actionGetAll(): GetAllResponse
    {
        $this->logger->debug('Sending API-Request to get all actions');

        $httpResponse = $this->httpClient->request('GET', 'actions');

        $this->logger->debug('Response for all actions request', ['body' => $httpResponse->getBody()]);

        /** @var GetAllResponse $getAllResponse */
        $getAllResponse = $this->serializer->deserialize($httpResponse->getBody(), GetAllResponse::class, static::FORMAT);

        return $getAllResponse;
    }

    /**
     * @inheritdoc
     */
    public function actionGet($id): GetResponse
    {
        $this->logger->debug('Sending API-Request to get a single action', ['action_id' => $id]);

        $httpResponse = $this->httpClient->request('GET', sprintf('actions/%d', $id));

        $this->logger->debug('Response for single action request', ['body' => $httpResponse->getBody()]);

        /** @var GetResponse $getResponse */
        $getResponse = $this->serializer->deserialize($httpResponse->getBody(), GetResponse::class, static::FORMAT);

        return $getResponse;
    }


}