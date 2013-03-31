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

    public function setPost(Blog_Post $post) {
        $this->getElement('label')->setValue($post->label);
        $this->getElement('url')->setValue($post->url);
        $this->getElement('description')->setValue($post->description);
    }

    public function getPost() {
        $post = new Blog_Post();

        $post->label = $this->getElement('label')->getValue();
        $post->url = $this->getElement('url')->getValue();
        $post->description = $this->getElement('description')->getValue();

        return $post;
    }
}
