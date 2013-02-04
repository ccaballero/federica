<?php

class Templates_Regions_Region
{
    public $template;
    public $label;
    public $type;

    public function __toString() {
        return "{$this->template}-{$this->label}";
    }
}
