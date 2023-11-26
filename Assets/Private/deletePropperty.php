<?php
include 'connection.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $idInmuebleAEliminar = $_POST['idInmuebleAEliminar'];
    $delete = "DELETE FROM inmueble WHERE idInmueble = '$idInmuebleAEliminar'";

    $deleteResult = mysqli_query($connect, $delete);

    if ($deleteResult) {
        header('Location: ../../Public/lessor.php');
        $_SESSION['delete'] = true;
        exit();
        
    } else {
        echo "Error al eliminar el inmueble: " . mysqli_error($connect);
    }
}
?>