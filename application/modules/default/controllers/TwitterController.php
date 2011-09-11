<?php

class Default_TwitterController extends Zend_Controller_Action
{

    public function init()
    {
        $this->view->activeData = $this->getRequest()->getControllerName();
    }

    public function indexAction()
    {
        $twitterSearch  = new Zend_Service_Twitter_Search('json');
        $searchResults  = $twitterSearch->search('gouwradio', array('lang' => 'en'));
        
        $this->view->twitterSearch = $searchResults;
    }


}

