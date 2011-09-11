<?php

/*
 * Custom db adapter class for accessing the database.
 * Normally, this is all handled by Doctrine, but this way, we can use the standard Zend_Form DBExists validation
 * 
 * Source: http://chrisacky.com/tag/zend-framework-2/
 */

class My_Doctrine_Adapter_Db extends Zend_Db_Adapter_Pdo_Mysql
{
    protected $_connection;
    protected $_profiler;
        
    public function __construct(PDO $connection){
        $this->_connection = $connection;
        $this->_profiler = new Zend_Db_Profiler();
    }
        
    public function setConnection(PDO $connection ){
        $this->_connection = $connection;
    }

}