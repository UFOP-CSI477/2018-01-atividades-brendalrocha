<?php

// Includes - framework
include './model/Database.php';
include './model/User.php';
include './model/Procedimento.php';
include './model/Exame.php';
// include './controller/AdministradoresController.php';
// include './controller/OperadoresController.php';
include './controller/ExamesController.php';
include './controller/PacientesController.php';
include './controller/ProcedimentosController.php';

// Tratamento das rotas
// use Controller\AdministradoresController;
// use Controller\OperadoresController;
use Controller\ExamesController;
use Controller\PacientesController;
use Controller\ProcedimentosController;

$solicitacao = isset($_GET['solicitacao']) ? $_GET['solicitacao'] : null;
$procedimento = isset($_GET['procedimento']) ? $_GET['procedimento'] : null;
$editar = isset($_GET['editar']) ? $_GET['editar'] : null;


if($solicitacao==0){
	$pacientesController = new PacientesController;
	$pacientesController->verifyLogin($_POST);
}
if($solicitacao==1){
	$exame = new ExamesController;
	$exame->schedule();
}elseif($solicitacao==2){
	$exame = new ExamesController;
	$exame->store($_POST);
}elseif($solicitacao==3){
	$exame = new ExamesController;
	$exame->select();
}elseif($solicitacao==4){
	$exame = new ExamesController;
	$exame->edit($procedimento);
}elseif($solicitacao==5){
	$exame = new ExamesController;
	$exame->delete($procedimento);
}

elseif ($editar==1) {
	$exame = new ExamesController;
	$exame->update($_POST);
}


