<?php

namespace App\Repositories;

use App\Core\DB;

/**
 * Class BaseRepository
 * @package App\Repositories
 */
class BaseRepository
{
    /**
     * @var DB
     */
    protected $db;

    /**
     * NewsModule constructor.
     *
     * @param DB $db
     */
    public function __construct(DB $db)
    {
        $this->db = $db;
    }
}