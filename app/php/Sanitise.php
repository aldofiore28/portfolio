<?php

Class Sanitise
{
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function sanitise()
    {
        $data = $this->removeWhitespace($this->data);
        return $data;
    }

    public function removeWhitespace(array $data) :array
    {
        foreach ($data as $key => $value) {
            trim($value);
        }
        return $data;
    }
}
