<?php
function dblink() {
    $username = "mri";
    $password = "password"; 
    $dbname = "ufos";

  
    $mysqli = new mysqli("localhost", $username, $password, $dbname);


    if ($mysqli->connect_error) {
        echo "Connection failed: " . $mysqli->connect_error;
        exit;
    }

    return $mysqli;
}

function showMem(){
    echo '<div class = "hello">';
    echo '<pre>';
    echo '<h4> Get Memory</h4>';
    print_r($_GET);
    echo '<h4> Post Memory</h4>';
    print_r($_POST);
    echo '<h4> Session Memory</h4>';
    print_r($_SESSION);
    echo '</pre>';
    echo '</div>';
}

function insertItem($dbconnect, $ufoWatcher, $ufoLocation, $ufoAspect) {
    
    if ($dbconnect->connect_error) {
        echo 'Failed to connect: ' . $dbconnect->connect_error;
        return false; 
    }

  
    $stmt = mysqli_prepare($dbconnect, "INSERT INTO contact (ID,ufoWatcher, ufoLocation, ufoAspect) VALUES (NULL, ?, ?, ?)");
    
    if ($stmt === false) {
        echo 'Prepare failed: ' . mysqli_error($dbconnect);
        return false; 
    }

 
    mysqli_stmt_bind_param($stmt, "sss", $ufoWatcher, $ufoLocation, $ufoAspect);


    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        return true; 
    } else {
        echo "Error inserting record: " . mysqli_stmt_error($stmt);
        mysqli_stmt_close($stmt);
        return false; 
    }
}

function listufo($dbConnect) {
    $sql = "SELECT * FROM contact";
    $result = mysqli_query($dbConnect, $sql);
    
    echo '<ul class="ufo-display">';

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<li class="lista">' . 
                 '<div class="watcher-name">' . $row['ufoWatcher'] . '</div>' . 
                 '<div class="ufo-location">' . $row['ufoLocation'] . '</div>' . 
                 '<div class="ufo-aspect">' . $row['ufoAspect'] . '</div>' . '<br><br>'. 
                 '</li>';
        }
    } else {
        echo '<li>No members found.</li>';
    }

    echo '</ul>';
}

function listUpdate($dbConnect) {
    $sql = "SELECT * FROM contact";
    $result = mysqli_query($dbConnect, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<form action="../admin/update.php" method="post">';
            echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
            echo '<input type="text" name="ufoWatcher" value="' . $row['ufoWatcher'] . '">';
            echo '<input type="text" name="ufoLocation" value="' . $row['ufoLocation'] . '">';
            echo '<input type="text" name="ufoAspect" value="' . $row['ufoAspect'] . '">';
            echo '<input type="submit" value="Update">';
            echo '</form>';
        }
    } else {
        echo '<li>No members found.</li>';
    }
}


function updateUfo($dbconnect, $id, $ufoWatcher, $ufoLocation, $ufoAspect) {
    $stmt = $dbconnect->prepare("UPDATE contact SET ufoWatcher = ?, ufoLocation = ?, ufoAspect = ? WHERE id = ?");
    
    if ($stmt === false) {
        echo 'Prepare failed: ' . $dbconnect->error;
        return false;
    }

    $stmt->bind_param("sssi", $ufoWatcher, $ufoLocation, $ufoAspect, $id);

    if ($stmt->execute()) {
        echo 'Record updated' . '<br><br>';
        $stmt->close();
        return true;
    } else {
        echo 'Failed to update: ' . $stmt->error;
        $stmt->close();
        return false;
    }
}

function listRemove($dbConnect) {
    $sql = "SELECT * FROM contact";
    $result = mysqli_query($dbConnect, $sql);

    echo '<div class="ufo-display">';
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<li class="lista">' . '<a href="../admin/remove.php?id='.$row['id'].'">Delete</a> '.'<br>'.$row['ufoWatcher'].'<br>'.$row['ufoLocation'].'<br>'.$row['ufoAspect'].'<br>';
            
        }
    } else {
        echo '<li>No members found.</li>';
    }
}

function deleteItem($dbconnect,$id){
    $sql ="DELETE FROM contact  WHERE id = '$id'";
    if(mysqli_query($dbconnect,$sql)){
        echo 'The sightings have been deleted<br> ';
        echo'<a href="removeufos.php">Return</a><br>';
        echo'<a href="../public/contact.php">See all recorded sightings</a>';

    }else{
        echo ' Failed to delete';
    }
}

function validate($dbconnect, $uname,$pwd) {
    $sql = "SELECT * FROM users";
    $result = mysqli_query($dbconnect,$sql);
     if (mysqli_num_rows($result) >0) {
         while($row = mysqli_fetch_assoc($result)) {
             if($row['uname'] == $uname) {
                 if ($row['pwd'] == $pwd) {
                     $_SESSION['name'] = $row['name'];
                     $_SESSION['id'] = $row['id'];
                     $_SESSION['auth'] = 'yes';
                     return true;
                 }
             }
         }
     }
 }
 