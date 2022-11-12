<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style2.css">
        <link rel="stylesheet" type="text/css" href="normalize.css">
        <link rel="icon" href="Sonrisa Feliz2.png">
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
                        <th>Dni</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Nacimiento</th>
                        <th>Edad</th>
                        <th>Mail</th>
                        <th>Telefono</th>
                        <th>Obra Social</th>
                        <th></th>
                    </tr>
                    <?php
                        $conn = mysqli_connect("localhost", "id18445739_dentista_admin", "Monono-456789", "id18445739_sonrisas_felices");
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT * FROM clients";
                        $result = $conn->query($sql);

                        $d1 = new DateTime(date('y-m-d'));

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                
                                $d2=new DateTime($row["nacimiento"]);
                                $diff = date_diff($d2,$d1);
                                echo 
                                    "<tr>
                                        <td>" . $row["dni"]. "</td>
                                        <td>" . $row["nombre"] . "</td>
                                        <td>". $row["apellido"]. "</td>
                                        <td>". $row["nacimiento"]. "</td>
                                        <td>". $diff->y. "</td>
                                        <td>" . $row["mail"].  "</td>
                                        <td>" . $row["celular"]. "</td>
                                        <td>" . $row["obra_socal"]. "</td>
                                        <td><a href = 'history.php?rn=$row[dni]'>History</td>
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