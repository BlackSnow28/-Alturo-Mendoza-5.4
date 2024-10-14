<?php
session_start();
include_once('../functions/functions.php');
$dbconnect = dblink();

if ($dbconnect) {
    echo '<!-- connection established -->';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $ufoWatcher = $_POST['ufoWatcher'];
    $ufoLocation = $_POST['ufoLocation'];
    $ufoAspect = $_POST['ufoAspect'];

    updateUfo($dbconnect, $id, $ufoWatcher, $ufoLocation, $ufoAspect);
    echo '<a href="updateufos.php">Return</a><br>';
    echo'<a href="../public/contact.php">See all recorded sightings</a>';

} else {
    echo "No data received.";
}
?>