<?php
    session_start();

    require 'conexion.php';

    $message = '';

    $aux='confirmado';

    $sql = "UPDATE turno SET prestacion = :prestacion, estado = :estado WHERE id = :id ";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':prestacion', $_POST['prestaciones']);
    $stmt->bindParam(':estado', $aux);
    $stmt->bindParam(':id', $_SESSION['turno_id']);
    if ($stmt->execute()) {
      $message = 'Successfully created new user';
      header("Location: dentista-s.php");
    } else {
      $message = 'Sorry there must have been an issue creating your account';
    }

?>