<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 23.01.18
 */

namespace Webfoersterei\HetznerCloudApiClient;


use Webfoersterei\HetznerCloudApiClient\Model\Action\GetAllResponse as GetAllActionsResponse;
use Webfoersterei\HetznerCloudApiClient\Model\Action\GetResponse as GetActionResponse;
use Webfoersterei\HetznerCloudApiClient\Model\Pricing\GetResponse as GetPriceResponse;
use Webfoersterei\HetznerCloudApiClient\Model\Server\ChangeNameResponse;
use Webfoersterei\HetznerCloudApiClient\Model\Server\CreateRequest;
use Webfoersterei\HetznerCloudApiClient\Model\Server\CreateResponse;
use Webfoersterei\HetznerCloudApiClient\Model\Server\DeleteResponse;
use Webfoersterei\HetznerCloudApiClient\Model\Server\GetAllResponse as GetAllServersResponse;
use Webfoersterei\HetznerCloudApiClient\Model\Server\GetAllTypesResponse;
use Webfoersterei\HetznerCloudApiClient\Model\Server\GetResponse as GetServerResponse;
use Webfoersterei\HetznerCloudApiClient\Model\Server\GetTypeResponse;

interface ClientInterface
{

    /**
     * @return GetAllActionsResponse
     */
    public function getActions(): GetAllActionsResponse;

    /**
     * @param int $id
     * @return GetActionResponse
     */
    public function getAction(int $id): GetActionResponse;

    /**
     * @return GetAllServersResponse
     */
    public function getServers(): GetAllServersResponse;

    /**
     * @param int $id
     * @return GetServerResponse
     */
    public function getServer(int $id): GetServerResponse;

    /**
     * @param CreateRequest $createRequest
     * @return CreateResponse
     */
    public function createServer(CreateRequest $createRequest): CreateResponse;

    /**
     * @param int $id
     * @return DeleteResponse
     */
    public function deleteServer(int $id): DeleteResponse;

    /**
     * @return GetAllTypesResponse
     */
    public function getServerTypes(): GetAllTypesResponse;

    /**
     * @param int $id
     * @return GetTypeResponse
     */
    public function getServerType(int $id): GetTypeResponse;

    /**
     * @param int $id
     * @param string $name
     * @return ChangeNameResponse
     */
    public function changeServerName(int $id, string $name): ChangeNameResponse;

    /**
     * @return GetPriceResponse
     */
    public function getPricing(): GetPriceResponse;
}