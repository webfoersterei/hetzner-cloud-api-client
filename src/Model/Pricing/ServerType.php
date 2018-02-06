<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 06.02.18
 */

namespace Webfoersterei\HetznerCloudApiClient\Model\Pricing;


use Webfoersterei\HetznerCloudApiClient\Model\ServerTypePrice;

class ServerType
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var ServerTypePrice[]
     */
    public $prices;
}