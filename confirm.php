<?php
    session_start();

    $conn = mysqli_connect("localhost", "id18445739_dentista_admin", "Monono-456789", "id18445739_sonrisas_felices");

    $codigo=$_GET['rn'];

    $_SESSION['turno_id']=$codigo;
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Sonrisa Feliz</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style-con.css">
        <link rel="stylesheet" type="text/css" href="normalize.css">
        <link rel="icon" href="Sonrisa Feliz2.png">
        <meta name="viewport" content="width=device-width, user-scalable=1.0">
    </head>
    <body>
    <section>
            <header>
                <div class="inicio">
                    <nav>
                        <ul class="lista1">
                            <li class="lista1__l1"><a href="dentista-s.php">Volver</a></li>
                            <li class="lista1__l1"><a href="logout.php">Cerrar Cesion</a></li>
                        </ul>
                    </nav>
                </div>
            </header>
        </section>   
        <section class="registro">
            <div class="formulario">
                <h3>Mensaje</h3>
                <?php
                        $query="SELECT mensaje FROM turno WHERE id = $codigo";
                        $data=mysqli_query($conn,$query);
                ?>
                <div>
                    <?php
                        while($row = mysqli_fetch_assoc($data)){
                            echo "<h4>{$row['mensaje']}</h4>";
                        }    
                    ?>
                </div>
                <h5>Prestacion</h5>
                <form class="inputs" action="mod.php" method="POST">
                    <?php
                        $query="SELECT nombre FROM prestaciones";
                        $data=mysqli_query($conn,$query);
                    ?>
                    <select name="prestaciones">
                        <?php
                            
                            while($row = mysqli_fetch_assoc($data)){
                                ?>
                                <option></p><?php echo ($row["nombre"]) ?></option>
                                <?php
                            }
                            
                        ?>
                    </select>
                    <input class="boton" type="submit" value="Confirmar">
                </form>
            </div>
        </section> 
    </body>    
</html>