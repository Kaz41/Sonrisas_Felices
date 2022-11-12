<?php
    require 'conexion.php';

    $message = '';

    $sql = "INSERT INTO clients (dni,nombre,apellido,nacimiento,mail,password,celular,obra_socal) VALUES (:dni,:nombre,:apellido,:nacimiento,:mail,:password,:celular,:obra_socal)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':dni', $_POST['dni']);
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->bindParam(':apellido', $_POST['apellido']);
    $stmt->bindParam(':nacimiento', $_POST['nacimiento']);
    $stmt->bindParam(':mail', $_POST['mail']);
    $stmt->bindParam(':password', $_POST['password']);
    $stmt->bindParam(':celular', $_POST['celular']);
    $stmt->bindParam(':obra_socal', $_POST['obra_social']);


    if ($stmt->execute()) {
      $message = 'Successfully created new user';
      header("Location: login.php");
    } else {
      $message = 'Sorry there must have been an issue creating your account';
    }
?>