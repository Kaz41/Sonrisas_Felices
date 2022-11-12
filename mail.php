<?php
    session_start();
    $_SESSION['user_id'];

    require 'conexion.php';

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

      $allowed_extensions=array(".jgp","docx",".pdf",".zip",".png");

      if(in_array($extension,$allowed_extensions)){
        $name=$results['nombre'];
        $from=$results['mail'];
        $to="martinmendoza-2000@hotmail.com";
        $subject="Nuevo Turno Paciente";
        $message=$_POST['mensaje'];

        $file=$temp_name;
        $content = chunk_split(base64_encode(file_get_contents($file)));
        $uid=md5(uniqid(time()));

        $headers = "From: " . $name . "<" . $results['mail'] . ">\r\n";
        $headers .= "Reply-To: " . $results['mail'] . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";

        $headers .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
        $headers .= "This is a multi-part message in MIME format.\r\n";
        
        $headers .= "--".$uid."\r\n";
        $headers .= "Content-type:text/plain; charset=iso-8859-1\r\n";
        $headers .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $headers .= $message."\r\n\r\n";

        $headers .= "--".$uid."\r\n";
        $headers .= "Content-Type: ".$file_type. "; name=\"".$file_name."\"\r\n";
        $headers .= "Content-Transfer-Encoding: base64\r\n";
        $headers .= "Content-Disposition: attachment; filename=\"".$file_name."\"\r\n\r\n";
        $headers .= $content."\r\n\r\n";

        if(mail($to,$subject,"",$headers)){
          echo "funciono";
          $data_id = "hola";
          $_SESSION["POSTDATA_$data_id"] = $_POST;
          header('Location: add.php'."?data_id=$data_id");
        }else {
          echo "fallo";
        }

      }else {
        echo "file type not allowed";
      }

     }else {
       
     }
?>