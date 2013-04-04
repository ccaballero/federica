<?php

class Events_Event
{
    public $ident;
    public $code;
    public $abstract;
    public $description;
    public $organizer;
    public $sponsor;
    public $charge;
    public $prominent;
    public $tsregister;

    public function __toString() {
        return $this->abstract;
    }

//    public function hasThumb() {
//        $thumb1 = APPLICATION_PATH . '/public/media/packages/rooms/' . $this->code . '-small.jpg';
//        $thumb2 = APPLICATION_PATH . '/public/media/packages/rooms/' . $this->code . '.jpg';
//
//        return file_exists($thumb1) && file_exists($thumb2);
//    }
}
