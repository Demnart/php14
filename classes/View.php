<?php


class View
{

    private $data=[];

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function display($temlate)
    {
        foreach ($this->data as $key=>$value)
        {
            $$key = $value;
        }

        include __DIR__ . '/../views/' . $temlate;
    }
}