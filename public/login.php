<?php
session_start();
include_once '../functions/functions.php';
$dbconnect = dblink();

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>UFOs</title>
    <link rel="icon" type="image/svg+xml" href="../images/icon.svg">    
    <link rel="stylesheet" href="../styles/styles.css">
</head>

<body>

<header class="wrapper">
    <nav class="nav_container">
        <div class="nav_logo"> 
            <img class="logo" src="../images/logo.png" alt="ufos logo">
        </div>
        <ul class="nav_links">
            <li class="nav_item">
                <a href="../index.php" class="nav_link ">Home</a>
            </li>
            <li class="nav_item">
                <a href="contact.php" class="nav_link">Recently Contact</a>
            </li>
            <li class="nav_item">
                <a href="login.php" class="nav_link logi login_boton">Login</a>
            </li>
        </ul>
    </nav>
    </div>
</header>
    <form class="login" action="../admin/dashboard.php" method="post">
        <input type="text" name="uname" placeholder="Nombre de usuario" required><br>
        <input type="password" name="pwd" placeholder="Contraseña" required><br>
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>