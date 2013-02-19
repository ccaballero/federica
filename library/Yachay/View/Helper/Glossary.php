<?php

class Yachay_View_Helper_Glossary
{
    public function glossary($resource, $element, $value) {
        switch ($resource) {
            case 'room':
                switch ($element) {
                    case 'type':
                        switch ($value) {
                            case 'A': return 'Reservable';
                            case 'T': return 'Reservable por turnos';
                            case 'N': return 'No reservable';
                        }
                    break;
                }
            break;
        }
    }
}
