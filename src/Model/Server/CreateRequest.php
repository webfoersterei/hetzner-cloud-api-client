<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 30.01.18
 */

namespace Webfoersterei\HetznerCloudApiClient\Model\Server;


use Symfony\Component\Serializer\Annotation\Groups;

class CreateRequest
{

    /**
     * @var string
     */
    public $name;

    /**
     * @var int|string
     */
    public $server_type;

    /**
     * @var int|string|null
     * @Groups()
     */
    public $datacenter;

    /**
     * @var int|string|null
     */
    public $location;

    /**
     * @var bool|null
     */
    public $start_after_create;

    /**
     * @var int|string
     */
    public $image;

    /**
     * @var string[]|null
     */
    public $ssh_keys;

    /**
     * @var string|null
     */
    public $user_data;

    /**
     * @var bool|null
     */
    public $automount;

    /**
     * @var int[]|null
     */
    public $volumes;
}