<?php
session_start();
$_SESSION["logged"] = false;
include 'Assets/Private/connection.php';
?>
<!doctype html>
<html lang="es">
  <head>
    <title>RentEasy - Locales y Apartamentos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="RentEasy es una página web que da la posibilidad de publicar propiedades en renta para que otras personas las renten.">
    <link rel="stylesheet" href="Assets/CSS/style.css">
    <link rel="shortcut icon" href="Assets/Media/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
          <!-- Navigator -->
    <header>
        <nav class="navbar navbar-light" style="position: absolute;">
            <div class="container">
                <a href="index.php" class="navbar-brand"><h3 style=" color: white; font-weight: 550;"><img src="Assets/Media/logo-white.png" alt="Logo" style="margin-left: 1em; max-height: 2em;">RentEasy</h3></a>
            </div>
        </nav>
    </header>
    <!-- Main Content -->
    <div class="container-fluid">
        <div class="animatedText" style="font-family: 'Roboto', sans-serif;">
            <span id="randomSentence"></span><span id="cursor"></span>
        </div>
        <!-- Formularios de inicio de sesión y registro -->
        <div class="container mt-5" style="text-align: left;">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login-form">Iniciar Sesión</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register-form">Registrarse</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="login-form">
                                    <h4 class="card-title">Iniciar Sesión</h4>
                                    <form method="post" action="Assets/Private/checklogin.php">
                                        <div class="form-group">
                                            <label for="emailLogin">Correo Electrónico</label>
                                            <input type="email" class="form-control" id="emailLogin" placeholder="Correo Electrónico" name="correoElectronico">
                                        </div>
                                        <div class="form-group">
                                            <label for="passwordLogin">Contraseña</label>
                                            <input type="password" class="form-control" id="passwordLogin" placeholder="Contraseña" name="contrasena">
                                        </div>
                                        <button type="submit" class="btn btn-success">Iniciar Sesión</button>
                                        <br><br>
                                        <?php                         
                                        if (isset($_SESSION['registro_exitoso']) && $_SESSION['registro_exitoso'] = true) {
                                            echo '<div class="alert alert-success mt-3" role="alert"><i class="ri-checkbox-circle-fill"></i> Registro exitoso. ¡Ya puedes iniciar sesión!
                                            </div>';
                                            unset($_SESSION['registro_exitoso']);
                                        }
                                        if (isset($_SESSION['registro_fallido']) && $_SESSION['registro_fallido'] = true) {
                                            echo '<div class="alert alert-danger mt-3" role="alert"><i class="ri-close-circle-fill"></i> No se pudo registrar al usuario
                                            </div>';
                                            unset($_SESSION['registro_fallido']);
                                        }
                                        if (isset($_SESSION['wrongUserData']) && $_SESSION['wrongUserData'] = true) {
                                            echo '<div class="alert alert-danger mt-3" role="alert"><i class="ri-close-circle-fill"></i> Usuario o Contraseña Incorrectos. Compruebe sus datos de inicio de sesión e intente nuevamente.</div>';
                                            unset($_SESSION['wrongUserData']);
                                        }
                                        if (isset($_SESSION['correctDataError']) && $_SESSION['correctDataError'] = true) {
                                            echo '<div class="alert alert-warning mt-3" role="alert"><i class="ri-close-circle-fill"></i> Sus credenciales son correctas, pero hubo un error al redireccionar.</div>';
                                            unset($_SESSION['correctDataError']);
                                        }
                                        ?>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="register-form">
                                    <h4 class="card-title">Registro de Usuario</h5>
                                    <form method="post" action="Assets/Private/register.php">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                        <label>Primer Nombre</label>
                                        <input type="text" class="form-control" id="nombre1" placeholder="Nombre" name="primerNombre" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>Segundo Nombre</label>
                                        <input type="text" class="form-control" id="nombre2" placeholder="Segundo Nombre" name="segundoNombre">
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label for="apellido1">Primer Apellido</label>
                                        <input type="text" class="form-control" id="apellido1" placeholder="Primer Apellido" name="primerApellido" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label for="apellido2">Segundo Apellido</label>
                                        <input type="text" class="form-control" id="apellido2" placeholder="Segundo Apellido" name="segundoApellido">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="id">Número de Identificación</label>
                                        <input type="text" class="form-control" id="id" placeholder="Ingrese su Número de Cédula" name="numeroIdentificacion" required pattern="[0-9]+" title="Solo se permiten números.">
                                        </div>
                                        <div class="form-group col-md-12">
                                        <label for="emailRegistro">Correo Electrónico</label>
                                        <input type="email" class="form-control" id="emailRegistro" placeholder="Correo Electrónico" name="correoElectronico" required minlength="8">
                                        </div>
                                        <div class="form-group col-md-12">
                                        <label for="passwordRegistro">Contraseña</label>
                                        <input type="password" class="form-control" id="passwordRegistro" placeholder="Contraseña" name="contrasena" minlength="8" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Perfil de Usuario</label>
                                        <select name="rolUsuario" id="role" style="width: 100%; border: 1px solid rgba(0, 20, 50, 0.2); padding: 0.5em; background-color: transparent; border-radius: 0.3em;">

                                        <?php
                                            $roles = "SELECT * FROM rolUsuario LIMIT 2";
                                            $resultRoles = mysqli_query($connect, $roles);

                                            if ($resultRoles) {
                                                while ($row = mysqli_fetch_assoc($resultRoles)) {
                                                    echo '<option value="' . $row['idRol'] . '">' . $row['rolUsuario'] . '</option>';
                                                }
                                            } else {
                                                echo 'Error en la consulta: ' . mysqli_error($connect);
                                            }
                                            mysqli_close($connect);
                                        ?>
                                        
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck" required>
                                        <label class="form-check-label" for="gridCheck">
                                            Acepto los <button type="button" style="border: none; background-color: transparent; color: #559e52;" data-toggle="modal" data-target="#tyc" required>Términos y Condiciones</button> de RentEasy.
                                        </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success">Registrarse</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- Footer -->
        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col">
                    <h3>Acerca de nosotros</h3>
                        <p style="text-align: left;">RentEasy: tu plataforma confiable para encontrar y anunciar inmuebles en alquiler. Nuestra misión es simplificar tu búsqueda de propiedades y agilizar el proceso de arrendamiento.</p>
                </div>
                    <div class="col">
                        <section class="contact">
                        <h3>Contáctanos</h3>
                        <a href="#"><button><i class="ri-facebook-circle-fill"></i></button></a>
                        <a href="#"><button><i class="ri-instagram-fill"></i></button></a>
                        <a href="#"><button><i class="ri-mail-fill"></i></button></a>
                        </section>
                </div>
            </div>
        </div>
        </footer>
        <!-- Modal de Términos y Condiciones -->
        <div class="modal fade" id="tyc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tycModalTittle">Términos y Condiciones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
          Estos son los términos y condiciones que rigen el uso de RentEasy, una plataforma en línea para la búsqueda y publicación de inmuebles en alquiler. Al acceder y utilizar nuestros servicios, aceptas cumplir con estos términos y condiciones en su totalidad.
          <br><br>
          <strong>1. Uso Responsable:</strong>
          <ul>
            <li>Los usuarios se comprometen a utilizar RentEasy de manera responsable y ética.</li>
            <li>No se permite el uso de la plataforma para actividades ilegales o fraudulentas.</li>
          </ul>
          <strong>2. Registro de Cuenta:</strong>
          <ul>
            <li>Los usuarios deben crear una cuenta para acceder a todas las funcionalidades de la plataforma.</li>
            <li>La información proporcionada durante el registro debe ser precisa y veraz.</li>
          </ul>
          <strong>8. Modificaciones de Términos y Condiciones:</strong>
          <ul>
            <li>RentaEASY se reserva el derecho de modificar estos términos y condiciones en cualquier momento.</li>
            <li>Los usuarios serán notificados de cualquier cambio y deberán revisar regularmente los términos actualizados.</li>
          </ul>
          Al utilizar RentEasy, aceptas estos términos y condiciones. Si no estás de acuerdo con ellos, te recomendamos que no utilices nuestros servicios.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
    <script src="Assets/JavaScript/script.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>