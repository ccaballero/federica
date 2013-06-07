<?php

class Roles_Role
{
    public $ident;
    public $label;
    public $description;
    public $tsregister;

    public function __toString() {
        return $this->label;
    }

    public function getUrl() {
        return $this->ident;
    }
}
