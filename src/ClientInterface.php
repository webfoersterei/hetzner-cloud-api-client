<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 23.01.18
 */

namespace Webfoersterei\HetznerCloudApiClient;


use Webfoersterei\HetznerCloudApiClient\Model\Action\GetAllResponse;
use Webfoersterei\HetznerCloudApiClient\Model\Action\GetResponse;

interface ClientInterface
{

    /**
     * @return GetAllResponse
     */
    public function getActions(): GetAllResponse;

    /**
     * @param int $id
     * @return GetResponse
     */
    public function getAction($id): GetResponse;

}