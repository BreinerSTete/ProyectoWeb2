var ctxBarrasModernas = document.getElementById('graficoBarras').getContext('2d');

// Configurar los datos y opciones del gráfico de barras moderno
console.log(datos);

if (typeof datos !== 'undefined') {
   var coloresVerdes = generarColoresVerdes(Object.keys(datos).length);

   var datosGraficoBarrasModernas = {
      labels: Object.keys(datos),
      datasets: [{
         label: 'Número de Inmuebles',
         data: Object.values(datos),
         backgroundColor: coloresVerdes,
         borderColor: 'rgba(0, 90, 60, 0.7)',
         borderWidth: 1,
         hoverBackgroundColor: coloresVerdes.map(color => color.replace('0.1', '0.3')),
         hoverBorderColor: coloresVerdes.map(color => color.replace('0.1', '1')),
      }]
   };

   var opcionesGraficoBarrasModernas = {
      responsive: true,
      maintainAspectRatio: true,
      scales: {
         x: {
            grid: {
               display: true
            }
         },
         y: {
            grid: {
               color: 'rgba(0, 0, 0, 0.1)',
            },
            ticks: {
               beginAtZero: true,
               stepSize: 1,
               callback: function (value) {
                  return Number.isInteger(value) ? value : '';
               }
            }
         }
      },
      plugins: {
         legend: {
            display: true,
         }
      }
   };

   // Crear el gráfico de barras moderno
   var miGraficoBarrasModernas = new Chart(ctxBarrasModernas, {
      type: 'bar',
      data: datosGraficoBarrasModernas,
      options: opcionesGraficoBarrasModernas
   });
} else {
   console.error("La variable datos no está definida o no tiene información.");
}

function generarColoresVerdes(cantidad) {
   var colores = [];
   for (var i = 0; i < cantidad; i++) {
      colores.push(`rgba(0, 192, 100, ${(i + 1) / (cantidad + 1)})`);
   }
   return colores;
}
