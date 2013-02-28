<?php

class Blog_Form_Editor extends Zend_Form
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

        $description = $this->createElement('textarea', 'description');
        $description->setRequired(false)
            ->setLabel('Descripción:')
            ->setAttrib('class', 'ckeditor')
            ->addFilter('StringTrim');

        $this->addElement($label);
        $this->addElement($url);
        $this->addElement($description);

        $this->addElement('submit', 'submit', array('ignore' => true, 'label' => 'Guardar'));
    }

    public function setArea(Areas_Area $area) {
        $this->getElement('label')->setValue($area->label);
        $this->getElement('url')->setValue($area->url);
        $this->getElement('email')->setValue($area->email);
        $this->getElement('description')->setValue($area->description);
    }

    public function getArea() {
        $area = new Areas_Area();

        $area->label = $this->getElement('label')->getValue();
        $area->url = $this->getElement('url')->getValue();
        $area->email = $this->getElement('email')->getValue();
        $area->description = $this->getElement('description')->getValue();

        return $area;
    }
}