<?php include 'header.php';?>

  <div class="container top">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h2>Agendamento de Exame</h2>
      </div>
      <div class="panel-body">
        <div class="alert alert-danger" style="display: none;  text-align: center;" id="alert-agendar-exame"></div>

        <form method="post" action="paciente-router.php?solicitacao=2" id="agendar-exames">
          <div class="form-group">
            <label for="nome">Procedimento:</label>
            <select name="procedure_id">
              <option value="">Nome - Preço</option>
              <?php foreach ($lista as $procedimento): ?>
                <option value="<?= $procedimento['id']?>"><?= $procedimento['name']?> - <?= $procedimento['price']?></option>
              <?php endforeach ?>
            </select>
          </div>

          <div class="form-group">
            <label for="nome">Data:</label>
            <input type="date" name="date" class="form-control" placeholder="Data">
          </div>  

          <input id="user_id" name="user_id" type="hidden" value="<?php echo $logado; ?>">
          <input type="button" value="Cadastrar" name="agendar-exame" class="btn btn-default">
          <input type="reset" value="Limpar" class="btn btn-default">

        </form>

      </div>
    </div>

    
  </div>
    <?php include "./view/footer.php";?>