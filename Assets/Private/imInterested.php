<?php
session_start();

include 'connection.php';

$numeroIdentificacion = $_SESSION['numeroIdentificacion'];

if ($_POST) {
    $idInmueble = $_POST['idInmueble'];

    // Agrega una coma después de $numeroIdentificacion en la cadena de concatenación
    $agregarInteresado = "UPDATE inmueble SET interesados = CONCAT(interesados, '$numeroIdentificacion,') WHERE idInmueble = '$idInmueble'";
    
    $interested = mysqli_query($connect, $agregarInteresado);

    if ($interested) {
        $_SESSION['interested'] = true;
        header('Location: ../../Public/rentals.php');
    } else {
        echo 'Error';
    }
}
?>
