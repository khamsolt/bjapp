<?php


namespace App\Data\Structure;


use App\Models\Model;
use ArrayObject;
use Closure;

/**
 * Class ModelCollection
 * @package App\Data\Structure
 */
class ModelCollection extends ArrayObject
{
    /**
     * @return Model
     */
    public function first(): Model
    {
        return $this[0];
    }

    /**
     * @param Closure $closure
     * @return ModelCollection
     */
    public function each(Closure $closure): self
    {
        foreach ($this as $key => $value) {
            $this[$key] = $closure($key, $this[$key]);
        }
        return $this;
    }
}