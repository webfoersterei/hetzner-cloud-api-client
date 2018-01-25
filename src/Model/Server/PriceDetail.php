<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 25.01.18
 */

namespace Webfoersterei\HetznerCloudApiClient\Model\Server;


class PriceDetail
{
    /**
     * @var float|string
     */
    public $net;

    /**
     * @var float|string
     */
    public $gross;
}