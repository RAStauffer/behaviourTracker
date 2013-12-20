<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendBehaviorModule for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace ZendBehaviorModule;

use ZendBehaviorModule\Model\beh_logTable;
use ZendBehaviorModule\Model\beh_log;
use ZendBehaviorModule\Model\beh_triggerTable;
use ZendBehaviorModule\Model\beh_trigger;
use ZendBehaviorModule\Model\beh_responseTable;
use ZendBehaviorModule\Model\beh_response;
use ZendBehaviorModule\Controller\BehaviorController;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Mvc\ModuleRouteListener;
use ZendBehaviorModule\Model\BehaviorModel;
use ZendBehaviorModule\Model\BehaviorTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;


class Module implements AutoloaderProviderInterface
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
		    // if we're in a namespace deeper than one level we need to fix the \ in the path
                    __NAMESPACE__ => __DIR__ . '/src/' . str_replace('\\', '/' , __NAMESPACE__),
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    // Add this method:
    public function getServiceConfig()
    {
    	return array(
    			'factories' => array(
		'ZendBehaviorModule\Model\beh_logTable' =>  function($sm) {
    	$tableGateway = $sm->get('beh_logTableGateway');
    	$table = new beh_logTable($tableGateway);
    	return $table;
    	},
    	'beh_logTableGateway' => function ($sm) {
    	$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    	$resultSetPrototype = new ResultSet();
    	$resultSetPrototype->setArrayObjectPrototype(new beh_log());
    	return new TableGateway('beh_log', $dbAdapter, null, $resultSetPrototype);
    	},
    	
    	'ZendBehaviorModule\Model\beh_triggerTable' =>  function($sm) {
    	$tableGateway = $sm->get('beh_triggerTableGateway');
    	$table = new beh_triggerTable($tableGateway);
    	return $table;
    	},
    	'beh_triggerTableGateway' => function ($sm) {
    	$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    	$resultSetPrototype = new ResultSet();
    	$resultSetPrototype->setArrayObjectPrototype(new beh_trigger());
    	return new TableGateway('beh_trigger', $dbAdapter, null, $resultSetPrototype);
    	},
    	 
    	'ZendBehaviorModule\Model\beh_responseTable' =>  function($sm) {
    	$tableGateway = $sm->get('beh_responseTableGateway');
    	$table = new beh_responseTable($tableGateway);
    	return $table;
    	},
    	'beh_responseTableGateway' => function ($sm) {
    	$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    	$resultSetPrototype = new ResultSet();
    	$resultSetPrototype->setArrayObjectPrototype(new beh_response());
    	return new TableGateway('beh_response', $dbAdapter, null, $resultSetPrototype);
    	},
    	 
    	),
    	);
    }

    public function onBootstrap($e)
    {
        // You may not need to do this if you're doing it elsewhere in your
        // application
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }
}



