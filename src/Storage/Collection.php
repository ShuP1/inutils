<?php

namespace Inutils\Storage;

/** Simple Collection */
class Collection
{
    /** Collection Data */
    protected $data = [];

    /**
     * Create new Collection
     *
     * @param array $items Items to add here
     */
    public function __construct(array $items = [])
    {
        $this->replace($items);
    }

    /** Set or Override a Value */
    public function set(string $key, $value)
    {
        $this->data[$key] = $value;
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
        return $this->has($key) ? $this->data[$key] : $default;
    }

    /**
     * Check if a Key exists
     *
     * @param string $key
     * @return bool
     */
    public function has(string $key)
    {
        return array_key_exists($key, $this->data);
    }

    /**
     * Set an array
     *
     * @param array $items
     */
    public function replace(array $items)
    {
        foreach ($items as $key => $value) {
            $this->set($key, $value);
        }
    }

    /**
     * Remove a Key
     *
     * @param string $key
     */
    public function remove(string $key)
    {
        unset($this->data[$key]);
    }

    /**
     * Get Collection Raw Data
     *
     * @return array
     */
    public function getAll()
    {
        return $this->data;
    }

    /** Remove All Keys */
    public function clear()
    {
        $this->data = [];
    }
}
