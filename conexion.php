<?php

  $server = 'localhost';
  $username = 'id18445739_dentista_admin';
  $password = 'Monono-456789';
  $database = 'id18445739_sonrisas_felices';

  try {
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
  } 
  catch (PDOException $e) {
    die('Connection Failed: ' . $e->getMessage());
  }
    
?>