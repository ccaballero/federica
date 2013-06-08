<?php

class Yachay_View_Helper_Normalize
{
    public function normalize($string) {
        $a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ';
        $b = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyyby';
        return utf8_encode(strtolower(
            strtr(utf8_decode($string), utf8_decode($a), $b)));
    }
}
