<?php

namespace Inutils\Storage;

use Inutils\Formater;

/** Simple Collection Of Array With Merge And Normalized Keys */
class NormalizedArrayCollection extends ArrayCollection
{
    use Normalizable{
        Normalizable::set as normSet;
    }

    /** Set or Override a Value */
    public function set(string $key, $value)
    {
        if (!is_array($value)) {
            $value = [$value];
        }
        $this->normSet($key, $value);
    }
}
