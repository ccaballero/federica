<?php

class Yachay_View_Helper_Link
{
    public function link($text, $params, $route) {
        try {
            $url = new Zend_View_Helper_Url();
            $href= $url->url($params, $route);
            
            return "<a href=\"$href\">$text</a>";
        } catch (Exception $e) {
            return $text;
        }
    }
}
