<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 23.01.18
 */

namespace Webfoersterei\HetznerCloudApiClient;


use Webfoersterei\HetznerCloudApiClient\Model\Action\GetAllResponse as GetAllActionsResponse;
use Webfoersterei\HetznerCloudApiClient\Model\Action\GetResponse as GetActionResponse;
use Webfoersterei\HetznerCloudApiClient\Model\Server\GetAllResponse as GetAllServersResponse;

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
    public function getAction($id): GetActionResponse;

    /**
     * @return GetAllServersResponse
     */
    public function getServers(): GetAllServersResponse;

}