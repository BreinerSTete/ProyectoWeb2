<!doctype html>
<html lang="es">

<head>
    <title>Mis Rentas</title>
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
                <a href="rentals.php " class="navbar-brand" style="position: relative; top: 13px;">
                    <h3><img src="../Assets/Media/logo.png" alt="Logo"
                            style="position: relative; top: -5px; max-height: 2em;">RentEasy</h3>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsedNavbar"
                    aria-controls="collapsedNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsedNavbar">
                    <ul class="navbar-nav" style="margin-left: auto;">
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
    <div class="container">
    <h2 class="text-center py-4">Mis inmuebles</h2>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <img src="" alt="Imagen del Inmueble" class="img-fluid w-100">
                <div class="card-body">
                    <h4>Titulo del inmueble</h4>
                    <h5 class="text-muted">Valor:</h5>
                    <h5 class="text-muted">Tipo de Inmueble: </h5>
                    <h5 class="text-muted mb-3">Fecha de pago: </h5>
                    <button type="button" class="btn btn-success w-100">
                        <i class="ri-money-dollar-circle-line"></i> Realizar pago
                    </button>
                </div>
            </div>
        </div>

        <!-- Repite el bloque anterior para la segunda tarjeta -->

    </div>
</div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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