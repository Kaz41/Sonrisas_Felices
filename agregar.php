<?php
    session_start();
    $_SESSION['user_id'];
    
    $conn = mysqli_connect("localhost", "id18445739_dentista_admin", "Monono-456789","id18445739_sonrisas_felices");

    require 'conexion.php';

    if(isset($_POST) && !empty($_POST)){
        $message = '';
    
        $query="SELECT nombre, mail FROM clients WHERE dni = :dni";
    
    
        $var=$conn->prepare($query);
        $var->bindParam(':dni', $_SESSION['user_id']);
        $var->execute();
        $results= $var->fetch(PDO::FETCH_ASSOC);
    
    
        if(!empty($_FILES['imagen']['name'])){
          $file_name=$_FILES['imagen']['name'];
          $temp_name=$_FILES['imagen']['tmp_name'];
          $file_type=$_FILES['imagen']['type'];
    
          $base=basename($file_name);
          $extension=substr($base, strlen($base)-4, strlen($base));
    
          $allowed_extensions= array(".jgp","docx",".pdf",".zip",".png");
    
          if(in_array($extension,$allowed_extensions)){
            $name=$results['nombre'];
            $from=$results['mail'];
            $to="macvelloricardo@gmail.com";
            $subject="Nuevo Turno Paciente";
            $message=$_POST['mensaje'];
    
            $file=$temp_name;
            $content = chunk_split(base64_encode(file_get_contents($file)));
            $uid=md5(uniqid(time()));
    
            $headers = "From: " . $name . "<" . $results['mail'] . ">\r\n";
            $headers .= "Reply-To: " . $results['mail'] . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
    
            $headers .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n";
            $headers .= "This is a multi-part message in MIME format.\r\n";
            
            $headers .= "--".$uid."\r\n";
            $headers .= "Content-type:text/plain; charset=iso-8859-1\r\n";
            $headers .= "Content-Transfer-Encoding: 7bit\r\n";
            $headers .= $message."\r\n";
    
            $headers .= "--".$uid."\r\n";
            $headers .= "Content-Type: ".$file_type. "; name=\"".$file_name."\"\r\n";
            $headers .= "Content-Transfer-Encoding: base64\r\n";
            $headers .= "Content-Disposition: attachment; filename=\"".$file_name."\"\r\n";
            $headers .= $content."\r\n";
    
            if(mail($to,$subject,"",$headers)){
              $_SESSION['datos'] = $_POST;
              header("Location: add.php");
            }else {
              echo "fallo";
            }
    
          }else {
            echo "file type not allowed";
          }
    
         }else {
           
         }
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Sonrisa Feliz</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style-add.css">
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
                            <li class="lista1__l1"><a href="c_turnos.php">Volver</a></li>
                            <li class="lista1__l1"><a href="logout.php">Cerrar Cesion</a></li>
                        </ul>
                    </nav>
                </div>
            </header>
        </section>   
        <section class="registro">
            <div class="formulario">
                <form class="inputs" action="agregar.php" method="POST" enctype="multipart/form-data">
                    <div class="columna">
                        <div class="fecha">
                            <h5>Fecha</h5>
                            <input type="date" name="fecha" required="">
                        </div>
                        
                        <div class="horario">
                            <h5>Horario</h5>
                            <select name="horario"> 
                                <option value="8:00">8:00 AM</option>
                                <option value="9:00">9:00 AM</option>
                                <option value="10:00">10:00 AM</option>
                                <option value="11:00">11:00 AM</option>
                                <option value="12:00">12:00 AM</option>
                                <option value="16:00">16:00 PM</option>
                                <option value="17:00">17:00 PM</option>
                                <option value="18:00">18:00 PM</option>
                                <option value="19:00">19:00 PM</option>
                            </select>
                        </div>
                    </div>
                    
                    <h5>Mensaje</h5>
                    <textarea name="mensaje" id="" cols="47" rows="10" required=""></textarea>
                    
                    <div>
                        <h5>Foto (opcional)</h5>
                        <input type="file" name="imagen">
                    </div>
                    
                    <input class="boton" type="submit" value="Agregar">
                </form>
            </div>
        </section> 
    </body>    
</html>