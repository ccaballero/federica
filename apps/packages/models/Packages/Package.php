<?php

class Packages_Package
{
    public $ident;
    public $label;
    public $url;
    public $status;
    public $type;
    public $description;
    public $tsregister;

    public function __toString() {
        return $this->label;
    }
}
