<?php


namespace App\Repositories;

/**
 * Class Manager
 * @package App\Repositories
 */
abstract class Manager
{
    protected $db;
    protected $table;

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->db->totalCount;
    }

    /**
     * @return mixed
     */
    public function getDb()
    {
        return $this->db;
    }
}