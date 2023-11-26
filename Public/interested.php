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
    <title>Interesados en inmueble </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../Assets/CSS/rentals.css">
    <link rel="shortcut icon" href="../Assets/Media/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <!-- Navigator -->
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div class="container">
                <a href="#  " class="navbar-brand" style="position: relative; top: 13px;">
                    <h3><img src="../Assets/Media/logo.png" alt="Logo"
                            style="position: relative; top: -5px; max-height: 2em;">RentEasy</h3>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsedNavbar"
                    aria-controls="collapsedNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsedNavbar">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="lessor.php" class="nav-link">
                                <button class="btn btn-outline-dark"><i class="ri-arrow-left-line"></i> Mis
                                    Inmuebles</button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="interested.php" class="nav-link position-relative">
                                <button class="btn btn-outline-primary"><i class="ri-user-follow-fill"></i> Interesados</button>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="stats.php" class="nav-link">
                                <button class="btn btn-outline-warning"><i class="ri-bar-chart-2-fill"></i>
                                    Estadísticas</button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="profile.php" class="nav-link">
                                <button class="btn btn-outline-success"><i class="ri-account-pin-circle-fill"></i> Mi
                                    Perfil</button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../Assets/Private/logout.php" class="nav-link">
                                <button class="btn btn-outline-danger"><i class="ri-shut-down-line"></i> Cerrar
                                    Sesión</button>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
        <h2 class="text-center py-4">Interesados en tus inmuebles</h2>
        <div class="container">
            <div class="row">


<?php
$obtenerInteresados = "SELECT interesados FROM inmueble WHERE propietario = '$numeroIdentificacion'";

$interesados = mysqli_query($connect, $obtenerInteresados);

if ($interesados) {
    $idInteresados = $interesados->fetch_assoc();

    
    if (!empty($idInteresados)) {
    $listaInteresados = explode(',', $idInteresados['interesados']);
    foreach ($listaInteresados as $id) {
        

        $detalleUsuario = "SELECT * FROM usuario WHERE numeroIdentificacion = '$id'";
        $resultUsuario = mysqli_query($connect, $detalleUsuario);

        if ($rowUsuario = mysqli_fetch_assoc($resultUsuario)) {
            echo '<div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-body text-center">';
                    
            // Verificar si la foto de perfil está vacía
            $fotoPerfilSrc = !empty($rowUsuario['fotoPerfil']) ? $rowUsuario['fotoPerfil'] : '../Assets/Media/defaultpfp.jpg';
        
            echo '<img src="' . $fotoPerfilSrc . '" alt="avatar" class="rounded-circle img-fluid" style="width: 100px; height: 100px;">
                        <br><br>
                        <h4>' . $rowUsuario['primerNombre'] . ' ' . $rowUsuario['segundoNombre'] . ' ' . $rowUsuario['primerApellido'] . ' ' . $rowUsuario['segundoApellido'] . '</h4>
                        <h5 class="text-muted">' . $rowUsuario['ciudad'] . ', ' . $rowUsuario['departamento'] . '</h5>
                        <h5 class="text-muted">' . $rowUsuario['numeroTelefono'] . '</h5>
                        <a href="' . "https://web.whatsapp.com/send?phone=57" . $rowUsuario['numeroTelefono'] . '" target="_blank" class="btn btn-success w-100">
                            <i class="ri-whatsapp-line"></i> Enviar Mensaje
                        </a>
                        <br>
                        <form method="POST" action="../Assets/Private/acceptInterested.php">
                        <input type="text" name="idInteresado" value="'.$rowUsuario['numeroIdentificacion'].'" hidden>
                            <button type="submit" class="btn btn-primary w-100" style="margin-top: 7px;"><i class="ri-check-line"></i> Aceptar</button>
                            </form>
                    </div>
                </div>
            </div>';
        }
        
    }
    }else{
        echo '<h4 class="text-center">Aún no hay interesados en tus inmuebles</h4>
        <br><br>
    <img class="rounded mx-auto d-block" src="../Assets/Media/wojak.png" alt="Windows XP Error Dialog" style="margin: 0 auto; max-height: 20em; width: 40%;">';
    }
}
?>


            </div>
        </div>

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