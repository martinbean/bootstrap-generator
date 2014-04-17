<?php
namespace MCB\Bootstrap\Generator\Entity;

abstract class Entity implements \JsonSerializable
{
    protected $properties = array();

    public function __set($key, $value)
    {
        $this->properties[$key] = $value;
    }

    public function __get($key)
    {
        if (false === (isset($this->properties[$key]))) {
            $message = sprintf('Property %s does not exist', $key);
            throw new \OutOfBoundsException($message);
        }

        return $this->properties[$key];
    }

    public function toArray()
    {
        return $this->properties;
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
