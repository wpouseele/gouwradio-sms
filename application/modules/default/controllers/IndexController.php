<?php

class Default_IndexController extends Zend_Controller_Action
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
        $messages = $this->_em->getRepository('Entities\Message')->getNewMessages();
		if($messages)
		{
			$this->view->messages = $messages;
		}
		else 
		{
			$this->view->noMessages = TRUE;			
		}
    }
}

