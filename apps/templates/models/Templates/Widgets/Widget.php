<?php

class Templates_Widgets_Widget
{
    public $template;
    public $label;
    public $type;

    public function __toString() {
        return "{$this->template}-{$this->label}";
    }
}
