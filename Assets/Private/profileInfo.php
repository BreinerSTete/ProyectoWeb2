<?php
include 'connection.php';

session_start();
$numeroIdentificacion = $_SESSION['numeroIdentificacion'];

$infoQuery = "SELECT primerNombre, segundoNombre, primerApellido, segundoApellido, Departamento, Ciudad, numeroTelefono, fotoPerfil, rolUsuario, correoElectronico FROM usuario WHERE numeroIdentificacion = $numeroIdentificacion";
$result = mysqli_query($connect, $infoQuery);

if ($result) {
    $userData = mysqli_fetch_assoc($result);

    // Verificar si $userData no es nulo antes de acceder a sus índices
    if ($userData) {
        $nombre = $userData['primerNombre'] . ' ' . $userData['segundoNombre'] .' '. $userData['primerApellido'] .' '. $userData['segundoApellido'];
        $departamento = $userData['Departamento'];
        $ciudad = $userData['Ciudad'];
        $telefono = $userData['numeroTelefono'];
        $fotoPerfil = $userData['fotoPerfil'];
        $rol = $userData['rolUsuario'];
        $_SESSION['Rol'] = $userData['rolUsuario'];
        $correo = $userData['correoElectronico'];
    } else {
        // Manejar el caso en que $userData es nulo
        echo "No se encontraron datos para el usuario con ID: $numeroIdentificacion";
    }

    mysqli_free_result($result);
} else {
    echo "Error en la consulta: " . mysqli_error($connect);
}
?>
