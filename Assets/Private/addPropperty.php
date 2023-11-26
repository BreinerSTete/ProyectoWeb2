<?php
include 'connection.php';
session_start();
$numeroIdentificacion = $_SESSION['numeroIdentificacion'];

if ($_POST) {
    // Obtener datos del formulario
    $tituloPublicacion = mysqli_real_escape_string($connect, $_POST['tituloPublicacion']);
    $departamento = mysqli_real_escape_string($connect, $_POST['departamento']);
    $ciudad = mysqli_real_escape_string($connect, $_POST['ciudad']);
    $direccion = mysqli_real_escape_string($connect, $_POST['direccion']);
    $estrato = mysqli_real_escape_string($connect, $_POST['estrato']);
    $valorArriendo = mysqli_real_escape_string($connect, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($connect, $_POST['descripcion']);
    $categoria = mysqli_real_escape_string($connect, $_POST['categoria']);
    $imagen = mysqli_real_escape_string($connect, $_POST['imagen']);

    // Insertar nuevo inmueble
    $insertInmueble = "INSERT INTO inmueble
    (propietario, tituloPublicacion, departamento, ciudad, categoria, valorArriendo, direccion, estrato, descripcion, estado, imagen)
    VALUES 
    ('$numeroIdentificacion','$tituloPublicacion', '$departamento', '$ciudad', '$categoria', '$valorArriendo', '$direccion', '$estrato', '$descripcion', 'Disponible', '$imagen')";

    // Ejecutar la consulta
    $resultInmueble = mysqli_query($connect, $insertInmueble);

    if ($resultInmueble) {

        $idInmueble = mysqli_insert_id($connect);

        $insertRenta = "INSERT INTO renta (idArrendador, idInmueble) VALUES ('$numeroIdentificacion','$idInmueble')";

        $resultRenta = mysqli_query($connect, $insertRenta);

        $_SESSION['addedCorrectly'] = true;

        header('Location: ../../Public/lessor.php');

    } else {
        echo "Error al insertar inmueble: " . mysqli_error($connect);
    }
}
?>
