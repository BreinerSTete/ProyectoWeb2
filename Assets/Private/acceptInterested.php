<?php
session_start();
include 'connection.php';
$numeroIdentificacion = $_SESSION['numeroIdentificacion'];

if ($_POST) {
    $numeroCedulaInteresado = $_POST['idInteresado'];

    // Consulta SELECT para obtener el idInmueble
    $consultaSelect = "SELECT idInmueble FROM inmueble WHERE FIND_IN_SET('$numeroCedulaInteresado', interesados) > 0";
    $resultadoSelect = mysqli_query($connect, $consultaSelect);

    if ($fila = mysqli_fetch_assoc($resultadoSelect)) {
        $idInmueble = $fila['idInmueble'];

        // Consulta UPDATE para actualizar propietarios en el inmueble
        $interesadoAceptado = "UPDATE inmueble
            SET interesados = REPLACE(interesados, '', '')
            WHERE FIND_IN_SET('$numeroCedulaInteresado', interesados) > 0";
        $insert = mysqli_query($connect, $interesadoAceptado);

        if ($insert) {
            // Consulta UPDATE para actualizar la renta con el idArrendatario y fechaInicio
            $insertRenta = "UPDATE renta SET idArrendatario = '$numeroCedulaInteresado', inicioRenta = CURDATE() WHERE idArrendatario IS NULL AND idInmueble = '$idInmueble'";
            $resultadoInsertRenta = mysqli_query($connect, $insertRenta);

            if ($resultadoInsertRenta) {
                // Consulta UPDATE para actualizar el estado del inmueble a 'Ocupado'
                $actualizarEstadoInmueble = "UPDATE inmueble SET estado = 'Ocupado', inquilino = '$numeroCedulaInteresado' WHERE idInmueble = '$idInmueble'";
                $resultadoActualizarEstado = mysqli_query($connect, $actualizarEstadoInmueble);

                if ($resultadoActualizarEstado) {
                    $_SESSION['nuevoInquilino'] = true;
                    header('Location: ../../Public/lessor.php');
                    exit();
                } else {
                    echo "Error al actualizar el estado del inmueble: " . mysqli_error($connect);
                }
            } else {
                echo "Error en la actualización de renta: " . mysqli_error($connect);
            }
        } else {
            echo "Error en la actualización de inmueble: " . mysqli_error($connect);
        }
    } else {
        echo "No se encontró el idInmueble para el número de cédula especificado.";
    }
}
?>
