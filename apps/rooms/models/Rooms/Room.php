<?php

class Rooms_Room
{
    public $ident;
    public $code;
    public $label;
    public $type;
    public $description1;
    public $description2;
    public $description3;
    public $description4;
    public $capacity;
    public $shape;
    public $coords;
    public $tsregister;

    public function __toString() {
        return $this->label . ' [' . $this->code . ']';
    }
}
