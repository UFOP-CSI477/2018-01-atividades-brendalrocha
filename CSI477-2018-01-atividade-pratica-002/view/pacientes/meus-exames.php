<?php include 'header.php';?>

  <div class="container">
    <h2>Exames Agendados</h2>
    <a href="paciente-router.php?solicitacao=1" class="btn btn-default">Solicitar agendamento</a>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Nome do exame</th>
            <th>Data</th>
            <th>Preço</th>
            <th>Ação</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <td align="right"><strong>Quantidade de exames</strong></td>
            <?php foreach($qtd as $total): ?>
            <td align="left"><?= $total[0]; ?></td>
            <?php endforeach ?>
            <td align="right"><strong>Total a pagar</strong></td>
            <?php foreach($preco as $total): ?>
            <td align="left"><?= $total[0]; ?></td>
            <?php endforeach ?>
          </tr>
        </tfoot>

        <?php foreach($lista as $linha): ?>
        <tbody>
          <tr>
            <td><?= $linha["name"]; ?></td>
            <td><?= $linha["date"]; ?></td>
            <td><?= $linha["price"]; ?></td>
            <td>
              <a href="paciente-router.php?solicitacao=4&procedimento=<?= $linha["id"]; ?>" class="btn btn-default">Alterar Data</a>
              <a href="paciente-router.php?solicitacao=5&procedimento=<?= $linha["id"]; ?>" class="btn btn-default">Excluir Procedimento</a>
            </td>
          </tr>
        </tbody>
        <?php endforeach ?>
    </table>
  </div>
    
<?php include "./view/footer.php";?>