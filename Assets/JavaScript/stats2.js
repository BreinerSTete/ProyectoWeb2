var ctxEstadosPastel = document.getElementById('statePieChart').getContext('2d');

// Verificar si datosEstadoInmuebles está definido
if (typeof datosEstadoInmuebles !== 'undefined') {
    // Configurar los datos y opciones del gráfico de pastel
    var datosGraficoEstadosPastel = {
        labels: Object.keys(datosEstadoInmuebles),
        datasets: [{
            data: Object.values(datosEstadoInmuebles),
            backgroundColor: [
                'rgba(0, 192, 100, 0.2)',
                'rgba(255, 99, 132, 0.2)'
            ],
            borderColor: [
                'rgba(0, 192, 100, 1)',
                'rgba(255, 99, 132, 1)'
            ],
            borderWidth: 1
        }]
    };

    var opcionesGraficoEstadosPastel = {
        responsive: true,
        maintainAspectRatio: true,
        title: {
            display: true,
            text: 'Estados de Inmuebles',
            fontSize: 18,
            fontColor: '#333'
        },
        legend: {
            display: true,
            position: 'bottom',
            labels: {
                fontColor: '#666',
                fontSize: 14
            }
        },
        tooltips: {
            callbacks: {
                label: function (tooltipItem, data) {
                    var dataset = data.datasets[tooltipItem.datasetIndex];
                    var total = dataset.data.reduce((previousValue, currentValue) => previousValue + currentValue);
                    var currentValue = dataset.data[tooltipItem.index];
                    var percentage = Math.floor(((currentValue / total) * 100) + 0.5);
                    return `${data.labels[tooltipItem.index]}: ${currentValue} (${percentage}%)`;
                }
            }
        }
    };

    // Crear el gráfico de pastel
    var graficoEstadosPastel = new Chart(ctxEstadosPastel, {
        type: 'pie',
        data: datosGraficoEstadosPastel,
        options: opcionesGraficoEstadosPastel
    });
} else {
    console.error("La variable datosEstadoInmuebles no está definida o no tiene datos.");
}
