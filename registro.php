<!DOCTYPE html>
<html>
    <head>
        <title>Sonrisa Feliz</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style-registro.css">
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
                <h3>Registro</h3>
                <h5>O si ya posee cuenta <a href="login.php">Login</a></h5>
                <form class="inputs" action="register.php" method="POST">
                    <div class="fila">
                        <div class="columna">
                            <input type="text" name="dni" required="" placeholder="DNI">
                            <input type="text" name="nombre" required="" placeholder="Nombre">
                            <input type="text" name="apellido" required="" placeholder="Apellido">
                            <div class="fecha">
                                <h5>Fecha</h5>
                                <input type="date" name="fecha">
                            </div>
                        </div>
                        <div class="columna">
                            <input type="email" name="mail" required="" placeholder="Mail">
                            <input type="text" name="celular" required="" placeholder="Telefono">
                            <input type="text" name="obra_social" required="" placeholder="Obra Social">
                            <input type="password" name="password" required="" placeholder="Contraseña">
                            <span class="msg-error"></span>
                        </div>
                    </div>
                    <input class="boton" type="submit" value="Registrar">
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