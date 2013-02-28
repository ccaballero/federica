<?php

class Blog_Post
{
    public $ident;
    public $label;
    public $url;
    public $date;
    public $description;
    public $published;
    public $tsregister;

    public function __toString() {
        return $this->label;
    }

    public function getUrl() {
        return $this->url;
    }
}
