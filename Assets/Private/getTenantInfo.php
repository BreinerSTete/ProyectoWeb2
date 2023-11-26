<?php

include 'connection.php';


if ($_POST) {
    $idTenant = $_POST['idTenant'];

// Realizar la consulta a la base de datos para obtener la información del inquilino
// (Reemplaza esto con tu lógica específica)
$query = "SELECT fotoPerfil, primerNombre, segundoNombre, primerApellido, segundoApellido, ciudad, departamento FROM usuario WHERE numeroIdentificacion = $idTenant";
$result = mysqli_query($connect, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    // Construir el HTML con la información del inquilino
    $html = '<div class="container text-center" style="padding: 1em;">';
    
    $imagenPerfil = !empty($row['fotoPerfil']) ? $row['fotoPerfil'] : '../Assets/Media/defaultpfp.jpg';
    $html .= '<img src="'.$imagenPerfil.'" alt="Foto de perfil" class="img-fluid rounded-circle" style="max-height: 13em;">';

    $html .= '<h4 class="mt-3">' . $row['primerNombre'] . ' ' . $row['segundoNombre'] . ' ' . $row['primerApellido'] . ' ' . $row['segundoApellido'] . '</h4>';
    $html .= '<p class="text-muted mb-1">' . $row['ciudad'] . ', ' . $row['departamento'] . '</p>';
    $html .= '</div>';

    echo $html;
} else {
    echo '<p>No se encontró información para el inquilino con ID ' . $idTenant . '</p>';
}
}

?>
