<?php

class Programs_Form_Editor extends Zend_Form
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

        $email = $this->createElement('text', 'email');
        $email->setRequired(false)
              ->setLabel('Correo electrónico:')
              ->addFilter('StringTrim')
              ->addFilter('StringToLower')
              ->addValidator('StringLength', false, array(4, 128))
              ->addValidator('EmailAddress');
        
        $description = $this->createElement('textarea', 'description');
        $description->setRequired(false)
            ->setLabel('Descripción:')
            ->setAttrib('class', 'ckeditor')
            ->addFilter('StringTrim');

        $this->addElement($label);
        $this->addElement($url);
        $this->addElement($email);
        $this->addElement($description);

        $this->addElement('submit', 'submit', array('ignore' => true, 'label' => 'Guardar'));
    }

    public function setProgram(Programs_Program $program) {
        $this->getElement('label')->setValue($program->label);
        $this->getElement('url')->setValue($program->url);
        $this->getElement('email')->setValue($program->email);
        $this->getElement('description')->setValue($program->description);
    }

    public function getProgram() {
        $program = new Programs_Program();

        $program->label = $this->getElement('label')->getValue();
        $program->url = $this->getElement('url')->getValue();
        $program->email = $this->getElement('email')->getValue();
        $program->description = $this->getElement('description')->getValue();

        return $program;
    }
}
