<?php
include 'connection.php';

session_start();
$_SESSION['actualizacionExitosa'] = false;
$_SESSION['actualizacionFallida'] = false;
$_SESSION['datos'] = false;

if ($_POST) {
    $fotoPerfil = $_POST["pfp"];
    $departamento = $_POST["departamento"];
    $ciudad = $_POST["ciudad"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $claveActual = $_POST["password"];
    $claveNueva = $_POST["newPassword"];
    $numeroIdentificacion = $_SESSION['numeroIdentificacion'];

    // Validar si se desea cambiar la contraseña y comparar con la actual
    if (!empty($claveActual) && !empty($claveNueva)) {
        // Obtener la contraseña actual del usuario desde la base de datos
        $query = "SELECT contrasena FROM usuario WHERE numeroIdentificacion = $numeroIdentificacion";
        $result = mysqli_query($connect, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $contrasenaActualDB = $row['contrasena'];

            // Verificar si la contraseña actual ingresada coincide con la almacenada en la base de datos
            if (!password_verify($claveActual, $contrasenaActualDB)) {
                $_SESSION['actualizacionFallida'] = true;
                header("Location: ../../Public/profile.php");
                exit;
            }

            // Hash de la nueva contraseña
            $claveNuevaHash = password_hash($claveNueva, PASSWORD_DEFAULT);
        } else {
            $_SESSION['actualizacionFallida'] = true;
            header("Location: ../../Public/profile.php");
            exit;
        }
    }

    // Construir la consulta de actualización
    $updateInfo = "UPDATE usuario SET";
    $updateInfo .= !empty($departamento) && $departamento !== "Departamento" ? " Departamento = '$departamento'," : "";
    $updateInfo .= !empty($ciudad) && $ciudad !== "Ciudad" ? " ciudad = '$ciudad'," : "";
    $updateInfo .= !empty($fotoPerfil) ? " fotoPerfil = '$fotoPerfil'," : "";
    $updateInfo .= !empty($telefono) ? " numeroTelefono = '$telefono'," : "";
    $updateInfo .= isset($claveNuevaHash) ? " contrasena = '$claveNuevaHash'," : "";

    $updateInfo = rtrim($updateInfo, ",");
    $updateInfo .= " WHERE numeroIdentificacion = $numeroIdentificacion";

    $result = mysqli_query($connect, $updateInfo);

    if ($result) {
        $_SESSION['actualizacionExitosa'] = true;
        header("Location: ../../Public/profile.php");
        exit;
    } else {
        $_SESSION['actualizacionFallida'] = true;
        echo "Error al actualizar la información del usuario: " . mysqli_error($connect);
        header("Location: ../../Public/profile.php");
        exit;
    }
} else {
    $_SESSION['datos'] = true;
    header("Location: ../../Public/profile.php");
    exit;
}
?>
