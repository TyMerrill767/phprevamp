<?php
require ('mysqli_connect.php');
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $errors = array(); //Start an errors array
     //Trim and cleanup input fields
     $unme = trim($_POST['firstname']);
     //Strip HTML tags, apply escaping
     $stripped = mysqli_real_escape_string($dbcon, strip_tags($unme));
     //Get string lengths
     $strLen = mb_strlen($stripped, 'utf8');
    //Check stripped string
    if( $strLen < 1 ) {
        $errors[] = 'Please enter your first name.';
    }else{
    $firstname = $stripped;
    }
 }
?>

<?php
//Connection to database.
$connect = mysqli_connect("localhost","admin","instructor","phprediscography");
//Send form data to database.
mysqli_query($connect, "INSERT INTO members (fname, lname, address, city, state, zipcode, email, emailpref, dob, comment)
VALUES ('$_POST[firstname]', '$_POST[lastname]', '$_POST[address]', '$_POST[city]', '$_POST[state]', '$_POST[zip]', '$_POST[email]', '$_POST[emailpref]', '$_POST[dob]', '$_POST[comment]')");
?>
