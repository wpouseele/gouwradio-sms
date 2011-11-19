<?php

class My_Gouwradio_Helper_TopNavigation extends Zend_View_Helper_Abstract 
{
    
    private $active;
    
    public function topNavigation() {
        $this->_defaultValues();
        return $this;
    }
    
    public function active($data)
    {
        $this->active = $data;
        return $this;
    }
    
    public function render()
    {
        
        $classHome = '';
        $classVerzoekjes = '';
        $classBerichtjes = '';
        $classAlles = '';
        $classTwitter = '';
        
        switch ($this->active)
        {
            case 'index':
                $classHome = 'class="ui-btn-active"';
                break;
            case 'verzoekjes':
                $classVerzoekjes = 'class="ui-btn-active"';
                break;
            case 'berichtjes':
                $classBerichtjes = 'class="ui-btn-active"';
                break;
            case 'alles':
                $classAlles = 'class="ui-btn-active"';
                break;
            case 'twitter':
                $classTwitter = 'class="ui-btn-active"';
                break;
            case 'twitter':
                $classTwitter = 'class="ui-btn-active"';
                break;
        }
        
        $output = '<li><a href="/" ' . $classHome .' data-transition="fade" data-icon="home" data-ajax="false">Home</a></li>'.
                  '<li><a href="/verzoekjes/" '. $classVerzoekjes .' data-transition="fade" data-icon="my-verzoekje" data-ajax="false">Verzoekjes</a></li>'.
                  '<li><a href="/berichtjes/" '. $classBerichtjes .' data-transition="fade" data-icon="my-bericht" data-ajax="false">Berichtjes</a></li>'.
                  '<li><a href="/alles/" '. $classAlles .' data-transition="fade" data-icon="my-alles" data-ajax="false">Alles</a></li>'.
                  '<li><a href="/twitter/" '. $classTwitter .' data-transition="fade" data-icon="my-twitter">Twitter</a></li>';
        
        return $output;
        
    }
    
    /* magic function to avaid to call render() each time manually */
    public function __toString() {
        return $this->render();
    }
    
    private function _defaultValues()
    {
        $this->active(null);
    }
}