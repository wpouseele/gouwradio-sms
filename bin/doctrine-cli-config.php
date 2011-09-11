<?php

require_once __DIR__ . '/../library/Doctrine/Common/ClassLoader.php';

$classLoader = new \Doctrine\Common\ClassLoader('Entities', __DIR__ . '/../application/doctrine');
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('Proxies', __DIR__ . '/../application/doctrine');
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('Spinternet', __DIR__ . '/../library');
$classLoader->register();

$cache = new \Doctrine\Common\Cache\ArrayCache();

$config = new \Doctrine\ORM\Configuration();
$config->setMetadataCacheImpl($cache);
// uncomment if we want to use annotations instead of xml
// $driverImpl = $config->newDefaultAnnotationDriver(array(__DIR__ . '/../application/doctrine/entities'));
// $config->setMetadataDriverImpl($driverImpl);
$driverImpl = new \Doctrine\ORM\Mapping\Driver\XmlDriver(array(__DIR__ . '/../application/doctrine/mappings'));
$config->setMetadataDriverImpl($driverImpl);

$config->setQueryCacheImpl($cache);

$config->setProxyDir(__DIR__ . '/../application/doctrine/proxies');
$config->setProxyNamespace('Proxies');


$connectionOptions = array(
    'driver' => 'pdo_mysql',
    'host' => '127.0.0.1',
    'dbname' => 'gouwradio',
    'user' => 'root',
    'password' => 'root',
    'port'=>'3306'
);

$em = \Doctrine\ORM\EntityManager::create($connectionOptions, $config);

$helpers = array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
);
