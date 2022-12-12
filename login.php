<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: /loginPhp/index.php');
}
require 'database.php';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = ' ';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
        $_SESSION['user_id'] = $results['id'];
        header('Location: /loginPhp/index.php');
    } else {
        $message = 'Tus credenciales no coinsiden';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styleSignUp.css">
</head>

<body>

<?php require 'partials/header.php' ?>

    <div class="form-body">
        <?php if (!empty($message)) : ?>
            <p><?php $message ?></p>
        <?php endif; ?>

        <h1>Login</h1>
    <spam> or <a href="signup.php">Registro</a>

        <form action="login.php" class="login-form" method="POST">
            <input type="text" class="entrada" name="email" placeholder="Introduce tu email">
            <input type="password" class="entrada" name="password" placeholder="Ingresa tu contraseña">
            <input type="submit" value="submit">
        </form>
    </div>

</body>

</html>