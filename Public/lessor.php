<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == false) {
  header('Location: ../index.php');
}
include '../Assets/Private/connection.php';
$numeroIdentificacion = $_SESSION["numeroIdentificacion"];
?>
<!doctype html>
<html lang="es">
  <head>
    <title>RentEasy - Locales y Apartamentos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="RentEasy es una página web que da la posibilidad de publicar propiedades en renta para que otras personas las renten.">
    <link rel="stylesheet" href="../Assets/CSS/rentals.css">
    <link rel="shortcut icon" href="../Assets/media/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
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
                        <a href="interested.php" class="nav-link position-relative">
                            <button class="btn btn-outline-primary"><i class="ri-user-follow-fill"></i> Interesados</button>
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
<br>
  <div class="d-flex p-2">
  <div class="col">
  <?php
  if (isset($_SESSION['addedSuccesfully']) && $_SESSION['addedSuccesfully'] == true) {
    echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="ri-checkbox-circle-fill"></i> Se actualizó la publicación satisfactoriamente<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
unset($_SESSION['addedSuccesfully']);
  }
  elseif(isset($_SESSION['addedCorrectly']) && $_SESSION['addedCorrectly'] == true){
    echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="ri-checkbox-circle-fill"></i> Se agregó la publicación satisfactoriamente<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
unset($_SESSION['addedCorrectly']);
  }

  if(isset($_SESSION['delete']) && $_SESSION['delete'] == true){
    echo '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="ri-checkbox-circle-fill"></i> Se eliminó la publicación satisfactoriamente<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    unset($_SESSION['delete']);
  }
  ?>
      <h2 class="text-center">Mis Inmuebles</h2>
    <br>
    <div class="inmuebles row row-cols-1 row-cols-md-2">
    <?php

$queryInmuebles = "SELECT * FROM inmueble 
WHERE propietario = '$numeroIdentificacion'
ORDER BY tituloPublicacion ASC";

$resultInmuebles = mysqli_query($connect, $queryInmuebles);

if ($resultInmuebles && mysqli_num_rows($resultInmuebles) > 0) {
    while ($row = mysqli_fetch_assoc($resultInmuebles)) {
        $inmuebleIDs[] = $row["idInmueble"];
        $estadoBadgeClass = ($row['estado'] == 'Disponible') ? 'badge rounded-pill text-bg-success' : 'badge rounded-pill text-bg-danger';

$estadoText = ($row['estado'] == 'Disponible') ? 'Disponible' : 'Ocupado';
        echo '<div class="col mb-4">
        <div class="card h-100">
            <img src="' . $row['imagen'] . '" class="card-img-top img-fluid" alt="Imagen del inmueble" style="max-height: 200px; object-fit: cover;">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">' . $row['tituloPublicacion'] . '</h5>
                <p class="badge text-bg-secondary w-100">ID de Inmueble: ' . $row["idInmueble"] . '</p>
                <p class="card-text"><b>Ubicación:</b> ' . $row['ciudad'] . ', ' . $row['departamento'] . '</p>
                <p class="card-text"><b>Tipo Inmueble:</b> ' . $row['categoria'] . '</p>
                <p class="card-text"><b>Valor Arriendo:</b> $' . $row['valorArriendo'] . '</p>
                <p class="card-text"><b>Estado Inmueble:</b> <span class="' . $estadoBadgeClass . '" style="font-size: 14px;">' . $estadoText . '</span></p>
                <div class="mt-auto">
                <form method="post" action="../Assets/Private/deletePropperty.php">
                <input type="text" value="'.$row["idInmueble"].'" name="idInmuebleAEliminar" hidden>
                    <button type="submit" class="btn btn-danger btn-sm w-100"><i class="ri-delete-bin-6-fill"></i> Eliminar publicación</button>
                    </form>
                </div>
                <br>
                <div class="mt-auto">
                    <button type="button" class="btn btn-dark btn-sm w-100" onclick="openEditarModal()"><i class="ri-pencil-line"></i> Editar publicación</button>
                </div>
            </div>
        </div>
    </div>';

}
    }else{
        echo '<div class="text-center">';
        echo '<br><h4>Aún no se han publicado inmuebles.</h4><br>';
        echo '<img class="rounded mx-auto d-block" src="../Assets/Media/420.gif" alt="Windows XP Error Dialog" style="margin: 0 auto;">';
        echo '</div>';
    }
    
?>
    </div>
</div>

