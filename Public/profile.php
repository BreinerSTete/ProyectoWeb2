<?php
include '../Assets/Private/profileInfo.php';
$rolUsuario = $_SESSION['Rol'];
?>
<!doctype html>
<html lang="es">
<head>
  <title>Perfil de Usuario</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="../Assets/CSS/rentals.css">
  <link rel="shortcut icon" href="../Assets/Media/logo.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
  <!-- Navigator -->
  <header>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container">
        <?php
                        if ($rolUsuario == 1) {
                          echo '<a href="lessor.php" class="navbar-brand" class="navbar-brand" style="position: relative; top: 6px;">';
                        } elseif ($rolUsuario == 2) {
                          echo '<a href="rentals.php" class="navbar-brand" class="navbar-brand" style="position: relative; top: 6px;">';
                        }
                        ?>
                <h3><img src="../Assets/Media/logo.png" alt="Logo" style="position: relative; top: -5px; max-height: 2em;">RentEasy</h3>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsedNavbar" aria-controls="collapsedNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsedNavbar">
                <ul class="navbar-nav" style="margin-left: auto;">
                    <li class="nav-item">
                        <?php
                        if ($rolUsuario == 1) {
                          echo '<a href="lessor.php" class="nav-link">';
                        } elseif ($rolUsuario == 2) {
                          echo '<a href="rentals.php" class="nav-link">';
                        }
                        ?>
                        <button class="btn btn-outline-success"><i class="ri-arrow-left-line"></i> Volver</button>
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
  <h2 class="text-center">Perfil de Usuario</h2>
    <div class="container py-5 all">
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <?php
              if ($fotoPerfil != "") {
                echo '<img class="rounded-circle img-fluid" src="' . $fotoPerfil . '" alt="Foto de perfil del usuario" style="width: 150px; height: 150px;">';
              }else{
                echo '<img
                src="../Assets/Media/defaultpfp.jpg"
                alt="avatar" class="rounded-circle img-fluid" style="max-width: 150px; max-height: 150px;">';
              }
              ?>
              <h5 class="my-3"><?php echo $nombre; ?></h5>
              <p class="badge rounded-pill text-bg-primary" style="font-size: 14px;">
              <?php 
              if ($rol == 1) {
                echo 'Arrendador';
                } else {
                  echo 'Arrendatario';}; 
              ?>
              </p>
              <p class="text-muted mb-4">
                <?php
                if ($ciudad != "") {
                  echo $ciudad . ", " . $departamento; 
                }else{
                  echo "No ha agregado su ubicación.";
                }
                 ?>
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Nombre</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?php echo $nombre; ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Correo</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?php echo $correo; ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Contraseña</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">●●●●●●●●●●●●●</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Número de Teléfono</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">
                    <?php if ($telefono != "") {
                    echo $telefono; 
                  }else{
                    echo "No ha agregado su número de teléfono";
                  }
                  ?>
                  </p>
                </div>
              </div>
            </div>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editarModal"><i class="ri-edit-line"></i> Editar Información</button>
          </div>
        </div>
      </div>
      <?php
if (isset($_SESSION['actualizacionExitosa']) && $_SESSION['actualizacionExitosa'] == true) {
  echo '<div class="alert alert-success mt-3" role="alert"><i class="ri-checkbox-circle-fill"></i> Se actualizaron los datos satisfactoriamente.
  </div>';
  unset($_SESSION['actualizacionExitosa']);
}
if (isset($_SESSION['actualizacionFallida']) && $_SESSION['actualizacionFallida'] == true) {
  echo '<div class="alert alert-danger mt-3" role="alert"><i class="ri-close-circle-fill"></i> No se pudieron actualizar los datos, intente nuevamente.</div>';
  unset($_SESSION['wrongUserData']);
}
if (isset($_SESSION['datos']) && $_SESSION['datos'] == true) {
  echo '<div class="alert alert-warning mt-3" role="alert"><i class="ri-close-circle-fill"></i> No se recibieron datos del formulario de actualización.</div>';
  unset($_SESSION['wrongUserData']);
}
?>
    </div>

<!-- Modal -->
<div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarModalLabel">Editar Información</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="../Assets/Private/editProfileInfo.php">
                    <div class="mb-3">
                        <label for="pfp" class="form-label">Foto de Perfil</label>
                        <input type="text" class="form-control" id="pfp" name="pfp" placeholder="Agregue la URL de su foto de perfil">
                    </div>
                    <div class="mb-3">
                        <label for="selectDepartamento" class="form-label">Departamento</label>
                        <select class="form-select mb-3" name="departamento" id="selectDepartamento">
                            <option>Departamento</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="selectCiudad" class="form-label">Ciudad</label>
                        <select class="form-select mb-3" name="ciudad" id="selectCiudad">
                            <option>Ciudad</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Ingrese su nuevo correo electrónico">
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Número de Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese su número de teléfono">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña actual">
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">Nueva contraseña</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Ingrese su nueva contraseña">
                    </div>
                    <button type="submit" class="btn btn-success w-100"><i class="ri-save-line"></i> Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../Assets/JavaScript/profile.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
</body>

</html>