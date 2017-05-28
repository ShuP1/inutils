<?php

namespace Inutils\Storage;

/** Simple Container */
class Container
{
    /** Container Data */
    protected $data = array();

    public function __construct(array $data = array())
    {
        $this->data = $data 
    }

    public function __get(string $name){
		if(array_key_exists($name, $this->data))
            return $this->data[$name];

		$trace = debug_backtrace();
        trigger_error(
            'Propriété non-définie via __get() : ' . $name .
            ' dans ' . $trace[0]['file'] .
            ' à la ligne ' . $trace[0]['line'],
            E_USER_NOTICE);
        return null;
	}

    public function __set(string $name, $value){
		$this->data[$name] = $value;
	}

    public function __isset(string $name)
    {
        return isset($this->data[$name]);
    }

    public function __unset(string $name)
    {
        unset($this->data[$name]);
    }
}
