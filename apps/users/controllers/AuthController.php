<?php

class Users_AuthController extends Yachay_Controller_Action
{
    public function inAction() {
        $form = new Users_Form_Login();

        if ($this->request->isPost()) {
            if ($form->isValid($this->request->getPost())) {
                $config = Zend_Registry::get('config');
                $key = $config->site->key;

                $dbAdapter = Zend_Db_Table::getDefaultAdapter();
                $authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter);
                $authAdapter->setTableName('user')
                            ->setIdentityColumn('email')
                            ->setCredentialColumn('password')
                            ->setCredentialTreatment("SHA1(CONCAT('$key',?,'$key'))");

                $authAdapter->setIdentity($form->getElement('email')->getValue());
                $authAdapter->setCredential($form->getElement('password')->getValue());

                $auth = Zend_Auth::getInstance();
                $result = $auth->authenticate($authAdapter);

                if ($result->isValid()) {
                    $user = $authAdapter->getResultRowObject();
                    $auth->getStorage()->write($user);
                    $this->_redirect($this->view->url(array('page' => 'admin.html'), 'base_static'));
                } else {
                    $form->getElement('email')->addErrorMessage('Incorrect information')->markAsError();
                }
            }
        }

        $this->view->form = $form;
    }

    public function outAction() {
        Zend_Auth::getInstance()->clearIdentity();
        $this->_redirect($this->view->url(array(), 'base'));
    }
}
