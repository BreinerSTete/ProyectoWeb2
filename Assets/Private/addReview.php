<?php
session_start();
$numeroIdentificacion = $_SESSION['numeroIdentificacion'];
include('connection.php');

if ($_POST) {
    $idInmuebleResena = $_POST['idInmuebleResena'];
    $calificacion = $_POST['calificacion'];
    $comentario = $_POST['comentario'];

    $review = "INSERT INTO resenainmueble (idArrendatario, idInmueble, calificacion, comentario)
    VALUES ('$numeroIdentificacion', '$idInmuebleResena','$calificacion','$comentario')";

    $addReview = mysqli_query($connect, $review);

    if($addReview) {
        $_SESSION['reviewAdded'] = true;
        header('Location: ../../Public/rentals.php');
    }
}



?>