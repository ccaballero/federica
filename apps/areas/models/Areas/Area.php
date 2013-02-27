<?php

class Areas_Area
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

//    public function hasThumb() {
//        $thumb1 = APPLICATION_PATH . '/public/media/packages/rooms/' . $this->code . '-small.jpg';
//        $thumb2 = APPLICATION_PATH . '/public/media/packages/rooms/' . $this->code . '.jpg';
//
//        return file_exists($thumb1) && file_exists($thumb2);
//    }
}
