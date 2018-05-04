var barChartData = {
	labels: [],
	datasets: [{
		label: 'Entre 0 e 3,5',
		backgroundColor:"#00AB00",
		data: [ 
		3.5
		]
	}, {
		label: 'Entre 3,6 e 5,4',
		backgroundColor: "#E6D202",
		data: [
		1.9
		]
	}, {
		label: 'Entre 5,5 e 6',
		backgroundColor: "#DF9F33",
		data: [
		0.6
		]
	}, {
		label: 'Entre 6,1 e 6,9',
		backgroundColor: "#D2692F",
		data: [
		0.9
		]
	}, {
		label: 'Entre 7 e 7,9',
		backgroundColor: "#D13632",
		data: [
		1
		]
	}, {
		label: '8 ou mais',
		backgroundColor: "#C80E40",
		data: [
		2.1
		]
	}]
};

window.onload = function() {
	var ctx = document.getElementById('canvas').getContext('2d');
	window.myBar = new Chart(ctx, {
		type: 'horizontalBar',
		data: barChartData,
		options: {
			title: {
				display: true,
				text: 'Escala Richter'
			},
			tooltips: {
				mode: 'index',
				intersect: true
			},
			responsive: true,
			scales: {
				xAxes: [{
					stacked: true,
				}],
				yAxes: [{
					stacked: true
				}]
			},
			legend: {
				display: true,
				fullWidth: true,
				position: 'bottom',
				labels:{
					boxWidth: 20,
					fontSize: 10
				}

			}
		}
	});
};