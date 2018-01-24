<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 23.01.18
 */

namespace Webfoersterei\HetznerCloudApiClient\Model\Action;


class Action
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $command;
    /**
     * @var string
     */
    public $status;
    /**
     * @var int
     */
    public $progress;
    /**
     * @var \DateTime
     */
    public $started;
    /**
     * @var \DateTime|null
     */
    public $finished;
}