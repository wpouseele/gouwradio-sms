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
		$verzoekjes = $this->_em->getRepository('Entities\Message')->getVerzoekjes();
		if ($verzoekjes)
		{
			$this->view->verzoekjes = $verzoekjes;
		}
		else 
		{
			$this->view->noVerzoekjes = TRUE;			
		}
    }
    
    public function addAction()
    {
    	$id = $this->getRequest()->getParam('id');
        $verzoekje = $this->_em->find('Entities\Message',$id);
		
		$verzoekje->setType('verzoek');
		$verzoekje->setNew(0);
		$this->_em->persist($verzoekje);
		$this->_em->flush();		
        
        // return to home
        $this->_redirect('/');
    }
	
	public function detailAction()
	{
		
	}


}

