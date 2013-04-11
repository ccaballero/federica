<?php

class Programs_Program
{
    public $ident;
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
