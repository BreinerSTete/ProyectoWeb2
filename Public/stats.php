<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == false) {
  header('Location: ../index.php');
}
include '../Assets/Private/connection.php';
$numeroIdentificacion = $_SESSION['numeroIdentificacion'];
?>
<!doctype html>
<html lang="es">
  <head>
    <title>Estadísticas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="RentEasy es una página web que da la posibilidad de publicar propiedades en renta para que otras personas las renten.">
    <link rel="stylesheet" href="../Assets/CSS/rentals.css">
    <link rel="shortcut icon" href="../Assets/Media/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
      <!-- Navigator -->
      <header>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container">
            <a href="#  " class="navbar-brand" style="position: relative; top: 13px;">
                <h3><img src="../Assets/Media/logo.png" alt="Logo" style="position: relative; top: -5px; max-height: 2em;">RentEasy</h3>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsedNavbar" aria-controls="collapsedNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsedNavbar">
                <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                        <a href="lessor.php" class="nav-link">
                        <button class="btn btn-outline-dark"><i class="ri-arrow-left-line"></i> Mis Inmuebles</button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="interested.php" class="nav-link position-relative">
                            <button class="btn btn-outline-primary"><i class="ri-user-follow-fill"></i> Interesados
                            <span style="top: 10px; right: -15px;" class="position-absolute top-15 start-90 translate-middle badge rounded-pill bg-danger">
                            
                        <?php
                            $interesados = "SELECT interesados FROM inmueble";

                            $result = $connect->query($interesados);

                            $interesadosArray = [];

                            if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                            $interesadosArray = array_merge($interesadosArray, explode(',', $row['interesados']));
                            }
                            }

                            $interesadosArray = array_unique($interesadosArray);

                            $cantidadInteresados = count($interesadosArray);

                            echo $cantidadInteresados - 1;

                        ?>
                            </span></button>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="stats.php" class="nav-link">
                            <button class="btn btn-outline-warning"><i class="ri-bar-chart-2-fill"></i> Estadísticas</button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="profile.php" class="nav-link">
                            <button class="btn btn-outline-success"><i class="ri-account-pin-circle-fill"></i> Mi Perfil</button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../Assets/Private/logout.php" class="nav-link">
                            <button class="btn btn-outline-danger"><i class="ri-shut-down-line"></i> Cerrar Sesión</button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

  <div class="container" style="margin-bottom: 10em;">
    <div class="inmuebles">
        <?php
$queryInmuebles = "SELECT * FROM inmueble
WHERE propietario = '$numeroIdentificacion'";


$resultMisInmuebles = mysqli_query($connect, $queryInmuebles);

if ($resultMisInmuebles && mysqli_num_rows($resultMisInmuebles) > 0) {
    echo '<div class="container mt-4">';
    echo '<h2 class="mb-4 text-center">Mis Inmuebles</h2>';
    echo '<table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Inmueble</th>
                    <th>Ubicación</th>
                    <th>Estado</th>
                    <th>Inquilino</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>';
    
    while ($row = mysqli_fetch_assoc($resultMisInmuebles)) {
        echo '<tr>
    <td>' . $row['idInmueble'] . '</td>
    <td>' . $row['tituloPublicacion'] . '</td>
    <td>' . $row['ciudad'] . ', ' . $row['departamento'] . '</td>
    <td>';
    // Lógica condicional para el estado del inmueble
    if ($row['estado'] == 'Disponible') {
        echo '<p class="card-text"><span class="badge rounded-pill text-bg-success" style="font-size: 14px;">' . $row['estado'] . '</span></p>';
    } else {
        echo '<p class="card-text"><span class="badge rounded-pill text-bg-danger" style="font-size: 14px;">' . $row['estado'] . '</span></p>';
    }
    echo '</td>
        <td class="text-center">';
    
    // Verificar si hay inquilino
    if ($row['inquilino']) {
        echo '<button type="button" onclick="searchTenant(' . $row['inquilino'] . ')" class="btn btn-link" data-toggle="modal" data-target="#infoInquilino">' . $row['inquilino'] . '</button>';

    } else {
        echo 'Ninguno';
    }
    
    echo '</td>
        <td>$' . number_format($row['valorArriendo'], 2, ',', '.') . '</td>
    </tr>';
    }
    
    echo '</tbody>
          </table>';
    echo '</div>';
    
} else {
    echo '<div class="text-center">';
    echo '<br><h4>Aún no se han publicado inmuebles.</h4><br>';
    echo '<img class="rounded mx-auto d-block" src="../Assets/Media/420.gif" alt="Windows XP Error Dialog" style="margin: 0 auto;">';
    echo '</div>';
}


        ?>
        <br>
        </div>
        <div class="d-flex">
                <div class="col text-center">
                    <h4>Categorización de Inmuebles por Ubicación</h4>
                    <div class="grafico text-center"  style="height: 280px; width: 100%;">
                    <br>
                    <canvas id="graficoBarras" style="margin: 0 auto; width: 100%;"></canvas>
                    </div>

