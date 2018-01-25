<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 25.01.18
 */

namespace Webfoersterei\HetznerCloudApiClient\Model\Server;


class Ip6Settings extends AbstractIpSettings
{

    /**
     * @var Ptr[]|null
     */
    public $dns_ptr;
}