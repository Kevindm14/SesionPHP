<?php 
    try {
        $conection = new PDO('mysql:host=localhost;dbname=sesion;', 'root', 'localhost');
    } catch (PDOException $e) {
        echo "Error" . $e->getMessage();
    }
?>