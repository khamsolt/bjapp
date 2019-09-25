<?php


namespace App\Validation;


/**
 * Class Pagination
 * @package App\Validation
 */
class Pagination extends BaseValidation
{
    /**
     * @return int
     */
    public function getPage(): int
    {
        return (int)$this->request->getInputHandler()->value('page', 1);
    }
}