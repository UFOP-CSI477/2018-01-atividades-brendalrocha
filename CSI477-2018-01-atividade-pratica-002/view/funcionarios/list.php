<div class="container">
	<h2>Funcionários cadastrados</h2>
	<a href="funcionario-router.php?solicitacao=1" class="btn btn-default">Cadastrar funcionário</a>
	<div class="row">
		<div class="col-md-6">
			<h3>Administradores</h3>
			<table class="table table-hover">
				<tr>
					<th>Nome</th>
					<th>E-mail</th>
					<th>Ações</th>
				</tr>

				<?php foreach($adm as $linha): ?>
				<tr>
					<td><?php echo $linha["name"]; ?></td>
					<td><?= $linha["email"]; ?></td>
					<td>
		              <!-- <a href="funcionario-router.php?solicitacao=3&id=<?= $linha["id"]; ?>" class="btn btn-default">Alterar</a> -->
		              <a href="funcionario-router.php?solicitacao=4&id=<?= $linha["id"]; ?>" class="btn btn-default">Excluir</a>
		            </td>
				</tr>

				<?php endforeach ?>
			</table>
		</div>

		<div class="col-md-6">
			<h3>Operadores</h3>
			<table class="table table-hover">
				<tr>
					<th>Nome</th>
					<th>E-mail</th>
					<th>Ações</th>
				</tr>

				<?php foreach($op as $linha): ?>
				<tr>
					<td><?php echo $linha["name"]; ?></td>
					<td><?= $linha["email"]; ?></td>
					<td>
		              <!-- <a href="funcionario-router.php?solicitacao=3&id=<?= $linha["id"]; ?>" class="btn btn-default">Alterar</a> -->
		              <a href="funcionario-router.php?solicitacao=4&id=<?= $linha["id"]; ?>" class="btn btn-default">Excluir</a>
		            </td>
				</tr>

				<?php endforeach ?>
			</table>
		</div>

	</div>


	
</div>