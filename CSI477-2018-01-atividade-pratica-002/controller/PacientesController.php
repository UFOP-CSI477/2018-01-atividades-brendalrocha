<?php

namespace Controller;

use Model\User;
use Model\Procedimento;

class PacientesController{
	
	public function list(){
		$paciente = new User();
		$lista = $paciente->pacientes();
		include './view/pacientes/listar.php';
	}

	public function create(){
		include './view/pacientes/create.php';
	}

	public function login(){
		include './view/pacientes/login.php';
	}

	public function verifyLogin($request){
		session_start();
		$logado = isset($_SESSION['logado']) ? $_SESSION['logado'] : 0;
		//var_dump($logado);
		
		if($logado==0){
		 	$email = $request['email'];
			$password = $request['password'];

			$paciente = new User();
			$login = $paciente->select($email,$password,3);

			//var_dump($login->rowCount());

			if($login->rowCount()>0){
				$id = null;
				while($linha = $login->fetch()){
					$id = $linha['id'];

					$_SESSION['mensagem'] = "Seja bem vindo a área do Paciente";
					$_SESSION['id'] = $id;
					$_SESSION['email'] = $email;
					$_SESSION['password'] = $password;
					$_SESSION['logado'] = $id;


					if($linha['type']==3){
						$procedimentos = new Procedimento();
						$lista = $procedimentos->all();

						include './view/pacientes/principal.php';
					}
				}
			}else{
				session_destroy();
				$_SESSION['mensagem'] = "Seu e-mail ou senha podem estar incorretos!";
				include './view/pacientes/login.php';
			}
		}else{
			$procedimentos = new Procedimento();
			$lista = $procedimentos->all();
			include './view/pacientes/principal.php';
		}
	}

	public function store($request){
		$name = $request['name'];
		$email = $request['email'];
		$password = $request['password'];
		$confpassword = $request['confPassword'];
		$remember_token = $request['remember_token'];
		$type = $request['type'];

		if($name!="" && $email!="" && $password!="" && $confpassword)

		session_start();
		if($password===$confpassword){
			if($this->verifyRegister($email,$type)==0){
				$paciente = new User();
				$paciente->setName($name);
				$paciente->setEmail($email);
				$paciente->setPassword($password);
				$paciente->setRememberToken($remember_token);
				$paciente->setType(3);
				$paciente->save();
				
				$_SESSION['mensagem'] = "Olá " . $name . "! Seja bem vindo ao nosso sistema! <br> Efetue o login para solicitar exames!";
				$this->redir("./router.php?login=1");
			}else{
				$_SESSION['mensagem'] = "O email " . $email . " já está registrado!";
				$this->redir("./router.php?login=1");
			}
		}else{
			$_SESSION['mensagem'] = "As senhas não são iguais.";
			$this->redir("./router.php?login=1");
		}
	}


	public function verifyRegister($email,$type){
		$usuario = new User();
		$registro = $usuario->select2($email,$type);
		return $registro->rowCount();
	}

	public function redir($path){
		header("Location: ".$path);
		exit();
	}

}