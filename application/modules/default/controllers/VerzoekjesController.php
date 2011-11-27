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
        $message = $this->_em->find('Entities\Message',$id);
        
        $verzoekje = new Entities\Gouwradio();
		$verzoekje->setType('verzoek');
		$verzoekje->setNew(0);
		$verzoekje->setDeleted(0);
		$verzoekje->setRead(0);
		$verzoekje->setMessage($message);	
		$message->setGouwradio($verzoekje);
		
		$this->_em->persist($verzoekje);
		$this->_em->persist($message);
		$this->_em->flush();	
        
        // return to home
        $this->_redirect('/');
    }
	
	public function detailAction()
	{
		$id = $this->getRequest()->getParam('id');
        $verzoekje = $this->_em->find('Entities\Message',$id);
		
		if($verzoekje)
		{
			$this->view->verzoekje = $verzoekje;
			
			// set the previous unread message
			$previousVerzoekje = $this->_em->getRepository('Entities\Message')->getPreviousUnread('verzoek',$id);
			if($previousVerzoekje) $this->view->previous = end($previousVerzoekje)->getId();	// be sure to get the last entry in the array	
			
			// get the next unread message
			$nextVerzoekje = $this->_em->getRepository('Entities\Message')->getNextUnread('verzoek',$id);
			if($nextVerzoekje) $this->view->next = $nextVerzoekje[0]->getId();					// be sure to get the first entry in the array
			
		}
	}
}

