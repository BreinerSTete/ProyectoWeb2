// Datos para el gráfico de barras
var data = {
    labels: ["Sincelejo", "Montería", "Corozal", "Magangué", "Valledupar", "Barranquilla", "Santa Marta"],
    datasets: [
        {
            label: "Inmuebles",
            data: [10, 4, 11, 2, 1, 5, 8],
            backgroundColor: '#559e52'
        }
    ]
};

// Configuración del gráfico
var ctx = document.getElementById('barChart').getContext('2d');
var barChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

document.addEventListener("DOMContentLoaded", function() {
  const puntualidadData = []; // Almacenar datos de puntualidad
  const labels = []; // Almacenar etiquetas

  // Obtener las filas de la tabla, excluyendo la fila de encabezado
  const rows = document.querySelectorAll("table tbody tr");

  // Iterar a través de las filas de la tabla para obtener los datos de puntualidad
  rows.forEach(function(row) {
    const puntualidadCell = row.querySelector("td:last-child");
    const puntualidad = parseInt(puntualidadCell.innerText);

    const apartamentoCell = row.querySelector("th:first-child");
    const apartamento = apartamentoCell.innerText;

    puntualidadData.push(puntualidad);
    labels.push(`Apartamento ${apartamento}`);
  });

  // Crear un objeto de datos para el gráfico de pastel
  const data = {
    labels: labels,
    datasets: [{
      data: puntualidadData,
      backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56"], // Colores de las porciones del pastel
    }],
  };

  // Obtener el elemento canvas
  const ctx = document.getElementById("puntualidadChart").getContext("2d");

  // Crear el gráfico de pastel
  const myPieChart = new Chart(ctx, {
    type: "pie",
    data: data,
  });
});