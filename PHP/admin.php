<!doctype html>
<html lang="es">
<head>
  <title>Panel de Administración</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="../CSS/admin.css">
</head>
<body>
    <!-- Navigator -->
<header>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="rentals.php">
    <h3><img src="../Assets/logo.png" alt="Logo" style="max-height: 2em;">RentEasy</h3>
    </a>
  </div>
</nav>
</header>


<div class="container">
    <h3>Estadísticas</h1>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">Apartamento</th>
      <th scope="col">Nombre Arrendatario</th>
      <th scope="col">Apellido Arrendatario</th>
      <th scope="col">Valor Último pago</th>
      <th scope="col">Fecha de pago</th>
      <th scope="col">Puntualidad</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">001</th>
      <td>Juan</td>
      <td>Salgado</td>
      <td><b>$1.200.000</b></td>
      <td>1-11-2023 (14 días restantes)</td>
      <td><b>99%</b></td>
    </tr>
    <tr>
      <th scope="row">002</th>
      <td>Alex</td>
      <td>Guerrero</td>
      <td><b>$1.600.000</b></td>
      <td>25-10-2023 (7 días restantes)</td>
      <td><b>100%</b></td>
    </tr>
    <tr>
      <th scope="row">003</th>
      <td>Andrés</td>
      <td>Pérez</td>
      <td><b>$800.000</b></td>
      <td>30-10-2023 (12 días restantes)</td>
      <td><b>96%</b></td>
    </tr>
  </tbody>
</table>
</div>
<br>
<div class="charts">
  <div>
  <h3 style="text-align: center;">Categorización de los Inmuebles por Ubicación</h3>
  <br>
<canvas id="barChart" width="400" height="200"></canvas>
  </div>
    
<div>
<h3 style="text-align: center;">Puntualidad de los Arrendatarios</h3>
<canvas id="puntualidadChart" width="400" height="400"></canvas>
</div>

</div>



  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="../JavaScript/admin.js"></script>
</body>
</html>