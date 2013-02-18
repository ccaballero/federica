<?php

class Yachay_View_Helper_None
{
    public function none($string = null, $pre = '', $post = '') {
        if (!empty($string)) {
            return $pre . $string . $post;
        } else {
            return '';
        }
    }
}
