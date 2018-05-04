function validarCampo(campo,nome){
	if(isNaN(campo) || campo.length==0){
		$("#alert").append("<p>"+nome+"</p>");
		return 1;
	}

	if(nome==="Altura" && campo<100){
		$("#alert").append("<p>"+nome+" é menor que 1 metro. As medidas estão em centímetros.</p>");
		return 1;
	}
	return 0;
}

function imc(peso,altura) {
	var altura2 = altura*altura;
	var imc = peso/altura2;

	return imc.toFixed(2);
}

function classificacao(imc) {
	var msg ="";
	if(imc<18.5){
		msg = "Subnutrição";

		if(imc<16){
			msg += ": Magreza Grave";
		}else if (imc<17) {
			msg += ": Magreza Moderada";
		}else{
			msg += ": Magreza Leve";
		}
	}else if (imc<24.5) {
		msg = "Peso Saudável";
	}else if (imc<29.9) {
		msg = "Sobrepeso";
	}else if (imc<34.9) {
		msg = "Obesidade Grau 1"
	}else if (imc<39.9) {
		msg = "Obesidade Grau 2"
	}else{
		msg = "Obesidade Grau 3"
	}

	return msg;
}

function pesoIdeal(altura, sexo) {
	// Mulheres: Peso Ideal = 49 kg + 1,7 kg para cada 2,54 cm acima dos 152,4 cm
	// Homens: Peso Ideal = 50 kg + 2,3 kg para cada 2,54cm acima dos 152,4 cm

	//sexo = 0 ---> mulheres
	var diferenca = parseInt(((altura*100)-152.4) / 2.54);
	var peso = 0;

	if(sexo == 0){
		peso = 49+(diferenca*1.7);
	}else{
		peso = 50+(diferenca*2.3)
	}

	return peso.toFixed(2);
}

function pesoMin(altura,sexo) {
	// Peso	ideal mínimo =	(altura)2 X 19 para mulheres e x 20 para homens
	//sexo = 0 ---> mulheres
	var peso = 0;
	var altura2 = altura*altura;

	if(sexo == 0){
		peso = altura2*19;
	}else{
		peso = altura2*20;
	}

	return peso.toFixed(2);
}

function pesoMax(altura,sexo) {
	// Peso	ideal máximo = (altura)2 x 24 para mulheres e x	25 para homens
	//sexo = 0 ---> mulheres
	var peso = 0;
	var altura2 = altura*altura;

	if(sexo == 0){
		peso = altura2*24;
	}else{
		peso = altura2*25;
	}
	
	return peso.toFixed(2);
}

function showResults() {
	$("#imc-result").show();
	$("#classificacao-result").show();

	$("#peso-mulheres-result").show();
	$("#peso-homens-result").show();

	$("#peso-min-mulheres-result").show();
	$("#peso-max-mulheres-result").show();

	$("#peso-min-homens-result").show();
	$("#peso-max-homens-result").show();
}

function clearAll(){
	$("#alert > p").html("");
	$("#alert").append("<p>Os campos abaixo não foram preenchidos corretamente: </p>");
	$("#alert").append("<p>Sugestão: Você pode estar usando ',' no lugar de '.'<br>Tente fazer assim: 12.3 ou 123.4</p>");

	$("#imc-result").html("");
	$("#classificacao-result").html("");

	$("#peso-mulheres-result").html("");
	$("#peso-homens-result").html("");

	$("#peso-min-mulheres-result").html("");
	$("#peso-max-mulheres-result").html("");
	$("#peso-min-homens-result").html("");
	$("#peso-max-homens-result").html("");

}

$(document).ready(function() {
	console.log("Documento carregado!");

	$("input[name='calcular'").click(function() {
		clearAll();

		var peso = $("input[name='peso").val();
		var alturaCM = $("input[name='altura").val();

		if(validarCampo(peso,"Peso")==1 || validarCampo(alturaCM,"Altura")==1){
			$("#alert").show();
		}else {

			$("#alert").hide();

			var altura = alturaCM/100;
			var imcResult = imc(peso,altura);
			
			$("#imc-result").append(imcResult);
			$("#classificacao-result").append(classificacao(imcResult));

			$("#peso-mulheres-result").append(pesoIdeal(altura,0));
			$("#peso-homens-result").append(pesoIdeal(altura,1));

			$("#peso-min-mulheres-result").append(pesoMin(altura,0));
			$("#peso-max-mulheres-result").append(pesoMax(altura,0));

			$("#peso-min-homens-result").append(pesoMin(altura,1));
			$("#peso-max-homens-result").append(pesoMax(altura,1));

			showResults();
		}

	});
});