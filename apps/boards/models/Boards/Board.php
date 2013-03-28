<?php

class Boards_Board
{
    public $ident;
    public $label;
    public $url;
    public $start_date;
    public $end_date;
    public $audience;
    public $description;
    public $tsregister;

    public function __toString() {
        return $this->label;
    }

    public function getUrl() {
        return $this->url;
    }
}
