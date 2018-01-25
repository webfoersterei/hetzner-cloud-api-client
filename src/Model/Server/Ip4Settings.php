<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 25.01.18
 */

namespace Webfoersterei\HetznerCloudApiClient\Model\Server;


class Ip4Settings extends AbstractIpSettings
{
    /**
     * @var string
     */
    public $dns_ptr;
}