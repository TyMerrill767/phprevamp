<?php
    require('../mysqli_connect.php');

    $user_album_input = $_POST['album_input'];

    $q = "SELECT trackname
        FROM tracks WHERE albumname LIKE '%$user_album_input%'";

    $result = mysqli_query($dbcon, $q);
    while($row = mysqli_fetch_array($result)) {
    echo '<p>' . $row['trackname'] . '</p></br>';
    }
?>