<?php
    // Realiza la consulta SQL para obtener la categorización de inmuebles por ubicación
    $queryInmuebles = "SELECT Ciudad, COUNT(*) AS NumeroInmuebles FROM inmueble
    WHERE propietario = '$numeroIdentificacion'
     GROUP BY ciudad";
    $resultInmuebles = mysqli_query($connect, $queryInmuebles);

    // Verifica si la consulta fue exitosa
    if ($resultInmuebles && mysqli_num_rows($resultInmuebles) > 0) {
        // Crea un array para almacenar los datos
        $datosInmuebles = array();

        // Itera sobre los resultados y agrega los datos al array
        while ($row = mysqli_fetch_assoc($resultInmuebles)) {
            $ciudad = $row['Ciudad'];
            $numeroInmuebles = $row['NumeroInmuebles'];
            $datosInmuebles[$ciudad] = $numeroInmuebles;
        }

        echo '<script>
                var datos = ' . json_encode($datosInmuebles) . ';
              </script>';

    }
    ?>
                </div>
                <div class="col text-center">
                    <h4>Estado de Inmuebles</h4>
                    <br>
                    <canvas id="statePieChart" style="margin: 0 auto; width: 100%; max-height: 17em;"></canvas>




                    <?php
$queryEstadosInmuebles = "SELECT estado, COUNT(*) as cantidad FROM inmueble
                          WHERE propietario = '$numeroIdentificacion'
                          GROUP BY estado";

$resultEstadosInmuebles = mysqli_query($connect, $queryEstadosInmuebles);

// Verificar si la consulta fue exitosa
if ($resultEstadosInmuebles) {
    // Crear un array para almacenar los datos de estado de inmuebles
    $datosEstadoInmuebles = array();

    // Iterar sobre los resultados y agregar los datos al array
    while ($row = mysqli_fetch_assoc($resultEstadosInmuebles)) {
        $estado = $row['estado'];
        $cantidad = $row['cantidad'];
        $datosEstadoInmuebles[$estado] = $cantidad;
    }
    echo '<script> var datosEstadoInmuebles = '.json_encode($datosEstadoInmuebles).';</script>';
} else {
    
    echo json_encode(array('error' => 'Error en la consulta.'));
}
?>


                </div>
            </div>
        </div>   
        </div>

        <div class="modal fade" id="infoInquilino" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body" id="infoPerfil"></div>
    </div>
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../Assets/JavaScript/stats.js"></script>
    <script src="../Assets/JavaScript/stats2.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script>
        function searchTenant(idTenant) {
    $.ajax({
        url: '../Assets/Private/getTenantInfo.php',
        type: 'POST',
        data: { idTenant: idTenant },
        success: function (data) {
          $('#infoPerfil').html(data);
          $('#infoInquilino').modal('show');
        },
        error: function () {
          console.error('Error al cargar la información del inquilino.');
        }
      });
}
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
