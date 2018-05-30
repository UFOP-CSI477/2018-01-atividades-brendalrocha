<?php include "./view/header.php";?>

  <div class="container">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h2>Área de acesso para <strong>paciente</strong></h2>
      </div>
      <div class="panel-body">
        <p>Realize seu login para ter acesso aos seus exames agendados ou para realizar agendamentos.</p>
        
        <?php
          session_start();
          if(isset($_SESSION['mensagem'])){
              echo "<p class=\"bg-danger\">" . $_SESSION['mensagem'] . "</p>";
              unset($_SESSION['mensagem']);
          }

        ?>
        <form method="post" action="login-router.php?login=1">
          <div class="form-group">
            <label for="nome">E-mail:</label>
            <input type="text" name="email" class="form-control" placeholder="E-mail">
          </div>

          <div class="form-group">
            <label for="nome">Senha:</label>
            <input type="password" name="password" class="form-control" placeholder="Senha">
          </div>
            
          <input id="type" name="type" type="hidden" value="3">

          
          <input type="submit" value="Entrar" id="cadastrar" class="btn btn-default">
          <input type="reset" value="Limpar" class="btn btn-default">
          <a href="router.php?login=2" style="text-align: right;" class="btn btn-default">Quero me cadastrar!</a>
        </form>
      </div>
    </div>

    
  </div>

<?php include "./view/footer.php";?>