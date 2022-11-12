<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style2.css">
        <link rel="icon" href="Sonrisa Feliz2.png">
        <link rel="stylesheet" type="text/css" href="normalize.css">
        <meta name="viewport" content="width=device-width, user-scalable=1.0">
        <title>Sonrisa Feliz</title>

    </head>
    <body>
        <section>
            <header>
                <div class="inicio">
                    <nav>
                        <ul class="lista1">
                            <li class="lista1__l1"><a href="dentista.php">Clientes</a></li>
                            <li class="lista1__l1"><a href="dentista-t.php">Turnos</a></li>
                            <li class="lista1__l1"><a href="dentista-s.php">Solicitudes</a></li>
                            <li class="lista1__l1"><a href="logout.php">Cerrar Cesion</a></li>
                        </ul>
                    </nav>
                </div>
            </header>
        </section>    
        <section>
            <div class=cuerpo>
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Cliente</th>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Horario</th>
                        <th>Estado</th>
                    </tr>
                    <?php
                        $conn = mysqli_connect("localhost", "id18445739_dentista_admin", "Monono-456789", "id18445739_sonrisas_felices");
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT id, clients.dni, clients.nombre, fecha, horario, estado FROM turno JOIN clients WHERE turno.dni_cliente = clients.dni && turno.estado = 'confirmado';";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo 
                                    "<tr>
                                        <td>" . $row["id"]. "</td>
                                        <td>" . $row["dni"] . "</td>
                                        <td>" . $row["nombre"] . "</td>
                                        <td>". $row["fecha"]. "</td>
                                        <td>". $row["horario"]. "</td>
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