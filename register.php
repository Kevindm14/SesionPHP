<?php
    session_start();

    if (isset($_SESSION['usuario'])) {
        header('Location: index.php');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = filter_var(strtolower($_POST['name']), FILTER_SANITIZE_STRING);
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        echo "$name - $password - $password2";
    }

    require 'views/register.view.php';
?>