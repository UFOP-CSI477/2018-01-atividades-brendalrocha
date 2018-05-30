<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Análises Laboratoriais</title>

  <link rel="stylesheet" type="text/css" href="./assets/bootstrap-3.3.7-dist/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="./assets/css/style.css">

</head>
<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="login-router.php?login=2">Análises Laboratoriais - Área do Funcionário</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Funcionários <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="funcionario-router.php?solicitacao=1">Cadastrar</a></li>
              <li><a href="funcionario-router.php?solicitacao=5">Listar</a></li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Procedimentos <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="funcionario-router.php?solicitacao=6">Cadastrar</a></li>
              <li><a href="funcionario-router.php?solicitacao=7">Listar</a></li>
            </ul>
          </li>
          <li><a href="login-router.php?login=0">Sair</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  <div class="container-fluid">
    
    <div>
      <?php
        if(isset($_SESSION['mensagem'])){
          echo "<p class=\"bg-info\">" . $_SESSION['mensagem'] . "</p>";
          unset($_SESSION['mensagem']);
        }
        if((!isset ($_SESSION['email']) == true) && (!isset ($_SESSION['email']) == true)){
            unset($_SESSION['email']);
            unset($_SESSION['password']);

            //echo "nao logado";
            header("Location: index.php/");
        }
        $logado = $_SESSION['id'];

        //var_dump($logado);
      ?>
    </div>

    <p align="right">Usuário Logado: <?php echo $_SESSION['email'];?></p>