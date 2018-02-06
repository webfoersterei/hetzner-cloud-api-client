<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 06.02.18
 */

namespace Webfoersterei\HetznerCloudApiClient\Model\Pricing;


class Pricing
{

    /**
     * @var string
     */
    public $currency;

    /**
     * @var float|string
     */
    public $vat_rate;

    /**
     * @var Image
     */
    public $image;

    /**
     * @var FloatingIp
     */
    public $floating_ip;

    /**
     * @var Traffic
     */
    public $traffic;

    /**
     * @var ServerBackup
     */
    public $server_backup;

    /**
     * @var ServerType[]
     */
    public $server_types;

}