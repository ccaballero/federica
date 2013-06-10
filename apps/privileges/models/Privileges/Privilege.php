<?php

class Privileges_Privilege
{
    public $ident;
    public $label;
    public $package;
    public $description;

    public function __toString() {
        return "[{$this->package}] {$this->label}";
    }

    public function getUrl() {
        return $this->ident;
    }
}
