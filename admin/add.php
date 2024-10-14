<?php
include_once('../functions/functions.php');
$dbconnect = dblink();

if ($dbconnect) {
    echo '<!-- connection established -->';
}




    if (isset($_POST['ufoWatcher']) && isset($_POST['ufoLocation']) && isset($_POST['ufoAspect'])) {
        $ufoWatcher = trim($_POST['ufoWatcher']);
        $ufoLocation = trim($_POST['ufoLocation']);
        $ufoAspect = trim($_POST['ufoAspect']);
    
       
        if (strlen($ufoWatcher) > 100 || strlen($ufoAspect) > 255) {
            echo "Error: Input exceeds the allowed length.";
            exit;
        }
    
        if (empty($ufoWatcher) || empty($ufoLocation) || empty($ufoAspect)) {
            echo "All fields are required.";
            exit;
        }
    
      
        $RESULT =insertItem($dbconnect, $ufoWatcher, $ufoLocation, $ufoAspect) ;
        echo'<a href="addufos.php">Return</a>';
        echo '<h1> the sighting has been recorded!</h1>';
        }
        echo'<a href="../public/contact.php">See all recorded sightings</a>';

    

      
?>