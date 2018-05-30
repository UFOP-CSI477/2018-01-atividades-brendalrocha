<?php include "./view/header.php";?>

  <div class="container top">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h2>Área de acesso para <strong>funcionário</strong></h2>
      </div>
      <div class="panel-body">
        <?php
          session_start();
          if(isset($_SESSION['mensagem'])){
              echo "<p class=\"bg-danger\">" . $_SESSION['mensagem'] . "</p>";
              unset($_SESSION['mensagem']);
          }

        ?>
        <form method="post" action="login-router.php?login=2">
          <div class="form-group">
            <label for="nome">E-mail:</label>
            <input type="text" name="email" class="form-control" placeholder="E-mail">
          </div>

          <div class="form-group">
            <label for="nome">Senha:</label>
            <input type="password" name="password" class="form-control" placeholder="Senha">
          </div>

          <div class="form-group">
            <label for="type">Tipo:</label>
            <select id="type" name="type">
              <option value="1">Administrador</option>
              <option value="2">Operador</option>
            </select>
          </div>

          <input type="submit" value="Entrar" id="cadastrar" class="btn btn-default">
          <input type="reset" value="Limpar" class="btn btn-default">

        </form>
      </div>
    </div>

  </div>

<?php include "./view/footer.php";?>