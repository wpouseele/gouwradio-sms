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
    	$id = $this->getRequest()->getParam('id');
        $verzoekje = $this->_em->find('Entities\Message',$id);
		
		//Doctrine\Common\Util\Debug::dump($verzoekje);
		
		$verzoekje->setType('verzoek');
		$verzoekje->setNew(0);
		$this->_em->persist($verzoekje);
		$this->_em->flush();		
        
        // return to the overview list
        //$this->_forward('index', 'index');
        //$this->_redirect('/');
    }


}

