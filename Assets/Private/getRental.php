<?php
include 'connection.php';

$idInmueble = $_POST['idInmueble'];

$sql = "SELECT * FROM inmueble WHERE idInmueble = $idInmueble";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $htmlContent = '<h3 class="text-center">' . $row['tituloPublicacion'] . ' en $'.number_format($row['valorArriendo'], 2, ',', '.').' pesos</h3><br>';
    $htmlContent .= '<p class="card-text" style="font-size: 18px; margin: 5px;">' . $row['descripcion'] . '</p>';
    $htmlContent .= '<div>';
    $htmlContent .= '<img class="rounded w-100" style="height: 25em; object-fit: cover;" src="'.$row['imagen'].'" alt="Inmueble Image">
    <br><br>';
    $htmlContent .= '<p style="font-size: 20px; text-align: center;"><b>Ubicación:</b> ' . $row['ciudad'] . ', '.$row['departamento'].'</p>';
    $htmlContent .= '<div class="mapa">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16289950.549501859!2d-85.03422306898304!3d4.587075564250953!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e15a43aae1594a3%3A0x9a0d9a04eff2a340!2sColombia!5e0!3m2!1ses!2sco!4v1700435900667!5m2!1ses!2sco" width="100%" height="350" style="border-radius: 10px; " ></iframe>
    </div><br>';
    $htmlContent .= '<form method="post" action="../Assets/Private/imInterested.php">';
    $htmlContent .= '<input type="text" name="idInmueble" value="'.$row['idInmueble'].'" hidden>';
    $htmlContent .= '<button type="submit" class="btn btn-success w-100"><i class="ri-heart-3-fill"></i> Me interesa</button>';
    $htmlContent .= '</form>';

    echo $htmlContent;
} else {
    echo '<div class="alert alert-warning" role="alert">No se encontraron detalles del inmueble.</div>';
}

$connect->close();
?>
