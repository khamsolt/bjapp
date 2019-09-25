<?php


namespace App\Validation;


use Pecee\Http\Request;

abstract class BaseValidation
{
    /** @var Request */
    protected $request;

    /**
     * Pagination constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}