<?php

namespace Model;//pacote

use Model\Database;

class Procedimento{
	protected $db = null;

	private $id;
	private $name;
	private $price;
	private $user_id;
	private $updated_at;
	private $created_at;

	public function __construct(){
		$this->db = Database::getInstance()->getDB();
	}

	public function all(){
		$sql = "SELECT * FROM procedures ORDER BY name ASC";
		return $this->db->query($sql);
	}

	public function select($id){
		$sql = "SELECT * FROM procedures WHERE id=".$id;
		return $this->db->query($sql);
	}

	public function select2(){
		$sql = "SELECT procedures.id, procedures.name, procedures.price, users.name FROM procedures INNER JOIN users ON procedures.user_id = users.id ORDER BY procedures.name";
		return $this->db->query($sql);
	}

	public function insert(){
		$sql = "INSERT INTO procedures (name, price, user_id) VALUES ('".$this->name."', ".$this->price.", ".$this->user_id.")";
		$this->db->exec($sql);
	}

	public function delete($id){
		$sql = "DELETE FROM procedures WHERE procedures.id = ".$id;
		$this->db->exec($sql);
	}

	public function update($id){
		$sql = "UPDATE procedures SET name = '".$this->name."', price = ".$this->price.", user_id = ".$this->user_id." WHERE procedures.id = ".$id;
		$this->db->exec($sql);
	}

	public function setName($name){
		$this->name = $name;
	}

	public function setPrice($price){
		$this->price = $price;
	}

	public function setUserId($user_id){
		$this->user_id = $user_id;
	}



}