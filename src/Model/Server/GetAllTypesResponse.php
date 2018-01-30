<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 30.01.18
 */

namespace Webfoersterei\HetznerCloudApiClient\Model\Server;


use Webfoersterei\HetznerCloudApiClient\Model\ErrorResponse;
use Webfoersterei\HetznerCloudApiClient\Model\MetaResponseTrait;

class GetAllTypesResponse extends ErrorResponse
{
    use MetaResponseTrait;

    /**
     * @var ServerType[]
     */
    public $server_types;
}