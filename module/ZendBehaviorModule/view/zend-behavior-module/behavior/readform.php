<?php 
use ZendBehaviorModule\Model\beh_responseTable;

use ZendBehaviorModule\Model\beh_triggerTable;

use ZendBehaviorModule\Model\beh_logTable;

use ZendBehaviorModule\Model\beh_response;

use ZendBehaviorModule\Model\beh_trigger;

use ZendBehaviorModule\Model\beh_log;

echo "Read Form";

ZendBehaviorModule\Model\BehaviorModel;
ZendBehaviorModule\Model\BehaviorTable;

$beh_response_table = new beh_responseTable($tableGateway);
$beh_response->title = $_POST($newResponse);
$resp_id = $beh_response_table.add($beh_response);

$beh_trigger_table = new beh_triggerTable($tableGateway);
$beh_trigger->title = $_POST($newTrigger);
$beh_trigger->response1 = $resp_id;
$beh_trigger->response2 = NULL;
$beh_trigger->response3 = NULL;
$trig_id = $beh_trigger_table.add($beh_trigger);

$beh_log_table = new beh_logTable($tableGateway);
$beh_log->entry = $_POST($logentry);
$beh_log->trig_id = $trig_id;

$beh_log_table.add($beh_log);

?>