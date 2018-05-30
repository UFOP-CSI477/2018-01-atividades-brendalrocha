<?php include "./view/header.php";?>

<div class="container top">
	<h2>Procedimentos realizados</h2>
	<p>Abaixo é possível visualizar os procedimentos realizados por nosso laboratório.</p>
	<br>
	<table class="table table-hover">
		<tr>
			<th>Nome</th>
			<th>Preço</th>
		</tr>

		<?php //while($linha = $lista->fetch()){ ?>
		<?php 
			 foreach($lista as $linha): ?>

		<tr>
			<td><?php echo $linha["name"]; ?></td>
			<td><?= $linha["price"]; ?></td>
		</tr>

		<?php //}
			endforeach
		 ?>
	</table>
</div>

<?php include "./view/footer.php";?>