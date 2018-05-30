<?php

namespace Model;//pacote

use Model\Database;

class Exame{
	protected $db = null;

	private $id;
	private $user_id;
	private $procedure_id;
	private $date;
	private $updated_at;
	private $created_at;

	public function __construct(){
		$this->db = Database::getInstance()->getDB();
		$this->id = 0;
	}

	public function all(){
		$sql = "SELECT * FROM tests ORDER BY date DESC";
		return $this->db->query($sql);
	}

	public function select($user_id){
		$sql = "SELECT tests.id, tests.date, procedures.name, procedures.price FROM tests INNER JOIN procedures ON tests.procedure_id = procedures.id WHERE tests.user_id = ".$user_id." ORDER BY tests.date DESC, procedures.name ASC";
		//$sql = "SELECT * FROM tests WHERE user_id = ".$user_id." ORDER BY date DESC";
		//var_dump($sql);
		return $this->db->query($sql);
	}

	public function select1($procedure_id){
		$sql = "SELECT * FROM tests INNER JOIN procedures ON tests.procedure_id = ".$procedure_id;
		return $this->db->query($sql);
	}


	public function select2($user_id,$id){
		$sql = "SELECT tests.id, tests.date, procedures.name, procedures.price FROM tests INNER JOIN procedures ON tests.procedure_id = procedures.id WHERE tests.user_id = ".$user_id." AND tests.id=".$id." ORDER BY tests.date";
		//$sql = "SELECT * FROM tests WHERE user_id = ".$user_id." ORDER BY date DESC";

		//var_dump($sql);
		return $this->db->query($sql);
	}

	public function count($user_id){
		$sql = "SELECT COUNT(tests.id) AS total FROM tests WHERE tests.user_id = ".$user_id;
		return $this->db->query($sql);
	}

	public function sumPrice($user_id){
		$sql = "SELECT SUM(procedures.price) FROM tests INNER JOIN procedures ON tests.procedure_id = procedures.id WHERE tests.user_id = ".$user_id;
		return $this->db->query($sql);
	}

	public function save()
	{
		if ($this->id==0) {
			$this->insert();
		}else{
			$this->update();
		}
	}

	public function insert(){
		$sql = "INSERT INTO tests (user_id, procedure_id, date) VALUES (".$this->user_id.",".$this->procedure_id.",'".$this->date."')";
		//var_dump($sql);
		$this->db->exec($sql);
	}

	public function update()
	{
		//UPDATE `tests` SET `date` = '2018-10-15', `created_at` = NULL, `updated_at` = NULL WHERE `tests`.`id` = 2;
		$sql = "UPDATE tests SET date = '".$this->date."' WHERE tests.id = ".$this->id;
		$this->db->exec($sql);
	}
	public function delete($id){
		$sql = "DELETE FROM tests WHERE tests.id =".$id;
		$this->db->exec($sql);
	}

	public function setId($id){
		$this->id = $id;
	}

	public function setUserId($user_id){
		$this->user_id = $user_id;
	}

	public function setProcedureId($procedure_id){
		$this->procedure_id = $procedure_id;
	}

	public function setDate($date){
		$this->date = $date;
	}
}