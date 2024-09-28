<?php

namespace Model;

use Traversable;

class PersonList implements \IteratorAggregate
{
    private array $array = [];
    public function __construct(array $array)
    {
        $this->array = $array;
    }
    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->array);
    }
}