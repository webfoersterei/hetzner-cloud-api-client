<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 23.01.18
 */

namespace Webfoersterei\HetznerCloudApiClient\Model\Action;


use Webfoersterei\HetznerCloudApiClient\Model\ErrorResponse;
use Webfoersterei\HetznerCloudApiClient\Model\MetaResponseTrait;

class GetAllResponse extends ErrorResponse
{
    use MetaResponseTrait;

    /**
     * @var Action[]|null
     */
    public $actions;
}