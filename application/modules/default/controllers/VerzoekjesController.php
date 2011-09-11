<?php

class Default_VerzoekjesController extends Zend_Controller_Action
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
        
    }
    
    public function addAction()
    {
        echo $this->getRequest()->getParam('id');
        
        
        // return to the overview list
        //$this->_forward('index', 'index');
        //$this->_redirect('/');
    }


}

