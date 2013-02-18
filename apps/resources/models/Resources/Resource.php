<?php

class Resources_Resource
{
    public $ident;
    public $code;
    public $label;
    public $url;
    public $description1;
    public $description2;
    public $description3;
    public $capacity;
    public $shape;
    public $coords;
    public $tsregister;

    public function __toString() {
        return $this->label . ' [' . $this->code . ']';
    }
}
