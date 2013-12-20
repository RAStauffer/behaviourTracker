<?php
namespace ZendBehaviorModule\Model;

use Zend\Db\TableGateway\TableGateway;



/* beh_logTable */
class beh_logTable
{
	protected $tableGateway;

	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}

	public function fetchAll()
	{
		$resultSet = $this->tableGateway->select();
		return $resultSet;
	}

    public function get($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

	public function save(beh_log $beh_log)
	{
		$data = array(
				'entry' => $beh_log->entry,
				'trig_id'  => $beh_log->trig_id,
		);

		$id = (int)$beh_log->id;
		if ($id == 0) {
			$this->tableGateway->insert($data);
		} else {
			if ($this->get($id)) {
				$this->tableGateway->update($data, array('id' => $id));
			} else {
				throw new \Exception('Form id does not exist');
			}
		}
	}

	public function add(beh_log $beh_log)
	{
		$data = array(
				'entry' => $beh_log->entry,
				'trig_id'  => $beh_log->trig_id,
		);
	
	$this->tableGateway->insert($data);
	}
	
	public function delete($id)
	{
		$this->tableGateway->delete(array('id' => $id));
	}
}

/* beh_triggerTable */
class beh_triggerTable
{
	protected $tableGateway;

	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}

	public function fetchAll()
	{
		$resultSet = $this->tableGateway->select();
		return $resultSet;
	}

	public function get($id)
	{
		$id  = (int) $id;
		$rowset = $this->tableGateway->select(array('id' => $id));
		$row = $rowset->current();
		if (!$row) {
			throw new \Exception("Could not find row $id");
		}
		return $row;
	}

	public function save(beh_trigger $beh_trigger)
	{
		$data = array(
				'title' => $beh_trigger->title,
				'response1'  => $beh_trigger->response1,
				'response2'  => $beh_trigger->response2,
				'response3'  => $beh_trigger->response3
		);

		$id = (int)$beh_trigger->id;
		if ($id == 0) {
			$this->tableGateway->insert($data);
		} else {
			if ($this->get($id)) {
				$this->tableGateway->update($data, array('id' => $id));
			} else {
				throw new \Exception('Form id does not exist');
			}
		}
		return $id;
	}

	public function add(beh_trigger $beh_trigger)
	{
		$data = array(
				'title' => $beh_trigger->title,
				'response1'  => $beh_trigger->response1,
				'response2'  => $beh_trigger->response2,
				'response3'  => $beh_trigger->response3
		);
	

		return $this->tableGateway->insert($data);
	}
	
	public function delete($id)
	{
		$this->tableGateway->delete(array('id' => $id));
	}
}

/* beh_responseTable */
class beh_responseTable
{
	protected $tableGateway;

	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}

	public function fetchAll()
	{
		$resultSet = $this->tableGateway->select();
		return $resultSet;
	}

	public function get($id)
	{
		$id  = (int) $id;
		$rowset = $this->tableGateway->select(array('id' => $id));
		$row = $rowset->current();
		if (!$row) {
			throw new \Exception("Could not find row $id");
		}
		return $row;
	}

	public function save(beh_response $beh_response)
	{
		$data = array(
				'title' => $beh_response->title
		);

		$id = (int)$beh_response->id;
		if ($id == 0) {
			$this->tableGateway->insert($data);
		} else {
			if ($this->get($id)) {
				$this->tableGateway->update($data, array('id' => $id));
			} else {
				throw new \Exception('Form id does not exist');
			}
		}
		return $id;
	}

	public function add(beh_response $beh_response)
	{
		$data = array(
				'title' => $beh_response->title
		);
	
		
		return $this->tableGateway->insert($data);
	}
	
	public function delete($id)
	{
		$this->tableGateway->delete(array('id' => $id));
	}
}