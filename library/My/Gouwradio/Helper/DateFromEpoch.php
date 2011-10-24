<?php

class My_Gouwradio_Helper_DateFromEpoch extends Zend_View_Helper_Abstract 
{
    
    private $epoch;
    
    public function dateFromEpoch() {
        $this->_defaultValues();
        return $this;
    }
    
    public function epoch($epochtime)
    {
        $this->epoch = $epochtime;
        return $this;
    }
    
    public function render()
    {
        // the epoch time in the database is listed in milliseconds so we need to first convert this to seconds
        $seconds = $this->epoch / 1000;
        return date('d/m/Y H:i:s',$seconds);
    }
    
    /* magic function to avaid to call render() each time manually */
    public function __toString() {
        return $this->render();
    }
    
    private function _defaultValues()
    {
        $this->epoch(null);
    }
}