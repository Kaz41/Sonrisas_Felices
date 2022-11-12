<?php
    session_start();
    $_SESSION['user_id'];

    require 'conexion.php';

    $post = array();
    if (!empty( $_SESSION['datos'] ))
    { 
        $post = $_SESSION['datos'];
        unset ( $_SESSION['datos'] );
    }

    $message = '';
    

    $aux='no confirmado';

    if (!empty($post['fecha']) && !empty($post['horario']) && !empty($post['mensaje'])) {
        $sql = "INSERT INTO turno (fecha,horario,dni_cliente,estado,mensaje) VALUES (:fecha,:horario,:dni_cliente,:estado,:mensaje)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':fecha', $post['fecha']);
        $stmt->bindParam(':horario', $post['horario']);
        $stmt->bindParam(':dni_cliente', $_SESSION['user_id']);
        $stmt->bindParam(':estado', $aux);
        $stmt->bindParam(':mensaje', $post['mensaje']);
    
        if ($stmt->execute()) {
          $message = 'Successfully created new user';
          header("Location: c_turnos.php");
        } else {
          $message = 'Sorry there must have been an issue creating your account';
        }
    }
?>