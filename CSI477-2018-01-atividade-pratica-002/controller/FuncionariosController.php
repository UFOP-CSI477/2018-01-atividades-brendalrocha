<?php
namespace Controller;

use Model\User;
use Model\Procedimento;

class FuncionariosController{
	public function login(){
		//Exibir a view
		include './view/funcionarios/login.php';
	}

	public function create(){
		session_start();
		$logado = isset($_SESSION['logado']) ? $_SESSION['logado'] : 0;
		$type = isset($_SESSION['type']) ? $_SESSION['type'] : 0;
		
		if($type==1){
			include './view/funcionarios/create.php';
		}else{
			$_SESSION['mensagem'] = "Você não tem autorização para realizar essa operação!";
			$this->redir("./funcionario-router.php?solicitacao=0");
		}
	}

	public function store($request){
		session_start();
		$logado = isset($_SESSION['logado']) ? $_SESSION['logado'] : 0;
		$type = isset($_SESSION['type']) ? $_SESSION['type'] : 0;
		
		if($type==1){
			$name = $request['name'];
			$email = $request['email'];
			$password = $request['password'];
			$confpassword = $request['confPassword'];
			$remember_token = $request['remember_token'];
			$type = $request['type'];

			if($password===$confpassword){
				if($this->verifyRegister($email,$type)==0){
					$funcionario = new User();
					$funcionario->setName($name);
					$funcionario->setEmail($email);
					$funcionario->setPassword($password);
					$funcionario->setRememberToken($remember_token);
					$funcionario->setType($type);

					$funcionario->save();
					$_SESSION['mensagem'] = "O funcionário " . $name . " foi adicionado!";
					$adm = $funcionario->adm();
					$op = $funcionario->operador();
					$this->redir("./funcionario-router.php?solicitacao=5");
				}else{
					$_SESSION['mensagem'] = "O email" . $email . " já está registrado!";
					$this->redir("./funcionario-router.php?solicitacao=1");
				}
			}else{
				$_SESSION['mensagem'] = "As senhas não são iguais.";
				$this->redir("./funcionario-router.php?solicitacao=1");
			}
		}else{
			$_SESSION['mensagem'] = "Você não tem autorização para realizar essa operação!";
			$this->redir("./funcionario-router.php?solicitacao=0");
		}	
	}

	public function list($operacao){
		//Exibir a view
		session_start();
		$logado = isset($_SESSION['logado']) ? $_SESSION['logado'] : 0;
		$type = isset($_SESSION['type']) ? $_SESSION['type'] : 0;

		if($type==1 && $operacao==1){
			$funcionario = new User();
			$adm = $funcionario->adm();
			$op = $funcionario->operador();
			include './view/funcionarios/header.php';
			include './view/funcionarios/list.php';
			include './view/footer.php';
		}elseif ($operacao==2) {
			$procedimento = new Procedimento();
			$lista = $procedimento->select2();
			include './view/funcionarios/header.php';
			include './view/procedimentos/list.php';
			include './view/footer.php';
		}else{
			$_SESSION['mensagem'] = "Você não tem autorização para realizar essa operação!";
			$this->redir("./funcionario-router.php?solicitacao=0");
		}
	}

	public function delete($id){
		session_start();
		$logado = isset($_SESSION['logado']) ? $_SESSION['logado'] : 0;
		$type = isset($_SESSION['type']) ? $_SESSION['type'] : 0;

		if($type==1){
			$funcionario = new User();
			$funcionario->delete($id);
			$_SESSION['mensagem'] = "Funcionário excluido!";
			$this->redir("./funcionario-router.php?solicitacao=5");
		}else{
			$_SESSION['mensagem'] = "Você não tem autorização para realizar essa operação!";
			$this->redir("./funcionario-router.php?solicitacao=0");
		}
	}

	public function edit($id){
		session_start();
		$logado = isset($_SESSION['logado']) ? $_SESSION['logado'] : 0;
		$type = isset($_SESSION['type']) ? $_SESSION['type'] : 0;

		if($type==1){
			$funcionario = new User();
			$select = $funcionario->select1($id);
			include './view/funcionarios/edit.php';
		}else{
			$_SESSION['mensagem'] = "Você não tem autorização para realizar essa operação!";
			$this->redir("./funcionario-router.php?solicitacao=0");
		}
	}

	public function verifyLogin($request){
		session_start();
		$logado = isset($_SESSION['logado']) ? $_SESSION['logado'] : 0;
		//var_dump($logado);
		
		if($logado==0){
		 	$email = $request['email'];
			$password = $request['password'];
			$type = $request['type'];

			$paciente = new User();
			$login = $paciente->select($email,$password,$type);

			//var_dump($login->rowCount());

			if($login->rowCount()>0){
				$id = null;
				while($linha = $login->fetch()){
					$id = $linha['id'];

					$_SESSION['id'] = $id;
					$_SESSION['email'] = $email;
					$_SESSION['password'] = $password;
					$_SESSION['type'] = $type;
					$_SESSION['logado'] = $id;


					if($linha['type']==1){
						$_SESSION['mensagem'] = "Seja bem vindo a área do Administrador";
					}elseif($linha['type']==2){
						$_SESSION['mensagem'] = "Seja bem vindo a área do Operador";
					}

					$procedimentos = new Procedimento();
					$lista = $procedimentos->all();
					include './view/funcionarios/principal.php';
				}
			}else{
				session_destroy();
				$_SESSION['mensagem'] = "Seu e-mail ou senha podem estar incorretos!";
				include './view/funcionarios/login.php';
			}
		}else{
			$procedimentos = new Procedimento();
			$lista = $procedimentos->all();
			include './view/funcionarios/principal.php';
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