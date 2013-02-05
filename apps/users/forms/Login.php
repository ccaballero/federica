<?php

class Users_Form_Login extends Zend_Form
{
    public function init() {
        $this->setMethod('post');

        $email = $this->createElement('text', 'email');
        $email->setRequired(true)
              ->setLabel('Correo electrónico')
              ->setAttrib('class', 'focus user')
              ->addFilter('StringTrim')
              ->addValidator('StringLength', false, array(0, 128));

        $password = $this->createElement('password', 'password');
        $password->setRequired(true)
                 ->setLabel('Contraseña')
                 ->setAttrib('class', 'key');

        $this->addElement($email);
        $this->addElement($password);
        $this->addElement('submit', 'submit', array('ignore' => true, 'label' => 'Acceder'));
    }
}
