<?php include 'header.php'; ?>

  <div class="container">
    <h3>Solicitação de exames</h3>
    <a href="paciente-router.php?solicitacao=1" class="btn btn-default">Solicitar agendamento</a>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Nome do exame</th>
            <th>Preço</th>
          </tr>
        </thead>
      
      <?php 
         foreach($lista as $linha): ?>
      <tr>
        <td><?= $linha["name"]; ?></td>
        <td><?= $linha["price"]; ?></td>
      </tr>
      <?php endforeach ?>
    </table>

  </div>
    
<?php include "./view/footer.php";?>