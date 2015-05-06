	<?php
    require('mysqli_connect.php');

	// Connect to database server
	mysql_connect("localhost", "admin", "instructor") or die (mysql_error ());

	// Select database
	mysql_select_db("phprediscography") or die(mysql_error());

	// SQL query
	$q = "SELECT DISTINCT albums.albumname, albums.albumID, albums.coverart
    FROM albums
    JOIN tracks
    ON albums.albumID=tracks.albumID";//select UNIQUE results from database
    $t = "SELECT trackname FROM tracks WHERE albumID = 1";
    $b = "SELECT trackname FROM tracks WHERE albumID = 2";
    $n = "SELECT trackname FROM tracks WHERE albumID = 3";
    $r = "SELECT trackname FROM tracks WHERE albumID = 4";
    $result = mysqli_query($dbcon, $q);
    $result1 = mysqli_query($dbcon, $t);
    $result2 = mysqli_query($dbcon, $b);
    $result3 = mysqli_query($dbcon, $n);
    $result4 = mysqli_query($dbcon, $r);

    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){//loop through database to get each album

       echo '<img class="img-responsive" src='.$row['coverart'] . '>' . '<br />';
       echo '<h2>' . $row['albumname'] . "</h2><br />";

       if($row['albumID']==1){
           foreach($result1 as $row1){//loop through tracks and output to page
                echo '<p>' . $row1['trackname'] . '</p>';
           }
        }

        if($row['albumID']==2){
           foreach($result2 as $row2){//loop through tracks and output to page
                echo '<p>' . $row2['trackname'] . '</p>';
           }
        }

        if($row['albumID']==3){
           foreach($result3 as $row3){//loop through tracks and output to page
                echo '<p>' . $row3['trackname'] . '</p>';
           }
        }

        if($row['albumID']==4){
           foreach($result4 as $row4){//loop through tracks and output to page
                echo '<p>' . $row4['trackname'] . '</p>';
           }
        }
    }
	// Close the database connection
	mysql_close();
	?>
