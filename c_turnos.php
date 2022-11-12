<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style-db.css">
        <link rel="icon" href="Sonrisa Feliz2.png">
        <link rel="stylesheet" type="text/css" href="normalize.css">
        <meta name="viewport" content="width=device-width, user-scalable=1.0">
        <title>Sonrisa Feliz</title>

    </head>
    <body>
        <section>
            <header>
                <div class="inicio">
                    <img src="Sonrisa Feliz.png" alt="Sonrisa Feliz logo" class="logo">
                    <nav>
                        <ul class="lista1">
                            <li class="lista1__l1"><a href="logout.php">Cerrar Cesion</a></li>
                        </ul>
                    </nav>
                </div>
            </header>
        </section>    
        <section>
            <div class=cuerpo>
                <a class="agregacion" href="agregar.php">Pedir Turno</a>
                <table>
                    <tr>
                        <th>Fecha</th>
                        <th>Horario</th>
                        <th>Prestacion</th>
                        <th>Estado</th>
                    </tr>
                    <?php
                        $conn = mysqli_connect("localhost", "id18445739_dentista_admin", "Monono-456789", "id18445739_sonrisas_felices");
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT dni FROM clients;";
                        $result = $conn->query($sql);
                        $aux = mysqli_fetch_array($result);
                        $sql = "SELECT * FROM turno WHERE turno.dni_cliente = {$_SESSION['user_id']} ORDER BY turno.fecha ASC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo 
                                    "<tr>
                                        <td>" . $row["fecha"]. "</td>
                                        <td>" . $row["horario"] . "</td>
                                        <td>". $row["prestacion"]. "</td>
                                        <td>" . $row["estado"].  "</td>
                                    </tr>"
                                 ;
                            }
                        echo "</table>";
                        } else {}
                        $conn->close();
                    ?>
                </table>
            </div>
        </section>
    </body>
</html>