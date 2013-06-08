<?php

class Privileges_Privilege
{
    public $ident;
    public $label;
    public $package;
    public $description;

    public function __toString() {
        return $this->label . ' [' . $this->package . ']';
    }

    public function getUrl() {
        return $this->ident;
    }
}
