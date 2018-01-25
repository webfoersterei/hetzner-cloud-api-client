<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 25.01.18
 */

namespace Webfoersterei\HetznerCloudApiClient\Model\Server;


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
     * @var string
     */
    public $description;

    /**
     * @var int
     */
    public $cores;

    /**
     * @var float
     */
    public $memory;

    /**
     * @var int
     */
    public $disk;

    /**
     * @var Price[]
     */
    public $prices;

    /**
     * @var string
     */
    public $storage_type;
}