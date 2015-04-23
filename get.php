
	<?php
    require('mysqli_connect.php');

	// Connect to database server
	mysql_connect("localhost", "admin", "instructor") or die (mysql_error ());

	// Select database
	mysql_select_db("phprediscography") or die(mysql_error());

	// SQL query
	$strSQL = "SELECT *
    FROM albums
    JOIN tracks
    ON albums.albumID=tracks.albumID";

	// Execute the query (the recordset $rs contains the result)
	$rs = mysql_query($strSQL);

	// Loop the recordset $rs
	// Each row will be made into an array ($row) using mysql_fetch_array
	while($row = mysql_fetch_array($rs)) {

	   // Write the value of the column FirstName (which is now in the array $row)
       //echo '<img src='.$row['coverart'] . '>';
       echo $row['albumname'] . "<br />";
       echo $row['trackname'] . "<br />";
	  }

	// Close the database connection
	mysql_close();
	?>
