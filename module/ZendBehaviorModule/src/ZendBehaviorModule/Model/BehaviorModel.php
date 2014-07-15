<?php
namespace ZendBehaviorModule\Model;

class beh_log
{
    public $id;
    public $timestamp;
    public $entry;
    public $trig_id;

    public function exchangeArray($data)
    {
        $this->id     = (isset($data['id'])) ? $data['id'] : null;
        $this->timestamp = (isset($data['timestamp'])) ? $data['timestamp'] : null;
        $this->entry  = (isset($data['entry'])) ? $data['entry'] : null;
        $this->trig_id  = (isset($data['trig_id'])) ? $data['trig_id'] : null;
    }
}

class beh_trigger
{
	public $id;
	public $title;
	public $response1;
	public $response2;
	public $response3;
	
	public function exchangeArray($data)
	{
		$this->id     = (isset($data['id'])) ? $data['id'] : null;
		$this->title = (isset($data['title'])) ? $data['title'] : null;
		$this->response1  = (isset($data['response1'])) ? $data['response1'] : null;
		$this->response2  = (isset($data['response2'])) ? $data['response2'] : null;
		$this->response3  = (isset($data['response3'])) ? $data['response3'] : null;
	}
}
class beh_response
{
	public $id;
	public $title;

	public function exchangeArray($data)
	{
		$this->id     = (isset($data['id'])) ? $data['id'] : null;
		$this->title = (isset($data['title'])) ? $data['title'] : null;
	}
}
