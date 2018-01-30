<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 25.01.18
 */

namespace Webfoersterei\HetznerCloudApiClient\Model\Server;


class PublicNet
{

    /**
     * @var Ip4Settings|null
     */
    public $ipv4;

    /**
     * @var Ip6Settings|null
     */
    public $ipv6;

    /**
     * @var int[]
     */
    public $floating_ips;

}