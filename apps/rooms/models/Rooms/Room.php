<?php

class Rooms_Room
{
    public $ident;
    public $code;
    public $label;
    public $type;
    public $description;
    public $general_purpose;
    public $compatible_purpose;
    public $current_purpose;
    public $capacity;
    public $shape;
    public $coords;
    public $tsregister;

    public function __toString() {
        return $this->label . ' [' . $this->code . ']';
    }
}
