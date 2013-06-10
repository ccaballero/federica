<?php

abstract class Yachay_Controller_List extends Yachay_Controller_Action
{
    protected function getCollection() {
        $adapter = new $this->_adapter();
        return $adapter->selectAll();
    }

    public function indexAction() {
        $this->view->container = new $this->_container();
        $this->view->component = new $this->_component();
        $this->view->collection = $this->getCollection();

        try {
            return $this->renderScript('containers/list-' . strtolower($this->_container) . '.php');
        } catch (Exception $e) {
            if (isset($this->_paginator)) {
                $this->view->pager = $this->_pager;
                return $this->renderScript('containers/list-paginator.php');
            } else {
                return $this->renderScript('containers/list.php');
            }
        }
    }

    public function managerAction() {
        $container = new $this->_container();

        if ($this->request->isPost()) {
            $task = '';
            $function = '';

            foreach ($container->getBatchOperations() as $operation) {
                $param = $this->request->getParam($operation->name);
                if (!empty($param)) {
                    $task = $operation->name;
                    $function = 'valid' . ucfirst($task);
                    break;
                }
            }

            if (!empty($task)) {
                $check = $this->request->getParam('check');
                $valid_checks = array();
                $adapter = new $this->_adapter();

                foreach ($check as $value) {
                    $resource = $adapter->findByIdent($value);
                    if (!empty($resource) && $adapter->{$function}($resource)) {
                        $valid_checks[] = $resource->ident;
                    }
                }

                $count = $adapter->{$task}($valid_checks);
                $this->_helper->flashMessenger->addMessage(
                    "Han sido modificados $count elementos");
            }

            $this->_redirect($this->view->currentUrl());
        }

        $this->view->container = $container;
        $this->view->component = new $this->_component();
        $this->view->collection = $this->getCollection();

        try {
            return $this->renderScript('containers/manager-' . strtolower($this->_container) . '.php');
        } catch (Exception $e) {
            return $this->renderScript('containers/manager.php');
        }
    }

    public function newAction() {
        $form = new $this->_editor();

        if ($this->request->isPost()) {
            if ($form->isValid($this->request->getPost())) {
                $method = 'get' . ucfirst($this->_type);
                $model = $form->$method();

                $adapter = new $this->_adapter();
                $object = $adapter->createRow();

                $reflect = new ReflectionObject($model);
                $properties = $reflect->getProperties(ReflectionProperty::IS_PUBLIC);
                foreach ($properties as $property) {
                    $key = $property->getName();
                    $object->$key = $model->$key;
                }

                // Hook, for customized params
                if (isset($this->_hook_new)) {
                    foreach ($this->_hook_new as $hook_param => $hook_value) {
                        $object->$hook_param = $hook_value;
                    }
                }

                $object->tsregister = time();
                $object->save();

                $this->_helper->flashMessenger->addMessage('El recurso ha sido creado correctamente');
                $this->_redirect($this->view->url(array(), $this->_route_manager));
            } else {
                $this->_helper->flashMessenger->addMessage('Se encontrarón algunos errores que deben ser corregidos');
            }
        }

        $this->view->form = $form;
        return $this->renderScript('containers/editor.php');
    }
}
