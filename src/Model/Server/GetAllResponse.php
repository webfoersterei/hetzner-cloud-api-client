<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 24.01.18
 */

namespace Webfoersterei\HetznerCloudApiClient\Model\Server;


use Webfoersterei\HetznerCloudApiClient\Model\ErrorResponse;
use Webfoersterei\HetznerCloudApiClient\Model\MetaResponseTrait;

class GetAllResponse extends ErrorResponse
{
    use MetaResponseTrait;

    /**
     * @var Server[]|null
     */
    public $servers;

}