<?php

class Rooms_Room
{
    public $ident;
    public $code;
    public $label;
    public $type;
    public $description;
    public $general_purpose;
    public $compatible_purpose;
    public $current_purpose;
    public $capacity;
    public $shape = 'rect';
    public $coords = '';
    public $tsregister;

    public function __toString() {
        return $this->label . ' [' . $this->code . ']';
    }
    
    public function getUrl() {
        return $this->code;
    }

    public function hasThumb() {
        $thumb1 = APPLICATION_PATH . '/public/media/packages/rooms/' . $this->code . '-small.jpg';
        $thumb2 = APPLICATION_PATH . '/public/media/packages/rooms/' . $this->code . '.jpg';

        return file_exists($thumb1) && file_exists($thumb2);
    }
}
