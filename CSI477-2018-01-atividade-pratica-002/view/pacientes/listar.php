<?php include "./view/header.php";?>

  <div class="container">
    <table class="table table-hover">
      <tr>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Atualização do Cadastro</th>
      </tr>

      <?php 
         foreach($lista as $linha): ?>
      <tr>
        <td><?php echo $linha["name"]; ?></td>
        <td><?= $linha["email"]; ?></td>
        <td><?= $linha["updated_at"]; ?></td>
      </tr>
      
      <?php endforeach ?>
    </table>
  </div>

<?php include "./view/footer.php";?>