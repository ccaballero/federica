<?php

class Regions_Region
{
    public $ident;
    public $label;
    public $package;
    public $type;

    public function __toString() {
        return "{$this->package}-{$this->label}";
    }
}
