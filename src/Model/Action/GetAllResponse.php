<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 23.01.18
 */

namespace Webfoersterei\HetznerCloudApiClient\Model\Action;


use Webfoersterei\HetznerCloudApiClient\Model\ErrorResponse;

class GetAllResponse extends ErrorResponse
{

    /**
     * @var Action[]|null
     */
    public $actions;
}