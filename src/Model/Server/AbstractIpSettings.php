<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 25.01.18
 */

namespace Webfoersterei\HetznerCloudApiClient\Model\Server;


abstract class AbstractIpSettings
{
    /**
     * @var string
     */
    public $ip;

    /**
     * @var bool
     */
    public $blocked;
}