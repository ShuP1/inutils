<?php

namespace Inutils\Storage;

/** Simple Collection Of Array With Merge */
class ArrayCollection extends Collection
{
    /** Set or Override a Value */
    public function set(string $key, $value)
    {
        if (!is_array($value)) {
            $value = [$value];
        }
        $this->data[$key] = $value;
    }

    /** Add Values To Key Array */
    public function add(string $key, $value)
    {
        $current = $this->get($key, []);
        $adds = is_array($value) ? $value : [$value];
        $this->set($key, array_merge($current, array_values($adds)));
    }
}
