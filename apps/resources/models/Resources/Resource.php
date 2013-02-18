<?php

class Resources_Resource
{
    public $ident;
    public $code;
    public $label;
    public $url;
    public $description1;
    public $capacity;
    public $shape;
    public $coords;
    public $tsregister;

    public function __toString() {
        return $this->label . ' [' . $this->code . ']';
    }
}
