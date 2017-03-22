<?php

namespace Inutils\Storage;

use Inutils\Formater;

/** Collection with Normalized keys */
trait Normalizable
{
    /**
     * Get Normalized Data Array
     *
     * @return array
     */
    public function getAll()
    {
        $all = parent::getAll();
        $res = [];
        foreach ($all as $key => $raw) {
            $res[$key] = $raw['value'];
        }

        return $res;
    }

    /**
     * Get Data Array with Original Keys
     *
     * @return array
     */
    public function getAllOriginal()
    {
        $all = parent::getAll();
        $res = [];
        foreach ($all as $key => $raw) {
            $res[$raw['key']] = $raw['value'];
        }

        return $res;
    }

    /**
     * Get Raw Data Array
     *[normalizedKey [
     *  'key' => originalKey,
     *  'value' => value
     *]]
     *
     * @return array
     */
    public function getAllRaw()
    {
        return $this->data;
    }

    /** Set or Override a Value */
    public function set(string $key, $value)
    {
        parent::set(Formater::normalize($key), [
            'key' => $key,
            'value' => $value
        ]);
    }

    /**
     * Get a Value
     *
     * @param string $key
     * @param $default Value if key not found
     * @return value or $default
     */
    public function get(string $key, $default = null)
    {
        if ($this->has($key)) {
            return parent::get(Formater::normalize($key))['value'];
        }

        return $default;
    }

    /**
     * Get Original Key from any Format
     *
     * @param string $key
     * @param $default if key not found
     * @return Original Key or $default
     */
    public function getOriginal(string $key, $default = null)
    {
        if ($this->has($key)) {
            return parent::get(Formater::normalize($key))['key'];
        }

        return $default;
    }

    /**
     * Check if a Key exists
     *
     * @param string $key
     * @return bool
     */
    public function has(string $key)
    {
        return parent::has(Formater::normalize($key));
    }

    /**
     * Remove a Key
     *
     * @param string $key
     */
    public function remove(string $key)
    {
        parent::remove(Formater::normalize($key));
    }
}
