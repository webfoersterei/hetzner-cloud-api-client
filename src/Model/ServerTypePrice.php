<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 25.01.18
 */

namespace Webfoersterei\HetznerCloudApiClient\Model;


class ServerTypePrice
{
    /**
     * @var string
     */
    public $location;

    /**
     * @var PriceDetail
     */
    public $price_hourly;

    /**
     * @var PriceDetail
     */
    public $price_monthly;

}