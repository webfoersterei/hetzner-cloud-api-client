<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 25.01.18
 */

namespace Webfoersterei\HetznerCloudApiClient\Model\Server;


class Image
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $status;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $description;

    /**
     * @var float|null
     */
    public $image_size;

    /**
     * @var float|null
     */
    public $disk_size;

    /**
     * @var \DateTime
     */
    public $created;

    /**
     * @var CreatedFrom|null
     */
    public $created_from;

    /**
     * @var int|null
     */
    public $bound_to;

    /**
     * @var string
     */
    public $os_flavor;

    /**
     * @var bool
     */
    public $rapid_deploy;
}