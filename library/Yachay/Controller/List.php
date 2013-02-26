<?php

abstract class Yachay_Controller_List extends Yachay_Controller_Action
{
    public $adapter;
    public $container;

    abstract function getAdapter();
    abstract function getContainer();
    abstract function getResourceType();
    abstract function getEditor();

    public function getCollection() {
        $adapter = $this->getAdapter();
        return $adapter->selectAll();
    }

    public function indexAction() {
        $this->view->container = $this->getContainer();
        $this->view->collection = $this->getCollection();
        $this->view->resource_type = $this->getResourceType();

        try {
            return $this->renderScript('containers/' . $this->getResourceType() . '-list.php');
        } catch (Exception $e) {
            return $this->renderScript('containers/list.php');
        }
    }

    public function managerAction() {
        $container = $this->getContainer();

        if ($this->request->isPost()) {
            foreach ($container->getBatchOperations() as $operation) {
                $param = $this->request->getParam($operation->name);
                if (!empty($param)) {
                    $operation = $operation->name;
                    break;
                }
            }

            $check = $this->request->getParam("check");
            $valid_checks = array();
            $adapter = $this->getAdapter();

            foreach ($check as $value) {
                $resource = $adapter->findByIdent($value);
                if (!empty($resource)) {
                    if ($resource->type <> 'base') {
                        $valid_checks[] = $resource->ident;
                    }
                }
            }

            $count = $adapter->{$operation}($valid_checks);

            $this->_helper->flashMessenger->addMessage("Han sido modificados $count elementos");
            $this->_redirect($this->view->currentUrl());
        }

        $this->view->container = $container;
        $this->view->resource_type = $this->getResourceType();
        $this->view->collection = $this->getCollection();

        try {
            return $this->renderScript('containers/' . $this->getResourceType() . '-manager.php');
        } catch (Exception $e) {
            return $this->renderScript('containers/manager.php');
        }
    }

    public function newAction() {
        $form = $this->getEditor();

        if ($this->request->isPost()) {
            if ($form->isValid($this->request->getPost())) {
                // TODO
            }
        }

        $this->view->form = $form;
        return $this->renderScript('containers/editor.php');
    }
}
