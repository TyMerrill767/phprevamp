	<?php
    require('mysqli_connect.php');

	// Connect to database server
	mysql_connect("localhost", "admin", "instructor") or die (mysql_error ());

	// Select database
	mysql_select_db("phprediscography") or die(mysql_error());

	// SQL query
	$q = "SELECT DISTINCT *
    FROM albums
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
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            echo '<div class="col-small-6 col-med-6 col-lg-4 albumContainer">';
            echo $row['albumname'] . "<br />";
               if($row['albumID']==1)
               {
                    foreach ($result1 as $row1)
                    {
                        //echo $row['albumname'] . "<br />";
                        echo '<li>' . $row1['trackname'] . '</li>';
                    }
               }
        }
    }
	// Close the database connection
	mysql_close();
	?>
