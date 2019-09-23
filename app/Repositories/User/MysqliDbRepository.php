<?php


namespace App\Repositories\User;


use App\Data\Structure\ModelCollection;
use App\Models\User;
use App\Repositories\Contracts\UserInterface;
use App\Repositories\Manager as Repository;
use Exception;
use MysqliDb;

/**
 * Class MysqliDbRepository
 * @package App\Repositories\User
 *
 * @property-read MysqliDb $db
 */
class MysqliDbRepository extends Repository implements UserInterface
{
    /** @var string */
    protected $table = 'users';

    /**
     * MysqliDbRepository constructor.
     * @param MysqliDb $connection
     */
    public function __construct(MysqliDb $connection)
    {
        $this->db = $connection;
        $this->db->pageLimit = 10;
    }

    /**
     * @param array $columns
     * @param int $page
     * @param int $limit
     * @return ModelCollection
     * @throws Exception
     */
    public function all(array $columns = []): ModelCollection
    {
        return User::createCollection($this->db->get($this->table));
    }

    /**
     * @param array $columns
     * @param int $page
     * @param int $limit
     * @return ModelCollection
     * @throws Exception
     */
    public function latest(array $columns = []): ModelCollection
    {
        return User::createCollection($this->db->orderBy('created_at', 'DESC')->get($this->table));
    }

    /**
     * @param array $columns
     * @param int $page
     * @param int $limit
     * @return ModelCollection
     * @throws Exception
     */
    public function oldest(array $columns = []): ModelCollection
    {
        return User::createCollection($this->db->orderBy('created_at', 'ASC')->get($this->table));
    }

    /**
     * @param int $id
     * @param array $columns
     * @return User
     * @throws Exception
     */
    public function findById(int $id, array $columns = []): User
    {
        return User::create($this->db->where('id', $id)->get($this->table, 3, $columns));
    }
}