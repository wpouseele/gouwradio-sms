<?php

class Default_BerichtjesController extends Zend_Controller_Action
{

    public function init()
    {
        $this->view->activeData = $this->getRequest()->getControllerName();
    }

    public function indexAction()
    {
        // action body
    }


}

