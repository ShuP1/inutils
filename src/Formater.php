<?php

namespace Inutils;

/** Random Formating Functions */
class Formater
{
    /**
     * Normalize Key
     *
     * @param string $value
     * @return string
     */
    public static function normalize(string $value)
    {
        return strtr(strtolower($value), '_', '-');
    }
}
