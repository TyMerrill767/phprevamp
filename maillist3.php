<?php
//Connection to database.
$dbcon = mysqli_connect("localhost","admin","instructor","phprediscography");
//Send form data to database.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errors = array(); // Start an errors array
// Trim the username
$unme = trim($_POST['firstname']);
// Strip HTML tags and apply escaping
$stripped = mysqli_real_escape_string($dbcon, strip_tags($unme));
// Get string lengths
$strLen = mb_strlen($stripped, 'utf8');
// Check stripped string
if( $strLen < 1 ) {
    $errors[] = 'Please enter your first name.';
}else{
$firstname = $stripped;
}
$unme = trim($_POST['lastname']);
// Strip HTML tags and apply escaping
$stripped = mysqli_real_escape_string($dbcon, strip_tags($unme));
// Get string lengths
$strLen = mb_strlen($stripped, 'utf8');
// Check stripped string
if( $strLen < 1 ) {
$errors[] = 'Please enter your first name.';
}else{
$lastname = $stripped;
}
$unme = trim($_POST['address']);
// Strip HTML tags and apply escaping
$stripped = mysqli_real_escape_string($dbcon, strip_tags($unme));
// Get string lengths
$strLen = mb_strlen($stripped, 'utf8');
// Check stripped string
if( $strLen < 1 ) {
$errors[] = 'Please enter your first name.';
}else{
$address = $stripped;
}
$unme = trim($_POST['city']);
// Strip HTML tags and apply escaping
$stripped = mysqli_real_escape_string($dbcon, strip_tags($unme));
// Get string lengths
$strLen = mb_strlen($stripped, 'utf8');
// Check stripped string
if( $strLen < 1 ) {
$errors[] = 'Please enter your first name.';
}else{
$city = $stripped;
}
$unme = trim($_POST['state']);
// Strip HTML tags and apply escaping
$stripped = mysqli_real_escape_string($dbcon, strip_tags($unme));
// Get string lengths
$strLen = mb_strlen($stripped, 'utf8');
// Check stripped string
if( $strLen < 1 ) {
    $errors[] = 'Please enter your first name.';
}else{
$state = $stripped;
}
$unme = trim($_POST['zip']);
// Strip HTML tags and apply escaping
$stripped = mysqli_real_escape_string($dbcon, strip_tags($unme));
// Get string lengths
$strLen = mb_strlen($stripped, 'utf8');
// Check stripped string
if( $strLen < 1 ) {
    $errors[] = 'Please enter your first name.';
}else{
$zip = $stripped;
}
//Set the email variable to FALSE
$email = FALSE;
// Check that an email address has been entered
if (empty($_POST['email'])) {
$errors[] = 'You forgot to enter your email address.';
}
//Remove spaces from beginning and end of the email address and validate it
if (filter_var((trim($_POST['email'])), FILTER_VALIDATE_EMAIL)) {
//A valid email address is then registered
$email = mysqli_real_escape_string($dbcon, (trim($_POST['email'])));
}else{
$errors[] = 'Your email is not in the correct format.';
}
$emailpref = $stripped;
$dob =  $stripped;
$comment = $stripped;
if(empty($errors)) {
    $q = "INSERT INTO members (fname, lname, address, city, state, zipcode, email, emailpref, dob, comment)
    VALUES ('', '$firstname', '$lastname', '$address', '$city', '$state', '$zip', '$email', '$emailpref', '$dob', '$comment')";
    $result = @mysqli_query ($dbcon, $q);
    } else {
        echo'<h2>Error!</h2>
        <p class="error">The following error(s) occurred:<br />';
        foreach ($errors as $msg) {
        echo " - $msg<br />\n";
        }
    }
}
?>
