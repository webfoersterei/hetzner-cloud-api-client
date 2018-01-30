<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 30.01.18
 */

namespace Webfoersterei\HetznerCloudApiClient\Model\Server;


use Webfoersterei\HetznerCloudApiClient\Model\ErrorResponse;

class GetResponse extends ErrorResponse
{

    /**
     * @var Server
     */
    public $server;

}