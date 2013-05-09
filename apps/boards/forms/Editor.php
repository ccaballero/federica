<?php

class Boards_Form_Editor extends Zend_Form
{
    public function init() {
        $this->setMethod('post');

        $label = $this->createElement('text', 'label');
        $label->setRequired(true)
            ->setLabel('Nombre (*):')
            ->setAttrib('class', 'focus')
            ->addFilter('StringTrim')
            ->addValidator('StringLength', false, array(4, 64));

        $url = $this->createElement('text', 'url');
        $url->setRequired(true)
            ->setLabel('Url (*):')
            ->addFilter('StringTrim')
            ->addFilter('StringToLower')
            ->addValidator('StringLength', false, array(4, 64))
            ->addValidator('Alnum', false, array('allowWhiteSpace' => false));

        $area = $this->createElement('select', 'area');
        $area->setRequired(true)
             ->setLabel('Area (*):');
        
        $start_date = $this->createElement('text', 'start_date');
        $start_date->setRequired(false)
                   ->setAttrib('class', 'datepicker')
                   ->setLabel('Fecha de inicio:');

        $end_date = $this->createElement('text', 'end_date');
        $end_date->setRequired(false)
                 ->setAttrib('class', 'datepicker')
                 ->setLabel('Fecha de finalización:');

        $audience = $this->createElement('text', 'audience');
        $audience->setRequired(false)
                 ->setLabel('Beneficiarios:');

        $description = $this->createElement('textarea', 'description');
        $description->setRequired(false)
            ->setLabel('Descripción:')
            ->setAttrib('class', 'ckeditor')
            ->addFilter('StringTrim');

        $this->addElement($label);
        $this->addElement($url);
        $this->addElement($area);
        $this->addElement($start_date);
        $this->addElement($end_date);
        $this->addElement($audience);
        $this->addElement($description);

        $this->addElement('submit', 'submit', array('ignore' => true, 'label' => 'Guardar'));

        $db_areas = new Db_Areas();
        $areas = $db_areas->selectFullAll();
        $this->setAreas($areas);
    }

    public function setBoard(Boards_Board $board) {
        $this->getElement('label')->setValue($board->label);
        $this->getElement('url')->setValue($board->url);
        $this->getElement('start_date')->setValue($board->start_date);
        $this->getElement('end_date')->setValue($board->end_date);
        $this->getElement('audience')->setValue($board->audience);
        $this->getElement('description')->setValue($board->description);
    }

    public function getBoard() {
        $board = new Boards_Board();

        $board->label = $this->getElement('label')->getValue();
        $board->url = $this->getElement('url')->getValue();
        $board->start_date = $this->getElement('start_date')->getValue();
        $board->end_date = $this->getElement('end_date')->getValue();
        $board->audience = $this->getElement('audience')->getValue();
        $board->description = $this->getElement('description')->getValue();

        return $board;
    }

    public function setAreas($areas) {
        $element = $this->getElement('area');

        $element->addMultiOption(-1, str_repeat('-', 16));
        foreach ($areas as $area) {
            $element->addMultiOption($area->ident, $area);
        }
    }
}
