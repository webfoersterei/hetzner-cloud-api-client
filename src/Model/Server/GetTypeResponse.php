<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 05.02.18
 */

namespace Webfoersterei\HetznerCloudApiClient\Model\Server;


use Webfoersterei\HetznerCloudApiClient\Model\ErrorResponse;

class GetTypeResponse extends ErrorResponse
{

    /**
     * @var ServerType
     */
    public $server_type;
}