<?php

// Includes - framework
include './model/Database.php';
include './model/User.php';
include './model/Procedimento.php';

// include './controller/AdministradoresController.php';
include './controller/FuncionariosController.php';
include './controller/PacientesController.php';
include './controller/ProcedimentosController.php';

// Tratamento das rotas
// use Controller\AdministradoresController;
use Controller\FuncionariosController;
use Controller\PacientesController;
use Controller\ProcedimentosController;


$login = isset($_GET['login']) ? $_GET['login'] : null;
$procedimento = isset($_GET['procedimento']) ? $_GET['procedimento'] : null;
$paciente = isset($_GET['paciente']) ? $_GET['paciente'] : null;
$funcionario = isset($_GET['funcionario']) ? $_GET['funcionario'] : null;


// var_dump("L:".$login);
// var_dump("Proc: ".$procedimento);
// var_dump("Pac: ".$paciente);
//var_dump("Func: ".$funcionario);

//definiçao das rotas
if($procedimento==1){
	$procedimentosController = new ProcedimentosController;
	$procedimentosController->listar();
}

elseif ($login==0){
	$funcionariosController = new FuncionariosController;
 	$funcionariosController->login();
}elseif ($login==1) {
	$pacientesController = new PacientesController;
 	$pacientesController->login();
}

elseif ($login==2) {
 	$pacientesController = new PacientesController;
 	$pacientesController->create();
}elseif ($login==3) {
 	$pacientesController = new PacientesController;
 	$pacientesController->store($_POST);
}





