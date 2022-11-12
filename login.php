<?php

    session_start();

    if (isset($_SESSION['dentista'])) {
        header('Location: dentista.php');
    }
    if (isset($_SESSION['user_id'])) {
        header('Location: c_turnos.php');
    }
    else {

    }

    require 'conexion.php';

    if (!empty($_POST['mail']) && !empty($_POST['password'])) {
        
        if($_POST['mail'] == 'martinmendoza-2000@hotmail.com' && $_POST['password'] == 'monono'){
            $_SESSION['dentista'] = $_POST['password'];
  
            header("Location: dentista.php");
        }


        $records = $conn->prepare('SELECT dni, mail, password FROM clients WHERE mail = :mail');
        $records->bindParam(':mail', $_POST['mail']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);
    
        $message = '';
    
        if ($_POST['password'] == $results['password']) {
          $_SESSION['user_id'] = $results['dni'];
          header("Location: c_turnos.php");
        } else {
          $message = 'Las credenciales no coinciden';
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sonrisa Feliz</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style-login.css">
        <link rel="icon" href="Sonrisa Feliz2.png">
        <link rel="stylesheet" type="text/css" href="normalize.css">
        <meta name="viewport" content="width=device-width, user-scalable=1.0">
    </head>
    <body>
        <section>
            <header>
                <div class="inicio">
                    <img src="Sonrisa Feliz.png" alt="Sonrisa Feliz logo" class="logo">
                    <nav>
                        <ul class="lista1">
                            <li class="lista1__l1"><a href="index.php">Inicio</a></li>
                            <li class="lista1__l1"><a href="servicio.php">Servicio</a></li>
                            <li class="lista1__l1"><a href="login.php">Cuenta</a></li>
                        </ul>
                    </nav>
                </div>
            </header>
        </section>
        <section class="registro">
            <div class="fondo"></div>
            <div class="formulario">
                <h3>Login</h3>
                <h5>O si no posee cuenta <a href="registro.php">Singup</a></h5>
                <form class="inputs" action="login.php" method="POST">
                    <input type="text" name="mail" required="" placeholder="Mail">
                    <input type="password" name="password" required="" placeholder="Contraseña">
                    <input class="boton" type="submit" value="Enviar">
                </form>
            </div>
        </section>
        <footer class="pie">
            <h4 class="pie_subtitulo">Navegacion Rapida</h4>
            <div>
                <ul class="lista2">
                    <li class="lista2_l2"><a href="index.php">Inicio</a></li>
                    <li class="lista2_l2"><a href="servicio.php">Servicio</a></li>
                    <li class="lista2_l2"><a href="registro.php">Cuenta</a></li>
                </ul>
            </div>
            <h4 class="copyright">© Copyright Dev Evolution Todos los derechos reservados</h4>
        </footer>
    </body>    
</html>