<?php
//Connection to database.
$connect = mysqli_connect("localhost","admin","instructor","phprediscography");
//Send form data to database.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errors = array(); // Start an errors array

// Trim the first name
$fn = trim($_POST['firstname']);
// Strip HTML tags and apply escaping
$stripped = mysqli_real_escape_string($connect, strip_tags($fn));
// Get string lengths
$strLen = mb_strlen($stripped, 'utf8');
// Check stripped string
if( $strLen < 1 ) {
    $errors[] = 'Please enter your first name.';
}else{
$firstname = $stripped;
$firstname = preg_replace("/[^a-z]+/i", "", $firstname);
}

// Trim the last name
$ln = trim($_POST['lastname']);
// Strip HTML tags and apply escaping
$stripped = mysqli_real_escape_string($connect, strip_tags($ln));
// Get string lengths
$strLen = mb_strlen($stripped, 'utf8');
// Check stripped string
if( $strLen < 1 ) {
    $errors[] = 'Please enter your last name.';
}else{
$lastname = $stripped;
$lastname = preg_replace("/[^a-z]+/i", "", $lastname);
}

// Trim the address
$adr = trim($_POST['address']);
// Strip HTML tags and apply escaping
$stripped = mysqli_real_escape_string($connect, strip_tags($adr));
// Get string lengths
$strLen = mb_strlen($stripped, 'utf8');
// Check stripped string
if( $strLen < 1 ) {
    $errors[] = 'Please enter your address.';
}else{
$address = $stripped;
$address = preg_replace("/[^a-z0-9]+/i", " ", $address);
}

// Trim the city
$ct = trim($_POST['city']);
// Strip HTML tags and apply escaping
$stripped = mysqli_real_escape_string($connect, strip_tags($ct));
// Get string lengths
$strLen = mb_strlen($stripped, 'utf8');
// Check stripped string
if( $strLen < 1 ) {
    $errors[] = 'Please enter your city.';
}else{
$city = $stripped;
$city = preg_replace("/[^a-z]+/i", " ", $city);
}

// Trim the state
$st = trim($_POST['state']);
// Strip HTML tags and apply escaping
$stripped = mysqli_real_escape_string($connect, strip_tags($st));
// Get string lengths
$strLen = mb_strlen($stripped, 'utf8');
// Check stripped string
if( $strLen < 1 ) {
    $errors[] = 'Please enter your state of residence.';
}else{
$state = $stripped;
$state = preg_replace("/[^a-z]+/i", "", $state);
}

// Trim the zip
$zip = trim($_POST['zip']);
// Strip HTML tags and apply escaping
$stripped = mysqli_real_escape_string($connect, strip_tags($zip));
// Get string lengths
$strLen = mb_strlen($stripped, 'utf8');
// Check stripped string
if( $strLen < 1 ) {
    $errors[] = 'Please enter your zip code.';
}else{
$zip = $stripped;
$zip = preg_replace("/\D/", "", $zip);
}

//Set the email variable to FALSE
$e = FALSE;
// Check that an email address has been entered
if (empty($_POST['email'])) {
$errors[] = 'You forgot to enter your email address.';
}
//Remove spaces from beginning and end of the email address and validate it
if (filter_var((trim($_POST['email'])), FILTER_VALIDATE_EMAIL)) {
//A valid email address is then registered
$e = mysqli_real_escape_string($connect, (trim($_POST['email'])));
$email = $stripped;
$email = preg_replace("/\D/", "", $email);
}else{
$errors[] = 'Your email is not in the correct format.';
}

$bdt = trim($_POST['dob']);
// Strip HTML tags and apply escaping
$stripped = mysqli_real_escape_string($connect, strip_tags($bdt));
// Get string lengths
$strLen = mb_strlen($stripped, 'utf8');
// Check stripped string
if( $strLen < 1 ) {
    $errors[] = 'Please enter your date of birth.';
}else{
$dob = $stripped;
}

    if(empty($errors)) {
    mysqli_query($connect, "INSERT INTO members (fname, lname, address, city, state, zipcode, email, emailpref, dob, comment)
    VALUES ('$firstname', '$lastname', '$address', '$city', '$state', '$zip', '$email', '$_POST[emailpref]', '$dob', '$_POST[comment]')");
    } else {
        echo'<h2>Error!</h2>
        <p class="error">The following error(s) occurred:<br />';
        foreach ($errors as $msg) {
            echo " - $msg<br />\n";
        }
    }
}
?>
