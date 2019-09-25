<?php


namespace App\Validation;


use Pecee\Http\Request;

/**
 * Class Pagination
 * @package App\Validation
 */
class Pagination
{
    /** @var Request */
    private $request;

    /**
     * Pagination constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return (int)$this->request->getInputHandler()->value('page', 1);
    }
}