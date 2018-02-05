<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 05.02.18
 */

namespace Webfoersterei\HetznerCloudApiClient\Model\Server;


use Webfoersterei\HetznerCloudApiClient\Model\ErrorResponse;

class ChangeNameResponse extends ErrorResponse
{

    /**
     * @var Server
     */
    public $server;

}