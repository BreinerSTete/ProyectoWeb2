<?php
              include 'connection.php';

              $queryInmuebles = "SELECT * FROM inmueble";
              $resultInmuebles = mysqli_query($connect, $queryInmuebles);

              $inmuebles = array();

              while ($row = mysqli_fetch_assoc($resultInmuebles)) {
                  $inmuebles[] = $row;
              }

              echo json_encode($inmuebles);
?>