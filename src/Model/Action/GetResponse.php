<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 23.01.18
 */

namespace Webfoersterei\HetznerCloudApiClient\Model\Action;


use Webfoersterei\HetznerCloudApiClient\Model\ErrorResponse;

class GetResponse extends ErrorResponse
{
    /**
     * @var Action
     */
    public $action;
}