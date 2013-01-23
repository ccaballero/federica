<?php

class Routes_Route extends Collections_Tree_Node_Default
{
    public $ident;
    public $label;
    public $description;
    public $route;
    public $mapping;
    public $module;
    public $controller;
    public $action;
    public $defaults;
    public $requirements;
    public $priority;
    public $parent;

    public function ident() {
        return $this->route;
    }

    public function parent() {
        return $this->parent;
    }
    
    public function __toString() {
        return $this->route;
    }
}
