<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendBehaviorModule for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace ZendBehaviorModule\Controller;
//ob_start();
//session_start();

use Zend\Mvc\Controller\AbstractActionController, Zend\View\Model\ViewModel;

class BehaviorController extends AbstractActionController
{
	protected $beh_logTable;

	public function indexAction()
	{
		{
			return new ViewModel(array(
					'beh_logs' => $this->getbeh_logTable()->fetchAll(),
					'beh_triggers' => $this->getbeh_triggerTable()->fetchAll(),
					'beh_responses' => $this->getbeh_responseTable()->fetchAll(),
			));
		}
	}

	public function displaylogsAction()
	{
		// This shows the :controller and :action parameters in default route
		// are working when you browse to /module-specific-root/Behavior/foo
		{
			return new ViewModel(array(
					'beh_logs' => $this->getbeh_logTable()->fetchAll(),
					'beh_triggers' => $this->getbeh_triggerTable()->fetchAll(),
					'beh_responses' => $this->getbeh_responseTable()->fetchAll(),
			));
		}
	}
	
	public function readformAction()
	{

		$beh_response->title = $_POST["newResponse"];                //TODO create beh_response object and exchange_data
		$behResp = new beh_response();
		$behResp->exchangeArray($beh_response);
		$resp_id = $this->getbeh_responseTable()->add($behResp);
		
		$beh_trigger->title = $_POST["newTrigger"];
		$beh_trigger->response1 = $resp_id;
		$beh_trigger->response2 = 2;
		$beh_trigger->response3 = 3;
		$behTrig = new beh_trigger();
		$behTrig->exchangeArray($beh_trigger);
		$trig_id = $this->getbeh_triggerTable()->add($behTrig);
		
		$beh_log->entry = $_POST["logentry"];
		$beh_log->trig_id = $trig_id;
		$behLog = new beh_log();
		$behLog->exchangeArray($behLog);
		
		$this->getbeh_logTable()->add($behLog);
	}

	public function getbeh_logTable()
	{
		if (!$this->beh_logTable) {
			$sm = $this->getServiceLocator();
			$this->beh_logTable = $sm->get('ZendBehaviorModule\Model\beh_logTable');
		}
		return $this->beh_logTable;
	}

	public function getbeh_triggerTable()
	{
		if (!$this->beh_triggerTable) {
			$sm = $this->getServiceLocator();
			$this->beh_triggerTable = $sm->get('ZendBehaviorModule\Model\beh_triggerTable');
		}
		return $this->beh_triggerTable;
	}

	public function getbeh_responseTable()
	{
		if (!$this->beh_responseTable) {
			$sm = $this->getServiceLocator();
			$this->beh_responseTable = $sm->get('ZendBehaviorModule\Model\beh_responseTable');
		}
		return $this->beh_responseTable;
	}
}

