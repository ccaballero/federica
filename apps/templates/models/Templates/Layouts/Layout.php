<?php

class Templates_Layouts_Layout
{
    public $template;
    public $label;

    public function __toString() {
        return "{$this->template}-{$this->label}";
    }
}
