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
        $this->view->data = Zend_Json::encode($this->convertArrayKeys($messages));
    }
	
	private function convertArrayKeys(array $array)
	{
		foreach($array as $inner_key => $inner_array)
		{
			foreach(array_keys($inner_array) as $key){
				$inner_array[$key] = @iconv('UTF-8', 'UTF-8//TRANSLIT', $inner_array[$key]);	
			}
			$array[$inner_key] = $inner_array;
		}
	    return $array; 
	  } 

}

