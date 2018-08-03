<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 30.01.18
 */

namespace Webfoersterei\HetznerCloudApiClient\Model\Server;


use Webfoersterei\HetznerCloudApiClient\Model\Action\Action;

class CreateResponse extends GetResponse
{

    /**
     * @var Action
     */
    public $action;

    /**
     * @var string|null
     */
    public $root_password;

}