<div class="col">
    <h2 class="text-center">Publicar Inmueble</h2>
    <div class="formulario">
        <div class="container mt-4">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="../Assets/Private/addPropperty.php">

                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título de la Publicación</label>
                            <input type="text" class="form-control" id="titulo" name="tituloPublicacion" placeholder="Ingrese el título de la publicación" required>
                        </div>

                        <div class="mb-3">
                            <label for="selectDepartamento" class="form-label">Departamento</label>
                            <select id="selectDepartamento" class="form-select" name="departamento" required>
                                <option>Departamento</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="selectCiudad" class="form-label">Ciudad</label>
                            <select id="selectCiudad" class="form-select" name="ciudad" required>
                                <option>Ciudad</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="address" name="direccion" placeholder="Ingrese la dirección del Inmueble" required>
                        </div>

                        <div class="mb-3">
                            <label for="rangeInput" class="form-label">Estrato Socioeconómico</label>
                            <input type="range" class="form-range" id="rangeInput" min="1" max="6" step="1" style="width: 100%;" value="1" name="estrato" required>
                            <h5 class="text-center" id="rangeValue">Estrato 1</h5>
                        </div>
                        <div class="mb-3">
    <label for="selectTipoInmueble" class="form-label">Tipo Inmueble</label>
    <select id="selectTipoInmueble" class="form-select" name="categoria">
        <?php
        $obtenerCategorias = "SELECT * FROM categoria";

        $resultCategorias = mysqli_query($connect, $obtenerCategorias);

        if($resultCategorias) {
            while ($row = mysqli_fetch_assoc($resultCategorias)) {
                
                echo '<option value="'.$row['idCategoria'].'">'.$row['nombreCategoria'].'</option>';
            }
        }
        ?>

</select>
</div>
<div class="mb-3">
                            <label for="valor" class="form-label">Valor Arriendo</label>
                            <input type="number" class="form-control" id="valor" name="precio" placeholder="Ingrese el valor de arriendo del Inmueble" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción</label>
                            <textarea id="description" class="form-control" minlength="60" rows="3" placeholder="Ingrese una descripción detallada de la propiedad" name="descripcion" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="link" class="form-label">URL de la Imagen del Inmueble</label>
                            <input type="text" id="link" class="form-control mb-2" placeholder="Ingrese la URL de su imagen" name="imagen" required>
                        </div>
                        <button type="submit" class="btn btn-success btn-block w-100"><i class="ri-add-line"></i> Publicar Inmueble</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

        </div>                    
        </div>
    </div>
<!-- Modal para editar publicación -->
<div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarModalLabel">Editar Publicación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulario de edición -->
                <form method="POST" action="../Assets/Private/updatePostInfo.php">

                    <!-- Consulta id Inmuebles -->

                    <div class="mb-3">
    <label for="idInmueble" class="form-label">Seleccione el inmueble a editar:</label>
    <select name="idInmueble" id="idInmueble" class="form-select" required>
    <?php
    $queryIdInmuebles = "SELECT idInmueble,tituloPublicacion FROM inmueble
                      WHERE propietario = '$numeroIdentificacion'
                      ORDER BY idInmueble ASC";
    
    $resultIdInmuebles = mysqli_query($connect, $queryIdInmuebles);

    if ($resultIdInmuebles && mysqli_num_rows($resultIdInmuebles) > 0) {
        while ($row = mysqli_fetch_assoc($resultIdInmuebles)) {
            $inmuebleID = $row["idInmueble"];
            $tituloPublicacion = $row["tituloPublicacion"];
            echo '<option value="' . $inmuebleID . '">ID: ' . $inmuebleID . ' - ' . $tituloPublicacion . '</option>';
        }
    } else {
        echo '<option value="" disabled>Aún no hay inmuebles</option>';
    }

    mysqli_free_result($resultIdInmuebles);
    ?>
    </select>
</div>
<div class="mb-3">
                        <label for="tituloEdit" class="form-label">Nuevo Título:</label>
                        <input type="text" class="form-control" id="tituloEdit" name="titulo" placeholder="Ingrese el nuevo título">
                    </div>
                    <div class="mb-3">
                        <label for="valorEdit" class="form-label">Nuevo Valor de Arriendo:</label>
                        <input type="number" class="form-control" id="valorEdit" name="precio" placeholder="Ingrese el nuevo valor de arriendo">
                    </div>
                    <div class="mb-3">
                        <label for="newAddress" class="form-label">Corregir Dirección:</label>
                        <input class="form-control" id="newAddress" name="direccion" placeholder="Ingrese la corrección de la dirección"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Cambiar Imagen:</label>
                        <input class="form-control" id="image" name="imagen" placeholder="Ingrese el link de su nueva imagen"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="descripcionEdit" class="form-label">Nueva Descripción:</label>
                        <textarea class="form-control" id="descripcionEdit" name="descripcion" rows="3" placeholder="Ingrese la nueva descripción"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success w-100"><i class="ri-save-line"></i> Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var rangeInput = document.getElementById('rangeInput');
    var rangeValue = document.getElementById('rangeValue');

    rangeInput.addEventListener('input', function () {
        rangeValue.textContent = "Estrato " + rangeInput.value;

    });
  });
  
  function openEditarModal() {
        var editarModal = new bootstrap.Modal(document.getElementById('editarModal'), {
            keyboard: false,
            backdrop: 'static'
        });
        editarModal.show();
    }
</script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
  <script src="../Assets/JavaScript/lessor.js"></script>
  </body>
</html>
