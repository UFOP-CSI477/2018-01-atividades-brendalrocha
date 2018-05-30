<?php

namespace Controller;

use Model\Exame;
use Model\Procedimento;

class ExamesController{
	public function listar(){
		# acesso ao modelo
		$exame = new Exame();

		#manipulando dados
		$lista = $exame->all();

		#invocar a View
		include './view/exames/listar.php';
	}

	public function select(){
		session_start();
		$logado = isset($_SESSION['logado']) ? $_SESSION['logado'] : 0;
		$exames = new Exame();
		$lista = $exames->select($logado);
		$preco = $exames->sumPrice($logado);
		$qtd = $exames->count($logado);

		include './view/pacientes/meus-exames.php';
	}

	public function edit($id){
		session_start();
		$logado = isset($_SESSION['logado']) ? $_SESSION['logado'] : 0;
		$exames = new Exame();
		$lista = $exames->select2($logado,$id);
		//var_dump($id);
		include './view/pacientes/editar.php';
	}

	public function update($request){
		$date = $request['date'];
		$id = $request['id'];

		$exame = new Exame();
		$exame->setId($id);
		$exame->setDate($date);
		$exame->save();

		//session_start();
		$_SESSION['mensagem'] = "Alteração da data do exame feita com sucesso!";
		$logado = isset($_SESSION['logado']) ? $_SESSION['logado'] : 0;
		$lista = $exame->select($logado);
		$lista = $exame->select($logado);
		$preco = $exame->sumPrice($logado);
		$qtd = $exame->count($logado);
		$this->redir("./paciente-router.php?solicitacao=3");
	}

	public function delete($id){
		$exame = new Exame();
		$exame->delete($id);

		session_start();
		$_SESSION['mensagem'] = "Solicitação de exame excluida com sucesso!";
		$logado = isset($_SESSION['logado']) ? $_SESSION['logado'] : 0;
		$lista = $exame->select($logado);
		$lista = $exame->select($logado);
		$preco = $exame->sumPrice($logado);
		$qtd = $exame->count($logado);
		include './view/pacientes/meus-exames.php';
	}

	public function store($request){
		$user_id = $request['user_id'];
		$procedure_id = $request['procedure_id'];
		$date = $request['date'];

		$exame = new Exame();
		$exame->setUserId($user_id);
		$exame->setProcedureId($procedure_id);
		$exame->setDate($date);

		$exame->save();

		session_start();
		$_SESSION['mensagem'] = "Exame agendado com sucesso!";
		$logado = isset($_SESSION['logado']) ? $_SESSION['logado'] : 0;
		$lista = $exame->select($logado);
		$lista = $exame->select($logado);
		$preco = $exame->sumPrice($logado);
		$qtd = $exame->count($logado);
		include './view/pacientes/meus-exames.php';
	}

	public function redir($path){
		header("Location: ".$path);
		exit();
	}

	public function schedule(){
		$procedimentos = new Procedimento;
		$lista = $procedimentos->all();

		//var_dump($lista);

		session_start();
		//Exibir a view
		include './view/pacientes/agendar-exames.php';
	}

	public function create(){
		//Exibir a view
		include './view/exames/create.php';
	}
}