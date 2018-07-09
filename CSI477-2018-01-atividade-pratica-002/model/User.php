<?php

namespace Model;//pacote

use Model\Database;

class User{
	protected $db = null;

	private $id;
	private $name;
	private $email;
	private $password;
	private $type;
	private $remember_token;
	private $updated_at;
	private $created_at;

	public function __construct(){
		$this->db = Database::getInstance()->getDB();
		$this->id = 0;
	}

	public function __construct4($name,$email,$password,$remember_token){
		$this->name = $name;
		$this->email = $email;
		$this->password = $password;
		$this->remember_token = $remember_token;
		$this->type = 0;
	}

	public function all(){
		$sql = "SELECT * FROM users ORDER BY name";
		return $this->db->query($sql);
	}

	public function adm(){
		$sql = "SELECT * FROM users WHERE type=1 ORDER BY name";
		return $this->db->query($sql);
	}

	public function operador(){
		$sql = "SELECT * FROM users WHERE type=2 ORDER BY name";
		return $this->db->query($sql);
	}

	public function pacientes(){
		$sql = "SELECT * FROM users WHERE type=0 ORDER BY name";
		return $this->db->query($sql);
	}

	public function select($email,$senha,$type){
		$sql = "SELECT * FROM users WHERE type=".$type." AND email='".$email."' AND password='".$senha."' LIMIT 1";
		return $this->db->query($sql);
	}

	public function select1($id){
		$sql = "SELECT * FROM users WHERE id=".$id;
		return $this->db->query($sql);
	}

	public function select2($email,$type){
		$sql = "SELECT * FROM users WHERE type=".$type." AND email='".$email."'";
		return $this->db->query($sql);
	}

	public function save(){
		if ($this->id==0) {
			$this->insert();
		}else{
			$this->update();
		}
	}

	public function insert(){
		$sql = "INSERT INTO users (name, email, password, type, remember_token) VALUES ('".$this->name."','".$this->email."','".$this->password."','".$this->type."','".$this->remember_token."')";
		$this->db->exec($sql);
	}

	public function update($id,$name,$email,$type){
		$sql = "UPDATE users SET name = '".$name."', email = '".$email."', type = ".$type." WHERE users.id = ".$id;
		$this->db->exec($sql);
	}	

	public function delete($id){
		$sql = "DELETE FROM users WHERE users.id = ".$id;
		$this->db->exec($sql);
	}

	public function setName($name){
		$this->name = $name;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function setPassword($password){
		$this->password = $password;
	}

	public function setType($type){
		$this->type = $type;
	}

	public function setRememberToken($remember_token){
		$this->remember_token = $remember_token;
	}

	public function setUpdatedAt($updated_at){
		$this->updated_at = $updated_at;
	}
	public function setCreatedAt($created_at){
		$this->created_at = $created_at;
	}	

}