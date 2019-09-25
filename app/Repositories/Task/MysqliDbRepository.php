<?php


namespace App\Repositories\Task;


use App\Data\Structure\ModelCollection;
use App\Models\Task;
use App\Repositories\Contracts\TaskInterface;
use App\Repositories\Manager as Repository;
use Exception;
use MysqliDb;

/**
 * Class MysqliDbRepository
 * @package App\Repositories\Task
 *
 * @method MysqliDb getDb()
 */
class MysqliDbRepository extends Repository implements TaskInterface
{
    /** @var string */
    protected $table = 'tasks';

    /**
     * MysqliDbRepository constructor.
     * @param MysqliDb $connection
     */
    public function __construct(MysqliDb $connection)
    {
        $this->db = $connection;
        $this->db->pageLimit = 3;
    }

    /**
     * @param array $columns
     * @param int $page
     * @return ModelCollection
     * @throws Exception
     */
    public function all(array $columns = [], int $page = 1): ModelCollection
    {
        return Task::createCollection($this->db->paginate($this->table, $page, $columns));
    }

    /**
     * @param array $columns
     * @param int $page
     * @param int $limit
     * @return ModelCollection
     * @throws Exception
     */
    public function latest(array $columns = [], int $page = 1): ModelCollection
    {
        return Task::createCollection($this->db->orderBy('created_at', 'DESC')->paginate($this->table, $page, $columns));
    }

    /**
     * @param array $columns
     * @param int $page
     * @param int $limit
     * @return ModelCollection
     * @throws Exception
     */
    public function oldest(array $columns = [], int $page = 1): ModelCollection
    {
        return Task::createCollection($this->db->orderBy('created_at', 'ASC')->paginate($this->table, $page, $columns));
    }

    /**
     * @param int $id
     * @param array $columns
     * @return Task
     * @throws Exception
     */
    public function findById(int $id, array $columns = []): ModelCollection
    {
        return Task::createCollection($this->db->where('id', $id)->get($this->table, 3, $columns));
    }

    /**
     * @param array $data
     * @return bool
     * @throws Exception
     */
    public function create(array $data): bool
    {
        $data['created_at'] = $this->db->now();
        $data['updated_at'] = $this->db->now();
        return $this->db->insert($this->table, $data);
    }

    /**
     * @param array $data
     * @return bool
     * @throws Exception
     */
    public function update(array $data): bool
    {
        $data['updated_at'] = $this->db->now();
        $this->db->where('id', $data['id']);
        return $this->db->update($this->table, $data);
    }
}