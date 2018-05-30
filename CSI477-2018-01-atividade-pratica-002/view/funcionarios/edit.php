<?php include "header.php";?>

  <div class="container">
    <form method="post" action="funcionario-router.php?solicitacao=2">
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" name="name" class="form-control" placeholder="Nome" value="">
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
          <option value="2">Operador</option>
        </select>
      </div>

      <input type="submit" value="Cadastrar" id="cadastrar" class="btn btn-default">
      <input type="reset" value="Limpar" class="btn btn-default">

    </form>
  </div>

<?php include "./view/footer.php";?>