<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 24.01.18
 */

namespace Webfoersterei\HetznerCloudApiClient\Model;


class Error
{
    /**
     * @var string
     */
    public $code;

    /**
     * @var string|null
     */
    public $message;

    /**
     * @var array|null
     */
    public $details;

}