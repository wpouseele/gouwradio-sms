<?php

class Default_BerichtjesController extends Zend_Controller_Action
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
        $berichtjes = $this->_em->getRepository('Entities\Message')->getBerichtjes();
		if ($berichtjes)
		{
			$this->view->berichtjes = $berichtjes;
		}
		else 
		{
			$this->view->noBerichtjes = TRUE;			
		}
    }

	public function addAction()
    {
    	$id = $this->getRequest()->getParam('id');
        $message = $this->_em->find('Entities\Message',$id);
		
		$berichtje = new Entities\Gouwradio();
		$berichtje->setType('bericht');
		$berichtje->setNew(0);
		$berichtje->setDeleted(0);
		$berichtje->setRead(0);
		$berichtje->setMessage($message);
		$message->setGouwradio($berichtje);
		
		$this->_em->persist($berichtje);
		$this->_em->persist($message);
		$this->_em->flush();
        
        // return to home
        $this->_redirect('/');
    }
	
	public function detailAction()
	{
		$id = $this->getRequest()->getParam('id');
        $berichtje = $this->_em->find('Entities\Message',$id);
		
		if($berichtje)
		{
			$this->view->berichtje = $berichtje;
			
			// set the previous unread message
			$previousBerichtje = $this->_em->getRepository('Entities\Message')->getPreviousUnread('bericht',$id);
			if($previousBerichtje) $this->view->previous = end($previousBerichtje)->getId();	// be sure to get the last entry in the array	
			
			// get the next unread message
			$nextBerichtje = $this->_em->getRepository('Entities\Message')->getNextUnread('bericht',$id);
			if($nextBerichtje) $this->view->next = $nextBerichtje[0]->getId();					// be sure to get the first entry in the array
			
		}
	}
}

