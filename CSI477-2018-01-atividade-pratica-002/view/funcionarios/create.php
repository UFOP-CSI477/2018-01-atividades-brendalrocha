<?php include "header.php";?>

  <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h2>Cadastro de Funcionários</h2>
      </div>
      <div class="panel-body">
        <div class="alert alert-danger" style="display: none;  text-align: center;" id="alert-cadastrar-funcionario"></div>
        <form method="post" action="funcionario-router.php?solicitacao=2" id="funcionario-create">
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
            
          <div class="form-group">
            <label for="type">Tipo:</label>
            <select id="type" name="type">
              <option value="1">Administrador</option>
              <option value="2" selected>Operador</option>
            </select>
          </div>

          <input type="button" value="Cadastrar" name="cadastrar-funcionario" class="btn btn-default">
          <input type="reset" value="Limpar" class="btn btn-default">

        </form>
      </div>
    </div>
  </div>

<?php include "./view/footer.php";?>