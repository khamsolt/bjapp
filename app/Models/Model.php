<?php


namespace App\Models;


use App\Data\Structure\ModelCollection;
use ArrayObject;

abstract class Model extends ArrayObject
{
    /**
     * User constructor.
     * @param array $input
     */
    public function __construct(array $input = [])
    {
        parent::__construct($input, self::ARRAY_AS_PROPS, "ArrayIterator");
    }

    /**
     * @param array $data
     * @return ModelCollection
     */
    public static function createCollection(array $data): ModelCollection
    {
        $models = [];
        foreach ($data as $element) {
            $models[] = new static($element);
        }
        return new ModelCollection($models);
    }

    /**
     * @param array $data
     * @return static
     */
    public static function create(array $data): self
    {
        if (count($data) === count($data, COUNT_RECURSIVE)) {
            return new static($data[0]);
        }
        return new static($data);
    }
}