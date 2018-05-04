function showAlert(tipo) {
	$(tipo).show();
}

function clearAlerts(atv){
	$("#alert-atv"+atv+" > p").html("");
	$("#alert-atv"+atv).append("<p>Você não colocou um opção para essa atividade: </p>");

	$("#desempenho-atv"+atv+" > p").html("");
	$("#desempenho-atv"+atv).append("<p>Respostas</p>");
}

function vericarIsNaN(campo,nome,atv){
	if(isNaN(campo) || campo.length==0){
		$("#alert-atv"+atv).append("<p id="+campo+"-p'>"+nome+"</p>");
		return 1;
	}
	return 0;
}

function verificarUndefined(campo, nome, atv) {
	if($("input[name='"+campo+"']:checked").val()===undefined){
		$("#alert-atv"+atv).append("<p id="+campo+"-p'>"+nome+"</p>");
		return 1;
	}

	return 0;
}

function verificarResposta(campo,resposta,nome,grupo,atv) {
	if(campo === resposta){
		$("#desempenho-atv"+atv).append("<p>"+grupo+": Acertou!</p>");
	}else{
		$("#desempenho-atv"+atv).append("<p>"+grupo+": Errou!</p>");
	}
	
	$("#"+nome+"-p").remove();
}

$(document).ready(function() {
	console.log("Documento carregado!");
	
	$("input[name='submit-atv1'").click(function() {
		clearAlerts("1");

		var atv1Ex1 = $("input[name='atv1-1']:checked").val();
		var atv1Ex2 = $("input[name='atv1-2']:checked").val();
		var atv1Ex3 = $("input[name='atv1-3']:checked").val();
		var atv1Ex4 = $("input[name='atv1-4']:checked").val();

		//console.log("1: "+atv1Ex1+" | 2: "+atv1Ex2+" | 3: "+atv1Ex3+" | 4: "+atv1Ex4);

		var verifica = 0;

		if(verificarUndefined("atv1-1","Grupo 1","1") == 1 || 
		   verificarUndefined("atv1-2","Grupo 2","1") == 1 || 
		   verificarUndefined("atv1-3","Grupo 3","1") == 1 || 
		   verificarUndefined("atv1-4","Grupo 4","1") == 1 ){
			showAlert("#alert-atv1");
		}else{
			verificarResposta(atv1Ex1,"1b","atv1-1","Grupo 1","1");
			verificarResposta(atv1Ex2,"2c","atv1-2","Grupo 2","1");
			verificarResposta(atv1Ex3,"3d","atv1-3","Grupo 3","1");
			verificarResposta(atv1Ex4,"4d","atv1-4","Grupo 4","1");

			$("#alert-atv1").hide();
			showAlert("#desempenho-atv1");
		}

	});

	$("input[name='submit-atv2'").click(function() {
		clearAlerts("2");

		var circulos = $("input[name='circulos']").val();
		var retangulos = $("input[name='retangulos']").val();
		var quadrados = $("input[name='quadrados']").val();
		var triangulos = $("input[name='triangulos']").val();


		if(vericarIsNaN(quadrados,"Quadrados","2") == 1 ||
		   vericarIsNaN(triangulos,"Triângulos","2") == 1 ||
		   vericarIsNaN(retangulos,"Retângulos","2") == 1 ||
			vericarIsNaN(circulos,"Circulos","2") == 1){
			showAlert("#alert-atv2");
		}else{
			verificarResposta(circulos,"1","Circulos","Circulos","2");
			verificarResposta(retangulos,"2","Retângulos","Retângulos","2");
			verificarResposta(quadrados,"3","Quadrados","Quadrados","2");
			verificarResposta(triangulos,"4","Triângulos","Triângulos","2");

			$("#alert-atv2").hide();
			showAlert("#desempenho-atv2");
		}
	});

});