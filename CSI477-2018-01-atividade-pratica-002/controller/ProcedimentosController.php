<?php

namespace Controller;

use Model\Procedimento;

// include "./controller/ExamesController.php";
// include "./model/Exame.php";

use Model\Exame;

class ProcedimentosController{

	public function listar(){
		$procedimento = new Procedimento();
		$lista = $procedimento->all();
		include './view/geral/listar.php';
	}

	public function create(){
		session_start();
		$logado = isset($_SESSION['logado']) ? $_SESSION['logado'] : 0;
		$type = isset($_SESSION['type']) ? $_SESSION['type'] : 0;

		if($type==1) {
			include './view/funcionarios/header.php';
			include './view/procedimentos/create.php';
			include './view/footer.php';
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
			$price = $request['price'];
			$user_id = $request['user_id'];

			$procedimento = new Procedimento();
			$procedimento->setName($name);
			$procedimento->setPrice($price);
			$procedimento->setUserId($user_id);

			$procedimento->insert();
			$_SESSION['mensagem'] = "Procedimento inserido com sucesso.";
			$this->redir("./funcionario-router.php?solicitacao=7");	
			
		}else{
			$_SESSION['mensagem'] = "Você não tem autorização para realizar essa operação!";
			$this->redir("./funcionario-router.php?solicitacao=0");
		}	
	}

	public function delete($id){
		session_start();
		$logado = isset($_SESSION['logado']) ? $_SESSION['logado'] : 0;
		$type = isset($_SESSION['type']) ? $_SESSION['type'] : 0;

		if ($type==1) {

			$exame = new Exame();
			$select = $exame->select1($id);

			if($select->rowCount()>0){
				$_SESSION['mensagem'] = "Não é possível excluir esse procedimento. Você possui exames associados a ele.";
				$this->redir("./funcionario-router.php?solicitacao=7");
			}else{
				$procedimento = new Procedimento();
				$procedimento->delete($id);
				$_SESSION['mensagem'] = "Procedimento excluido!";
				$this->redir("./funcionario-router.php?solicitacao=7");
			}
		}else{
			$_SESSION['mensagem'] = "Você não tem autorização para realizar essa operação!";
			$this->redir("./funcionario-router.php?solicitacao=7");
		}		
	}

	public function edit($id){
		session_start();
		$logado = isset($_SESSION['logado']) ? $_SESSION['logado'] : 0;
		$type = isset($_SESSION['type']) ? $_SESSION['type'] : 0;

		if ($type==1 || $type==2) {
			$procedimento = new Procedimento();
			$select = $procedimento->select($id);
			include './view/funcionarios/header.php';
			include './view/procedimentos/edit.php';
			include './view/footer.php';
		}else{
			$_SESSION['mensagem'] = "Você não tem autorização para realizar essa operação!";
			$this->redir("./funcionario-router.php?solicitacao=0");
		}
		
	}

	public function update($request){
		session_start();
		$logado = isset($_SESSION['logado']) ? $_SESSION['logado'] : 0;
		$type = isset($_SESSION['type']) ? $_SESSION['type'] : 0;

		var_dump($request);

		if($type==1 || $type==2){
			$name = $request['name'];
			$price = $request['price'];
			$user_id = $request['user_id'];
			$id = $request['id'];

			$procedimento = new Procedimento();
			$procedimento->setName($name);
			$procedimento->setPrice($price);
			$procedimento->setUserId($user_id);
			$procedimento->update($id);

			$_SESSION['mensagem'] = "Procedimento editado com sucesso.";
			$this->redir("./funcionario-router.php?solicitacao=7");	
		}else{
			$_SESSION['mensagem'] = "Você não tem autorização para realizar essa operação!";
			$this->redir("./funcionario-router.php?solicitacao=0");
		}

	
	}

	public function redir($path){
		header("Location: ".$path);
		exit();
	}
}