<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <title>Sign up</title>
</head>
<body>
    <div class="contenedor">
        <div class="item">
            <h1 class="titulo">Sign up</h1>
            <hr class="border">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="form" name="login">
                <div class="form-group">
                    <i class="icono izquierda fa fa-user"></i><input type="text" class="usuario" name="name" placeholder="Write you name">
                </div>
                <div class="form-group">
                    <i class="icono izquierda fa fa-lock"></i><input type="password" class="password" name="password" placeholder="Write you password">
                    <i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
                </div>
                <?php if (!empty($errors)) { ?>
                    <div class="error">
                        <ul>
                            <?php echo $errors; ?>

                        </ul>
                    </div>
                <?php } ?>
            </form>
            <p class="text-login">
                You are not yet registered?
                <a href="register.php">Sign in</a>
            </p>
        </div>
    </div>
</body>
</html>