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
        <a class="navbar-brand" href="index.php">Análises Laboratoriais</a>
        
        
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="router.php?procedimento=1">Procedimentos</a></li>
          <li><a href="router.php?login=1">Área do Paciente</a></li>
          <li><a href="router.php?login=0">Área do Funcionário</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  <div class="container top">
    <?php 

      $session = session_status();
      if(!$session==PHP_SESSION_ACTIVE || $session==PHP_SESSION_DISABLED){
        session_start();
      }

      if(isset($_SESSION['mensagem'])){
        echo "<p class=\"bg-info\">" . $_SESSION['mensagem'] . "</p>";
        unset($_SESSION['mensagem']);
      }
    ?>
  </div>
  