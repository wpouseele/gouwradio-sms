<?php

class Default_AllesController extends Zend_Controller_Action
{

    public function init()
    {
        // Get a reference to the Doctrine Entity Mangager
    	$this->_em = $this->getInvokeArg('bootstrap')->em;
        
        // Set active menu
        $this->view->activeData = $this->getRequest()->getControllerName();
    }

    public function indexAction()
    {
        // action body
    }

    public function newAction()
    {
        // disable the layout
        $this->_helper->layout->disableLayout();
        $messages = $this->_em->getRepository('Entities\Message')->getNewMessages();
        $this->view->data = Zend_Json::encode($messages);
    }

}

