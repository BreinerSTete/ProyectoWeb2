<?php
include 'connection.php';

$idInmuebleResena = $_POST['idInmuebleResena'];

$opiniones = "SELECT * FROM resenainmueble WHERE idInmueble = $idInmuebleResena";

$resultOpiniones = $connect->query($opiniones);

if ($resultOpiniones->num_rows > 0) {
    $reviews = '<div class="media">';
    $reviews .= '<br><br><h3 class="text-center">Reseñas del Inmueble</h3><br>';
    while ($row = $resultOpiniones->fetch_assoc()) {
        $reviews .= '<div class="row">';
        $reviews .= '<div class="col-md-12">';
        $reviews .= '<div class="media comment rounded" style="background-color: rgba(0, 0, 0, 0.05); padding: 1em;">
            <img src="../Assets/Media/defaultpfp.jpg" class="mr-3 rounded-circle" alt="Avatar" style="width: 40px; height: 40px;"><span class="mt-0 mb-1" style="font-size: 18px; font-weight: bold;"> Usuario</span>
            <div class="media-body"><br>';
        $reviews .= '<p class="mb-1">';

        for ($i = 0; $i < $row['calificacion']; $i++) :
            $reviews .= '<i class="ri-star-fill" style="font-size: 20px; color: #FDCC0D"></i>';
        endfor;
        $reviews .= '<br><br>
                    <p class="mb-0">'.$row['comentario'].'</p>
                </div>
            </div>
        </div>
    </div><br>';
    }

    echo $reviews;
} else {
    echo '<h4 class="text-center">Todavía no hay reseñas de este inmueble</h4>
    <img class="rounded mx-auto d-block" src="../Assets/Media/420.gif" alt="Windows XP Error Dialog" style="margin: 0 auto;">';
}

$connect->close();
?>
