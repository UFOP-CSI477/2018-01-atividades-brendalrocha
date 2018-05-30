<?php include "./view/header.php";?>

  <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3>Cadastro de Paciente</h3>
      </div>
      <div class="panel-body">
    
        <div class="alert alert-danger" style="display: none;  text-align: center;" id="alert-cadastrar-paciente"></div>
        <form method="post" action="router.php?login=3" id="paciente-create">
          <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="name" class="form-control" placeholder="Nome">
          </div>

          <div class="form-group">
            <label for="nome">E-mail:</label>
            <input type="text" name="email" class="form-control" placeholder="E-mail">
          </div>

          <div class="form-group">
            <label for="nome">Senha:</label>
            <input type="password" name="password" class="form-control" placeholder="Senha">
          </div>

          <div class="form-group">
            <label for="nome">Confirmar senha:</label>
            <input type="password" name="confPassword" class="form-control" placeholder="Confirmar senha">
          </div>

          <div class="form-group">
            <label for="nome">Lembrete de senha:</label>
            <input type="text" name="remember_token" class="form-control" placeholder="Lembrete de senha">
          </div>
            
          <input id="type" name="type" type="hidden" value="3">
          <input type="button" value="Cadastrar" name="cadastrar-paciente" class="btn btn-default">
          <input type="reset" value="Limpar" class="btn btn-default">

        </form>
      </div>
    </div>
  </div>

<?php include "./view/footer.php";?>
