	<?php
    require('mysqli_connect.php');

	// Connect to database server
	mysql_connect("localhost", "admin", "instructor") or die (mysql_error ());

	// Select database
	mysql_select_db("phprediscography") or die(mysql_error());

	// SQL query
	$q = "SELECT *
    FROM albums
    JOIN tracks
    ON albums.albumID=tracks.albumID";
    $t = "SELECT trackname FROM tracks WHERE Album_id = 1";
    $b = "SELECT trackname FROM tracks WHERE Album_id = 2";
    $n = "SELECT trackname FROM tracks WHERE Album_id = 3";
    $r = "SELECT trackname FROM tracks WHERE Album_id = 4";
    $result = mysqli_query($dbcon, $q);
    $result1 = mysqli_query($dbcon, $t);
    $result2 = mysqli_query($dbcon, $b);
    $result3 = mysqli_query($dbcon, $n);
    $result4 = mysqli_query($dbcon, $r);
    if ($result)
    {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
               if($row['albumID']==1){
                    foreach($result1 as $row1) {
                        //echo '<img src='.$row['coverart'] . '>';
                        //echo $row['albumname'] . "<br />";
                        echo '<li>' . $row1['trackname'] . '</li>';
                    }
               }
        }
    }
	// Close the database connection
	mysql_close();
	?>
