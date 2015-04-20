<?php
        require('mysqli_connect.php');
        $q = "SELECT albumname, coverart
              FROM albums
              INNER JOIN tracks ON albums.albumID = tracks.albumID";
        $t = "SELECT trackname FROM tracks WHERE albumId = 1";
        $b = "SELECT trackname FROM tracks WHERE albumID = 2";
?>
