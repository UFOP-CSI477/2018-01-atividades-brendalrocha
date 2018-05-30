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
//$logado = isset($_GET['logado']) ? $_GET['logado'] : null;

if($login==1){
	$pacientesController = new PacientesController;
	$pacientesController->verifyLogin($_POST);
}
elseif ($login==2){
	$funcionariosController = new FuncionariosController;
	$funcionariosController->verifyLogin($_POST);
}

elseif ($login==0){
	session_start();
	session_destroy();
	
	header("Location: index.php");
	exit();
}