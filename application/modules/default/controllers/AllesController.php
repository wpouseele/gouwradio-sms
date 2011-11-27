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
        $messages = $this->_em->getRepository('Entities\Message')->getMessages();
		if ($messages)
		{
			$this->view->messages = $messages;
		}
		else 
		{
			$this->view->noMessages = TRUE;			
		}
    }
	
	public function removeAction()
	{
		$id = $this->getRequest()->getParam('id');
		$message = $this->_em->find('Entities\Message',$id);
		
		if ($message)
		{
			// we don't have a gouwradio entity yet so create one first
			$message2 = new Entities\Gouwradio();
			$message2->setType('undefined');
			$message2->setNew(0);
			$message2->setDeleted(1);
			$message2->setRead(1);
			$message2->setMessage($message);
			$message->setGouwradio($message2);
			
			$this->_em->persist($message2);
			$this->_em->persist($message);
			$this->_em->flush();
        	
			// return to home
			$this->_redirect('/');
		}
	}
	
	public function markreadAction()
	{
		
		$id = $this->getRequest()->getParam('id');
		$type = $this->getRequest()->getParam('type');
        $message = $this->_em->find('Entities\Message',$id)->getGouwradio();
		
		if ($message)
		{
			$message->setRead(1);
			$this->_em->persist($message);
			$this->_em->flush();		
	        
	        // return to original
	        $this->_redirect('/'.$type.'/detail/id/'.$id.'/');
		}
	}
	
	public function markunreadAction()
	{
		
		$id = $this->getRequest()->getParam('id');
		$type = $this->getRequest()->getParam('type');
        $message = $this->_em->find('Entities\Message',$id)->getGouwradio();
		
		if ($message)
		{
			$message->setRead(0);
			$this->_em->persist($message);
			$this->_em->flush();		
	        
	        // return to original
	        $this->_redirect('/'.$type.'/detail/id/'.$id.'/');
		}
	}
	
	public function detailAction()
	{
		$id = $this->getRequest()->getParam('id');
        $message = $this->_em->find('Entities\Message',$id);
		
		if($message)
		{
			$this->view->message = $message;
			
			// set the previous unread message
			$previousMessage = $this->_em->getRepository('Entities\Message')->getPreviousUnread('alles',$id);
			if($previousMessage) $this->view->previous = end($previousMessage)->getId();	// be sure to get the last entry in the array	
			
			// get the next unread message
			$nextMessage = $this->_em->getRepository('Entities\Message')->getNextUnread('alles',$id);
			if($nextMessage) $this->view->next = $nextMessage[0]->getId();					// be sure to get the first entry in the array
			
		}
	}

}

