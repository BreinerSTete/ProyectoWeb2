<?php
include 'connection.php';

$idInmuebleResena = $_POST['idInmuebleResena'];

$sql = "SELECT idInmueble FROM inmueble WHERE idInmueble = $idInmuebleResena";
$result = $connect->query($sql);

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();

    $idHtml = '<input type="hidden" name="idInmuebleResena" value="'.$row['idInmueble'].'">';
    
    echo $idHtml;
} else {
    echo 'Error';
}

$connect->close();
?>