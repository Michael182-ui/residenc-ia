<?php 
    require 'database.php';

    $message = ' ';
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $_POST['email']);
        $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
        $stmt->bindParam(':password',$password);

        if($stmt->execute())
        {
            $message = 'Usuario creado satisfactoriamente';
        }else{
            $message = 'ha ocurrido un error';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styleSignUp.css">
</head>

<body>
    <?php require 'partials/header.php' ?>

    <?php  if(!empty($message)) :?>
        <p><?= $message ?> </p>
    <?php endif; ?>

    <h1>Registro</h1>
    <spam> or <a href="login.php">Login</a></spam>
    <form action="signup.php" method="post">
        <input type="text" name="email" placeholder="Introduce tu email">
        <input type="password" name="password" placeholder="Ingresa tu contraseña">
        <input type="password" name="confirmPassword" placeholder="Ingresa tu contraseña">
        <input type="submit" value="send">
    </form>
</body>

</html>