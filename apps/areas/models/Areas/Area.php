<?php

class Areas_Area
{
    public $ident;
    public $type;
    public $label;
    public $url;
    public $email;
    public $description;
    public $tsregister;

    public function __toString() {
        return $this->label;
    }

    public function getUrl() {
        return $this->url;
    }
}
