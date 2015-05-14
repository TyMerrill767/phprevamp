<?php
require('mysqli_connect.php');

// SQL query
$q = "SELECT albums.albumname, albums.albumID, albums.coverart, tracks.trackname
FROM albums
JOIN tracks
ON albums.albumID=tracks.albumID";
$result = mysqli_query($dbcon, $q);

$current_albumID = ""; //create current albumID var to be used below.

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){//loop through database to get each album

   if($row['albumID'] != $current_albumID){
       echo '<div class="col-md-3 col-sm-12"><img class="img-responsive album-cover" src='.$row['coverart'] . ' alt="album cover" title="Random Access Memory">' . '<br />';
       echo '<h2>' . $row['albumname'] . "</h2><br />";
       $current_albumID = $row['albumID']; // set current albumID to this albumID
   }
   echo '<p>' . $row['trackname'] . '</p>';
   echo "</div>";
}
?>
