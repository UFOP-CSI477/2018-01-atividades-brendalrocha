function validar(campo,nome_id, nome) {
	//validando o campo
	if(campo.length==0){
		$("#group-"+nome_id).addClass('has-error');
		$("input[name='"+nome_id+"'").val("");
		$("input[name="+nome_id+"").focus();

		$("#alert-"+nome_id).append("<p id='"+nome+"'-p'>"+nome+"</p>");

		return 1;
	}
	//se n1 estiver correto, a classe de erro deve ser removida e devemos ocultar a msg
	$("#group-"+nome_id).removeClass('has-error');
	$("#alert-"+nome_id).hide();
	$("#"+nome+"-p").remove();

	return 0;
}

function validarSelection(campo,nome_id, nome) {
	//validando o campo
	if(campo==0){
		$("#group-"+nome_id).addClass('has-error');
		$("input[name='"+nome_id+"'").val("");
		$("#alert-"+nome_id).append("<p id='"+nome+"'-p'>"+nome+"</p>");

		return 1;
	}
	//se n1 estiver correto, a classe de erro deve ser removida e devemos ocultar a msg
	$("#group-"+nome_id).removeClass('has-error');
	$("#alert-"+nome_id).hide();
	$("#"+nome+"-p").remove();

	return 0;
}

function showAlert(nome_id) {
	$("#alert-"+nome_id).show();
}

function clearAlerts(nome_id){
	$("#alert-"+nome_id+" > p").html("");
	$("#alert-"+nome_id).append("<p>Os seguintes campos não estão preenchidos corretamente:</p>");
}

$(document).ready(function() {
	console.log("Documento carregado!");

	$("input[name='button-cadastrar'").click(function() {

		clearAlerts("b1");
		clearAlerts("b2");
		clearAlerts("b3");
		clearAlerts("b4");

		var nome = $("input[name='nome']").val();
		var data_nascimento = $("input[name='data']").val();
		var cpf = $("input[name='cpf']").val();
		var genero = $("input[name='genero']").val();

		var logradouro = $("input[name='logradouro']").val();
		var numero = $("input[name='numero']").val();
		var bairro = $("input[name='bairro']").val();
		var cidade = $("select[name='cidade']").val();
		var telefone = $("input[name='telefone']").val();

		var areas = $("input[name='area']").val();
		var experiencia = $("input[name='experiencia']").val();

		var user = $("input[name='usuario']").val();
		var senha = $("input[name='senha']").val();


		if(validar(nome,"b1","Nome") == 1){	showAlert("b1"); }
		if(validar(data_nascimento,"b1","Data de Nascimento") == 1){ showAlert("b1"); }
		if(validar(cpf,"b1","CPF") == 1){ showAlert("b1"); }
		
		//console.log("Genero: "+$("input[name='genero']:checked").val());
		if($("input[name='genero']:checked").val()===undefined){
			$("#alert-b1").append("<p id=genero-p'>Gênero</p>");
			showAlert("b1");
		}
		else{
			if(validar(genero,"b1","Gênero") == 1){ showAlert("b1"); }	
		}

		if(validar(logradouro,"b2","Logradouro") == 1){ showAlert("b2"); }
		if(validar(numero,"b2","Número") == 1){ showAlert("b2"); }
		if(validar(bairro,"b2","Bairro") == 1){ showAlert("b2"); }
		if(validarSelection(cidade,"b2","Cidade") == 1){ showAlert("b2"); }
		if(validar(telefone,"b2","Telefone") == 1){ showAlert("b2"); }

		if(validar(user,"b4","Usuário") == 1){ showAlert("b4"); }
		if(validar(senha,"b4","Senha") == 1){ showAlert("b4"); }

		
	});
	
});