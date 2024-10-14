<?php
    session_start();
    include_once '../functions/functions.php';
    $dbconnect = dblink();
    if ($dbconnect) {
    echo 'connection established';
    error_reporting(E_ALL);
}
?>
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>UFOs asighting</title>
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
                <a href="removeufos.php" class="nav_link remove">Remove</a>
            </li>
            <li class="nav_item">
                <a href="dashboard.php" class="nav_link ">Dashboard</a>
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
<div class="content">
    <h1>Do you think it was a mistake ?</h1><br>
    <h2>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat recusandae harum inventore error illo, consectetur ratione optio enim distinctio quidem quibusdam cum unde odit, expedita perspiciatis incidunt blanditiis libero id.</h2>

    <div class="newcontact">
     
        <h2> remove the sightings</h2>
        <?php
            listRemove($dbconnect);                    
        ?>
  
  
  
    </div>
</div>
</body>

</html>

