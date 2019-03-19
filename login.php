<?php
    session_start();
    require 'db.php';

    if (isset($_SESSION['usuario'])) {
        header('Location: index.php');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = filter_var(strtolower($_POST['name']), FILTER_SANITIZE_STRING);
        $password = $_POST['password'];
        $password = hash('sha512', $password);
        $errors = '';
        
        $statement = $conection->prepare('SELECT * FROM users WHERE name = :name AND password = :password');
        $statement->execute(array(
            ':name' => $name,
            ':password' => $password
        ));
        $result = $statement->fetch();

        if ($result !== false) {
            $_SESSION['usuario'] = $name;
            header('Location: index.php');
        } else {
            $errors .= '<li>The name or password is incorrect</li>';
        }
    }

    require 'views/login.view.php';
?>