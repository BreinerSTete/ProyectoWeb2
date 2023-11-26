<?php
include 'connection.php';

if ($_POST) {
    session_start();
    $correoElectronico = mysqli_real_escape_string($connect, $_POST["correoElectronico"]);
    $contrasena = mysqli_real_escape_string($connect, $_POST["contrasena"]);

    // Consulta para obtener las credenciales del usuario
    $credenciales = "SELECT correoElectronico, contrasena, numeroIdentificacion, rolUsuario FROM usuario WHERE correoElectronico = '$correoElectronico'";
    $resultado = mysqli_query($connect, $credenciales);

    if ($resultado) {
        // Verificar si se encontraron credenciales
        if ($row = mysqli_fetch_assoc($resultado)) {
            // Verificar la contraseña
            if (password_verify($contrasena, $row['contrasena'])) {
                
                $_SESSION['numeroIdentificacion'] = $row['numeroIdentificacion'];
                $_SESSION["logged"] = true;

                // Redirección basada en el rol del usuario
                switch ($row['rolUsuario']) {
                    case 1:
                        header('Location: ../../Public/lessor.php');
                        break;
                    case 2:
                        header('Location: ../../Public/rentals.php');
                        break;
                    case 3:
                            header('Location: ../Private/admin.php');
                            break;     
                    default:
                        header('Location: admin.php');
                        break;
                }
                
                exit();
            } else {
                // Contraseña incorrecta
                $_SESSION['wrongUserData'] = true;
            }
        } else {
            // No se encontraron credenciales para el correo electrónico proporcionado
            $_SESSION['wrongUserData'] = true;
        }

        mysqli_free_result($resultado);
    } else {
        echo "Error en la consulta: " . mysqli_error($connect);
    }

    // Redirección en caso de error
    header('Location: ../../');
    exit();
}
?>
