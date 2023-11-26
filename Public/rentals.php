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
    <title>RentEasy - Locales y Apartamentos</title>
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
                <ul class="navbar-nav" style="margin-left: auto;">
                <li class="nav-item">
                    <a href="myrentals.php" class="nav-link">
                    <button type="button" class="btn btn-outline-info"><i class="ri-money-dollar-circle-fill"></i> Mis Inmuebles</button>
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
  <br>
  <div class="container">
            <h1 class="text-center">Inmuebles Disponibles</h1>
            <?php
if (isset($_SESSION['reviewAdded']) && $_SESSION['reviewAdded'] = true) {
    echo '<div class="alert alert-success mt-3" role="alert"><i class="ri-checkbox-circle-fill"></i> Se agregó la reseña. ¡Gracias por tus comentarios!</div>';
    unset($_SESSION['reviewAdded']);
}
if (isset($_SESSION['interested']) && $_SESSION['interested'] = true) {
    echo '<div class="alert alert-primary mt-3" role="alert"><i class="ri-checkbox-circle-fill"></i> Vemos que estás interesado. ¡Te notificaremos si el arrendador acepta tu solicitud de renta!</div>';
    unset($_SESSION['interested']);
}

?>
            <br>
<div class="row">

    <?php

    $sql = "SELECT * FROM inmueble WHERE estado = 'Disponible'";

    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $valorArriendo = $row['valorArriendo'];
            $valorArriendoFormateado = number_format($valorArriendo, 2, ',', '.');
            $idInmueble = $row['idInmueble'];
            echo '<div class="col-md-4 mb-4">';
            echo '<div class="card h-100">';
            echo '<img src="' . $row['imagen'] . '" class="card-img-top img-fluid d-block" alt="Foto del Inmueble" style="height: 15em;">';
            echo '<div class="card-body d-flex flex-column">';
            echo '<h4 class="card-title">' . $row['tituloPublicacion'] . '</h4>';
            echo '<p class="card-text"><b>Ubicación:</b> '. $row['ciudad'] .', '. $row['departamento'] .'</p>';
            echo '<p class="card-text"><b>Valor de Arriendo:</b> $' . $valorArriendoFormateado . '</p>';
            if ($row['estado'] = 'Disponible') {
                echo '<p class="card-text"><b>Estado:</b> <span class="badge rounded-pill text-bg-success" style="font-size: 14px;">' . $row['estado'] . '</span></p>';

            }else{
                echo '<p class="card-text"><b>Estado:</b> <span class="badge rounded-pill text-bg-danger" style="font-size: 14px;">' . $row['estado'] . '</span></p>';
            }

            echo '<button class="btn btn-success mt-auto mb-2 detalleBtn" data-toggle="modal" onclick="verMas('.$idInmueble.')"><i class="ri-add-line"></i> Ver más</button>';
            echo '<button class="btn btn-warning mt-auto detalleBtn" data-toggle="modal" onclick="obtenerIdYResenas('.$row['idInmueble'].')" data-target="#opinionesInmueble"><i class="ri-star-fill"></i> Reseñas</button>
            ';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            
        }
    } else {
        echo "No hay inmuebles disponibles";
    }
    ?>
</div>

        </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-body" id="modal-body-content"></div>
    </div>
  </div>
</div>

<div class="modal fade" id="opinionesInmueble" tabindex="-1" role="dialog" aria-labelledby="opinionesInmuebleLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title" id="opinionesInmuebleLabel">Reseñas</h3>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <!-- Reseñas -->
        <form action="../Assets/Private/addReview.php" method="post">
    <h3>Publicar Reseña</h3>
    <div class="" id="divIdInmuebleResena"></div>
    <div class="mb-3">
        <label for="descripcionEdit" class="form-label">¿Cómo ha sido su experiencia con el inmueble?</label>
        <textarea class="form-control" id="descripcionEdit" name="comentario" rows="3" placeholder="Ingrese la nueva descripción" required></textarea>
    </div>
    <div class="mb-3">
    <br><label for="starsRange" class="form-label">Calificación</label>
        <input type="range" class="form-range" id="starsRange" min="1" max="5" step="1" style="width: 100%;"  name="calificacion" oninput="updateStars()" required value="1">
        <div id="stars" class="text-center"><i class="ri-star-fill" style="font-size: 32px; color: #FDCC0D"></i></div>
        <script>
            function updateStars() {
                let rating = document.getElementsByName("calificacion")[0].value;
                let starsDiv = document.getElementById("stars");

                // Limpia el contenido actual del div de estrellas
                starsDiv.innerHTML = "";

                // Agrega estrellas al div según el valor del rango
                for (let i = 0; i < rating; i++) {
                    let star = document.createElement("i");
                    star.className = "ri-star-fill";
                    star.style.fontSize = "32px";
                    star.style.color = "#FDCC0D";
                    star.style.margin = "3px";
                    starsDiv.appendChild(star);
                }
            }
        </script>
    </div>
    <button type="submit" class="btn btn-primary w-100 mb-2"><i class="ri-send-plane-fill"></i> Publicar Reseña</button>
</form>


        <!-- Reseñas -->
            
<div id="reviews"></div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
    function verMas(idInmueble) {
        $.ajax({
            type: 'POST',
            url: '../Assets/Private/getRental.php',
            data: { idInmueble: idInmueble },
            success: function (data) {
                $('#modal-body-content').html(data);
                $('#myModal').modal('show');
            },
            error: function (error) {
                console.error('Error en la solicitud AJAX:', error);
            }
        });
    }

    function obtenerIdInmueble(idInmuebleResena) {

    console.log(idInmuebleResena);
    $.ajax({
            type: 'POST',
            url: '../Assets/Private/getRentalsId.php',
            data: { idInmuebleResena: idInmuebleResena },
            success: function (data) {
                $('#divIdInmuebleResena').html(data);
            },
            error: function (error) {
                console.error('Error en la solicitud AJAX:', error);
            }
        });


    }
    function obtenerResenas(idInmuebleResena) {
        $.ajax({
            type: 'POST',
            url: '../Assets/Private/getReviews.php',
            data: { idInmuebleResena: idInmuebleResena },
            success: function (data) {
                $('#reviews').html(data);
            },
            error: function (error) {
                console.error('Error en la solicitud AJAX:', error);
            }
        });
    }

    function obtenerIdYResenas(idInmueble) {
    obtenerIdInmueble(idInmueble);
    obtenerResenas(idInmueble);
}

</script>

    <script src="../Assets/JavaScript/rentals.js"></script>
  </body>
</html>
