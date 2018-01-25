<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 24.01.18
 */

namespace Webfoersterei\HetznerCloudApiClient\Model\Server;


class Server
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
     * @var string
     */
    public $status;

    /**
     * @var \DateTime
     */
    public $created;

    /**
     * @var PublicNet|null
     */
    public $public_net;

    /**
     * @var int[]|null
     */
    public $floating_ips;

    /**
     * @var ServerType
     */
    public $server_type;

    /**
     * @var Datacenter
     */
    public $datacenter;

    /**
     * @var Image
     */
    public $image;

    /**
     * @var Iso|null
     */
    public $iso;

    /**
     * @var bool
     */
    public $rescue_enabled;

    /**
     * @var bool
     */
    public $locked;

    /**
     * @var string|null
     */
    public $backup_window;

    /**
     * @var int
     */
    public $outgoing_traffic;

    /**
     * @var int
     */
    public $ingoing_traffic;

    /**
     * @var int
     */
    public $included_traffic;
}