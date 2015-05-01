<?php
require('mysqli_connect.php');

mysql_connect("localhost", "admin", "instructor") or die (mysql_error());

mysql_select_db("phprediscography") or die(mysql_error());

$q = "SELECT * FROM albums
    JOIN tracks
    ON albums.albumID=tracks.albumID";
    $t = "SELECT trackname FROM tracks WHERE albumID = 1";
    $b = "SELECT trackname FROM tracks WHERE albumID = 2";
    $n = "SELECT trackname FROM tracks WHERE albumID = 3";
    $r = "SELECT trackname FROM tracks WHERE albumID = 4";
    $result = mysqli_query($dbcon, $q);
    $result1 = mysqli_query($dbcon, $t);
    $result2 = mysqli_query($dbcon, $b);
    $result3 = mysqli_query($dbcon, $n);
    $result4 = mysqli_query($dbcon, $r);

if ($result)
{
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    echo '<img class="img-responsive album-cover" src='.$row['coverart'] . '>';
    echo '<p>' . $row['albumname'] . '</p>';

        if($row['albumID']==1)
        {
            foreach($result1 as $row1)
            {
            echo '<li>' . $row1['trackname'] . '</li>';
            }
        }

        if($row['albumID']==2)
        {
            foreach($result2 as $row2)
            {
            echo '<li>' . $row1['trackname'] . '</li>';
            }
        }
}

?>
