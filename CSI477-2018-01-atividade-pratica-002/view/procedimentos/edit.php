<div class="container">

  <div class="panel panel-default">
    <div class="panel-heading">
      <h2>Editar Procedimento</h2>
    </div>
    <div class="panel-body">
      <div class="alert alert-danger" style="display: none;  text-align: center;" id="alert-editar-procedimento"></div>
      <form method="post" action="funcionario-router.php?solicitacao=11" id="procedimento-edit">
          <?php 
            foreach($select as $linha):
             if($type==1){
              echo "<div class=\"form-group\">";
              echo "<label for=\"nome\">Nome:</label>";
              echo "<input type=\"text\" name=\"name\" class=\"form-control\" value=\"".$linha[1]."\">";
              echo "</div>";
             }else{
              echo "<input id=\"name\" name=\"name\" type=\"hidden\" value=\"".$linha[1]."\">";
             }
          ?>

            <div class="form-group">
              <label for="nome">Preço:</label>
              <input type="text" name="price" class="form-control" value="<?php echo $linha[2]; ?>">
            </div>
            
            <input id="user_id" name="user_id" type="hidden" value="<?php echo $logado; ?>">
            <input id="id" name="id" type="hidden" value="<?php echo $linha[0]; ?>">


          <?php endforeach ?>

        <input type="button" value="Editar" name="editar-procedimento" class="btn btn-default">
        <input type="reset" value="Limpar" class="btn btn-default">

      </form>
    </div>
  </div>
</div>