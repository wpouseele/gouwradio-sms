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
        $berichtje = $this->_em->find('Entities\Message',$id);
		
		$berichtje->setType('bericht');
		$berichtje->setNew(0);
		$this->_em->persist($berichtje);
		$this->_em->flush();		
        
        // return to home
        $this->_redirect('/');
    }
}

