<?php

// Includes - framework
include './model/Database.php';
include './model/User.php';
include './model/Procedimento.php';
include './model/Exame.php';

include './controller/FuncionariosController.php';
include './controller/ProcedimentosController.php';
include './controller/ExamesController.php';

// Tratamento das rotas
use Controller\FuncionariosController;
use Controller\ProcedimentosController;
use Controller\ExamesController;

$solicitacao = isset($_GET['solicitacao']) ? $_GET['solicitacao'] : null;
$procedimento = isset($_GET['procedimento']) ? $_GET['procedimento'] : null;
$id = isset($_GET['id']) ? $_GET['id'] : null;
$editar = isset($_GET['editar']) ? $_GET['editar'] : null;

if($solicitacao==0){
	$funcionariosController = new FuncionariosController;
	$funcionariosController->verifyLogin($_POST);
}
elseif ($solicitacao==1) {
	//adiciona um novo funcionário
	$funcionario = new FuncionariosController;
	$funcionario->create();
}elseif ($solicitacao==2) {
	$funcionario = new FuncionariosController;
	$funcionario->store($_POST);
}elseif ($solicitacao==3) {
	$funcionario = new FuncionariosController;
	$funcionario->update($id);
}elseif ($solicitacao==4) {
	$funcionario = new FuncionariosController;
	$funcionario->delete($id);
}elseif($solicitacao==5){
	//lista os funcionários
	$funcionario = new FuncionariosController;
	$funcionario->list(1);
}



elseif ($solicitacao==6) {
	//adiciona um novo procedimento
	$procedimento = new ProcedimentosController;
	$procedimento->create();
}elseif($solicitacao==7){
	$funcionario = new FuncionariosController;
	$funcionario->list(2);
}elseif($solicitacao==8){
	$procedimento = new ProcedimentosController;
	$procedimento->store($_POST);
}elseif($solicitacao==9){
	$procedimento = new ProcedimentosController;
	$procedimento->edit($id);
}elseif($solicitacao==10){
	$procedimento = new ProcedimentosController;
	$procedimento->delete($id);
}

elseif ($solicitacao==11) {
	$procedimento = new ProcedimentosController;
	$procedimento->update($_POST);
}



