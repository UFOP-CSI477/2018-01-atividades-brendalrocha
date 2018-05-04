function validarCampo(campo,nome){
	if(isNaN(campo) || campo.length==0){
		$("#alert").append("<p id="+campo+"-p'>"+nome+"</p>");
		return 1;
	}
	return 0;
}

function clearAll(){
	$("#alert > p").html("");
	$("#alert").append("<p>Os campos abaixo não foram preenchidos corretamente: </p>");

	$("#magnitude").html("");
	$("#escala-cor").removeClass('bkg1');
	$("#escala-cor").removeClass('bkg2');
	$("#escala-cor").removeClass('bkg3');
	$("#escala-cor").removeClass('bkg4');
	$("#escala-cor").removeClass('bkg5');
	$("#escala-cor").removeClass('bkg6');
}

function escala(magnitude){
	if(magnitude<=3.5){
		$("#escala-cor").addClass('bkg1');
	}else if (magnitude<=5.4) {
		$("#escala-cor").addClass('bkg2');
	}else if (magnitude<=6.0) {
		$("#escala-cor").addClass('bkg3');
	}else if (magnitude<=6.9) {
		$("#escala-cor").addClass('bkg4');
	}else if (magnitude<=7.9) {
		$("#escala-cor").addClass('bkg5');
	}else{
		$("#escala-cor").addClass('bkg6');
	}
}

$(document).ready(function() {
	console.log("Documento carregado!");

	$("input[name='calcular'").click(function() {
		clearAll();

		var amplitude = $("input[name='amplitude").val();
		var deltat = $("input[name='deltat").val();

		if(validarCampo(amplitude,"Amplitude")==1 ||
		   validarCampo(deltat,"Intervalo de Tempo")==1){
			$("#alert").show();
		}else {
			$("#alert").hide();
			var M = Math.log10(amplitude) + (3*Math.log10(8*deltat)) - 2.92;

			$("#magnitude").append(M);
			$("#resultado").show();

			escala(M);
		}

	});
});