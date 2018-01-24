<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 24.01.18
 */

namespace Webfoersterei\HetznerCloudApiClient\Model\Meta;


class Pagination
{
    /**
     * @var int
     */
    public $page;

    /**
     * @var int
     */
    public $per_page;

    /**
     * @var int|null
     */
    public $previous_page;

    /**
     * @var int|null
     */
    public $next_page;

    /**
     * @var int
     */
    public $lastPage;

    /**
     * @var int
     */
    public $total_entries;

}