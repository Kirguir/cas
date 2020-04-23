<?php


namespace App\Entity;


use Exception;

/**
 * Description of Model
 */
class Model
{
    protected array $_attributes = [];

    public function getAttributes(): array
    {
        return $this->_attributes;
    }

    public function setAttributes(array $data = [])
    {
        foreach ($this->fields() as $attr) {
            if (array_key_exists($attr, $data)) {
                $this->_attributes[$attr] = $data[$attr];
            }
        }
    }

    /**
     * Return name attributes of Model
     */
    public function fields(): array
    {
        return [];
    }

    public function __get($name)
    {
        return isset($this->_attributes[$name]) ? $this->_attributes[$name] : NULL;
    }

    public function __set($name, $value)
    {
        if (in_array($name, $this->fields())) {
            $this->_attributes[$name] = $value;
        } else {
            throw new Exception('Undefined properties.');
        }
    }
}
