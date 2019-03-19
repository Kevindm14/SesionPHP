<?php
    session_start();

    if (isset($_SESSION['usuario'])) {
        header('Location: index.php');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = filter_var(strtolower($_POST['name']), FILTER_SANITIZE_STRING);
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $errors = '';

        if (empty($name) or empty($password) or empty($password2)) {
            $errors .= "<li>Fill in the fields correctly</li>";
        } else {
            try {
                $conection = new PDO('mysql:host=localhost;dbname=sesion;', 'root', 'localhost');
            } catch (PDOException $e) {
                echo "Error" . $e->getMessage();
            }

            // Validation Username 
            $statement = $conection->prepare('SELECT * FROM users WHERE name = :name LIMIT 1');
            $statement->execute(array(':name' => $name));
            $result = $statement->fetch();
            if ($result != false) {
                $errors .= "<li>This username already exists</li>";
            }

            // Validation Password
            $password = hash('sha512', $password);
            $password2 = hash('sha512', $password2);

            if ($password != $password2) {
                $errors .= "<li>Passwords are not equal</li>";
            }
        }

        if ($errors == '') {
            $statement = $conection->prepare('INSERT INTO users (id, name, password) VALUES(null, :name, :password)');
            $statement->execute(array(
                ':name' => $name, 
                ':password' => $password)
            );

            header('Location: login.php');
        }
    }

    require 'views/register.view.php';
?>