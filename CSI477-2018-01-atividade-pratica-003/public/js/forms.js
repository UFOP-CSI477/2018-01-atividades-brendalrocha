function showAlert(alert) {
	$("#alert-"+alert).show();
}

function clearAlerts(alert){
	$("#alert-"+alert+" > p").html("");
	$("#alert-"+alert).append("<p>Os dados abaixo não foram preenchidos corretamente: </p>");
}

function showDialog() {
	$("#dialog-confirm").dialog({
      resizable: false,
      height: "auto",
      width: 400,
      modal: true,
      buttons: {
        "Confirmar": function() {
          $(this).dialog("close");
          $("#dialog-confirm").hide();
          return true;
        },
        Cancel: function() {
          $(this).dialog("close");
          $("#dialog-confirm").hide();
          return false;
        }
      }
    });
}

function verificarIsNaN(campo,nome,alert){
	if(isNaN(campo) || campo.length==0){
		$("#alert-"+alert).append("<p>"+nome+"</p>");
		return 1;
	}
	return 0;
}

function verifyType(campo,tipo,alert) {
	if(campo!=tipo || campo.length==0){
		$("#alert-"+alert).append("<p>Você não tem autorização para realizar esse cadastro.</p>");
		return 1;
	}
	return 0;
}

function empty(campo,nome,alert) {
	if(campo.length==0){
		$("#alert-"+alert).append("<p>"+nome+"</p>");
		return 1;
	}
	return 0;
}

function verifyPassword(password,confpassword,alert){
	if(password!=confpassword){
		$("#alert-"+alert).append("<p>Os campos de senha e confirmar senha devem ser iguais</p>");
		return 1;
	}
	return 0;
}

function verifyDate(date,alert) {
	var datenow = $.datepicker.formatDate('yymmdd', new Date());
	var datereplace = date.replace(/-/g,"");
	var sub = datereplace - datenow;

	if(sub<0){
		$("#alert-"+alert).append("<p>A data escolhida não é valida.</p>");
		return 1;
	}
	return 0;
}



$(document).ready(function() {
	console.log("Documento carregado!");

	//############### PROCEDIMENTOS ###############
	$("input[name='cadastrar-procedimento'").click(function() {
		clearAlerts("cadastrar-procedimento");

		var name = $("input[name='name'").val();
		var price = $("input[name='price'").val();

		//console.log(price.length);

		if(empty(name,"Nome","cadastrar-procedimento") || 
		   verificarIsNaN(price,"Preço","cadastrar-procedimento")){
			showAlert("cadastrar-procedimento");
		}else{
			$("#procedimento-create").submit();	
		}
	});

	$("input[name='editar-procedimento'").click(function() {
		clearAlerts("editar-procedimento");

		var name = $("input[name='name'").val();
		var price = $("input[name='price'").val();

		console.log(name.length);

		if(empty(name,"Nome","editar-procedimento") || 
		   verificarIsNaN(price,"Preço","editar-procedimento")){
			showAlert("cadastrar-procedimento");
		}else{
			$("#procedimento-edit").submit();	
		}
	});

	//############### PACIENTES ###############
	$("input[name='cadastrar-paciente'").click(function() {
		clearAlerts("cadastrar-paciente");

		var name = $("input[name='name'").val();
		var email = $("input[name='email'").val();
		var password = $("input[name='password'").val();
		var confPassword = $("input[name='confPassword'").val();

		var type = $("input[name='type'").val();

		console.log(type);

		if(empty(name,"Nome","cadastrar-paciente") ||
		   empty(email,"E-mail","cadastrar-paciente") || 
		   empty(password,"Senha","cadastrar-paciente") || 
		   empty(confPassword,"Confirmar Senha","cadastrar-paciente") || 
		   verifyPassword(password,confPassword,"cadastrar-paciente") ||
		   verifyType(type,3,"cadastrar-paciente")){
			showAlert("cadastrar-paciente");
		}else{
			$("#alert-cadastrar-paciente").hide();
			$("#paciente-create").submit();	
		
			
		}
	});

	//############### FUNCIONÁRIOS ###############
	$("input[name='cadastrar-funcionario'").click(function() {
		clearAlerts("cadastrar-funcionario");

		var name = $("input[name='name'").val();
		var email = $("input[name='email'").val();
		var password = $("input[name='password'").val();
		var confPassword = $("input[name='confPassword'").val();

		var type = $("select[name='type'").val();

		if(type!=1){
			if(type!=2){
				$("#alert-cadastrar-funcionario").append("<p>Você não tem autorização para realizar esse cadastro.</p>");
				showAlert("cadastrar-funcionario");
			}else {
				if(empty(name,"Nome","cadastrar-funcionario") ||
				   empty(email,"E-mail","cadastrar-funcionario") || 
				   empty(password,"Senha","cadastrar-funcionario") || 
				   empty(confPassword,"Confirmar Senha","cadastrar-funcionario") || 
				   verifyPassword(password,confPassword,"cadastrar-funcionario")){
					showAlert("cadastrar-funcionario");
				}else{
					$("#alert-cadastrar-funcionario").hide();
					$("#funcionario-create").submit();	
				}
			}

		}
	});

	//############### SOLICITAR AGENDAMENTO ###############
	$("input[name='agendar-exame'").click(function() {
		clearAlerts("agendar-exame");

		var name = $("select[name='procedure_id'").val();
		var date = $("input[name='date'").val();

		if(empty(name,"Nome","agendar-exame") || 
		   empty(date,"Data","agendar-exame") || 
		   verifyDate(date,"agendar-exame")){
			showAlert("agendar-exame");
		}else{
			$("#alert-agendar-exame").hide();
			$("#agendar-exames").submit();	
		}
	});

	$("input[name='exame-date'").click(function() {
		clearAlerts("exame-date");
		
		var date = $("input[name='date'").val();

		if(empty(date,"Data","exame-date") || 
		   verifyDate(date,"exame-date")){
			showAlert("exame-date");
		}else{
			$("#alert-exame-date").hide();
			$("#exame-editar").submit();	
		}
	});



});