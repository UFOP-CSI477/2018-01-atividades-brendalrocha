<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h2>Cadastro de Procedimento</h2>
    </div>
    <div class="panel-body">
      <div class="alert alert-danger" style="display: none;  text-align: center;" id="alert-cadastrar-procedimento"></div>
      <form method="post" action="funcionario-router.php?solicitacao=8" id="procedimento-create">
        <div class="form-group">
          <label for="nome">Nome:</label>
          <input type="text" name="name" class="form-control" placeholder="Nome">
        </div>

        <div class="form-group">
          <label for="nome">Preço:</label>
          <input type="text" name="price" class="form-control" placeholder="Preço">
        </div>
          
        <input id="user_id" name="user_id" type="hidden" value="<?php echo $logado; ?>">

        <input type="button" value="Cadastrar" name="cadastrar-procedimento" class="btn btn-default">
        <input type="reset" value="Limpar" class="btn btn-default">
      </form>
    </div>
  </div>
</div>
