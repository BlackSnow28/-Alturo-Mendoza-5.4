<?php
session_start();
include_once('../functions/functions.php');
$dbconnect=dblink();
$uname = $_POST['uname'];
$pwd = $_POST['pwd'];

$validateusername = ($uname != NULL)?true:false;
$validatepassword = ($pwd != NULL)?true:false;
if ($_SESSION['auth'] == 'yes') {
    $validate = true;
} else if ($validateusername && $validatepassword) {
    $validate = validate($dbconnect,$uname,$pwd);
}

include_once('../functions/functions.php');
$dbconnect=dblink();
showMem();


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
                <a href="addufos.php" class="nav_link ">Add</a>
            </li>
            <li class="nav_item">
                <a href="updateufos.php" class="nav_link">Update</a>
            </li>
            <li class="nav_item">
                <a href="removeufos.php" class="nav_link">Remove</a>
            </li>
            <li class="nav_item">
                <a href="dashboard.php" class="nav_link dashboard">Dashboard</a>
            </li>
            <li class="nav_item">
                <?php
                 echo '<a href="../index.php?logout=logout" class= "login_boton">[ logout ]</a>';
                ?>
               
            </li>

        </ul>
    </nav>
    </div>
</header>
    <a href="home"></a>
   
    <?php 
     $uname = $_SESSION['name'];
    if ($validate){
        echo '<div class="hello">';
        echo 'Hello '.$uname;
        echo '<hr>';
        echo '</div>';

    }
    ?>
    

</body>
</html>