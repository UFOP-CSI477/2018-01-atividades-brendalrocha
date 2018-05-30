<div class="container">
	<h2>Procedimentos</h2>
	<a href="funcionario-router.php?solicitacao=6" class="btn btn-default">Cadastrar Procedimento</a>
	<br><br>
	<table class="table table-hover">
		<tr>
			<th>Nome</th>
			<th>Preço</th>
			<th>Cadastro realizado por</th>
			<th>Ações</th>
		</tr>

		<?php foreach($lista as $linha): ?>
		<tr>
			<td><?php echo $linha[1]; ?></td>
			<td><?= $linha[2]; ?></td>
			<td><?= $linha[3]; ?></td>
			<td>
              <a href="funcionario-router.php?solicitacao=9&id=<?= $linha[0]; ?>" class="btn btn-default">Alterar</a>
              <a href="funcionario-router.php?solicitacao=10&id=<?= $linha[0]; ?>" class="btn btn-default" name="procedimento-excluir">Excluir</a>
            </td>
		</tr>
		<?php endforeach ?>
	</table>
</div>