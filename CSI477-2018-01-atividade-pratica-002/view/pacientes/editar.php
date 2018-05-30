<?php include 'header.php';?>

  <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h2>Alterar data do procedimento</h2>
      </div>
      <div class="panel-body">    
        <div class="alert alert-danger" style="display: none;  text-align: center;" id="alert-exame-date"></div>

        <form method="post" action="paciente-router.php?editar=1" id="exame-editar">
          <?php foreach ($lista as $procedimento): ?>
          <div class="form-group">
            <label for="nome">Procedimento:</label>
            <p><?= $procedimento['name']?></p>
          </div>

          <div class="form-group">
            <label for="nome">Data:</label>
            <input type="date" name="date" class="form-control" placeholder="Data" value="<?= $procedimento['date']?>">
          </div>  

          <input id="user_id" name="user_id" type="hidden" value="<?php echo $logado; ?>">
          <input type="hidden" name="id" id="id" value="<?= $procedimento['id']?>">

          <input type="button" value="Alterar Data" name="exame-date" class="btn btn-default">
          <input type="reset" value="Limpar" class="btn btn-default">
          <?php endforeach ?>
          
        </form>
      </div>
    </div>
  </div>
  
<?php include "./view/footer.php";?>