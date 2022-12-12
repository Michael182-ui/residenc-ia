<?php 
    session_start();
    require 'database.php';

    if(isset($_SESSION['user_id']))
    {
        $records = $conn->prepare('SELECT id, email , password FROM users WHERE id = :id');
        $records->bindParam(':id',$_SESSION['user_id']);
        $records-> execute();
        $results = $records->fetch(PDO:: FETCH_ASSOC);

        $user = null;

        if(count($results)>0)
        {
            $user = $results;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Anteproyecto de residencia</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styleIndex.css">
</head>

<body>

    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?>
        <br>bienvenido. <?= $user['email']; ?>
        <br>Logeo exitoso
        <a href="logout.php">Cerrar sesión</a>
    <?php else: ?>
        <h1>Registro de anteproyecto de residencia</h1>
        <h2>Por favor inicia sesion o registrate</h2>
        <a href="login.php">Iniciar Session</a>
        <a href="signup.php">Registro</a>
    <?php endif; ?>

</body>

</html>