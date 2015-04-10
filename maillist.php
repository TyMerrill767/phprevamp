<?php
//Connection to database.
$connect = mysqli_connect("localhost","admin","instructor","phprediscography");
//Send form data to database.
mysqli_query($connect, "INSERT INTO members (fname, lname, address, city, state, zipcode, email, emailpref, dob, comment)
VALUES ('$_POST[firstname]', '$_POST[lastname]', '$_POST[address]', '$_POST[city]', '$_POST[state]', '$_POST[zip]', '$_POST[email]', '$_POST[emailpref]', '$_POST[dob]', '$_POST[comment]')");
?>
