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
$email = mysqli_real_escape_string($connect, (trim($_POST['email'])));
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
$dob = date('Y-m-d', strtotime(str_replace('-', '/', $dob)));
}

$cm = trim($_POST['comment']);
// Strip HTML tags and apply escaping
$stripped = mysqli_real_escape_string($connect, strip_tags($cm));
// Get string lengths
$comment = $stripped;

    if(empty($errors)) {
    mysqli_query($connect, "INSERT INTO members (fname, lname, address, city, state, zipcode, email, emailpref, dob, comment)
    VALUES ('$firstname', '$lastname', '$address', '$city', '$state', '$zip', '$email', '$_POST[emailpref]', '$dob', '$comment')");
    header("location: thank-you-page.php");
    } else {
        echo'<p class="error">The following error(s) occurred:<br />';
        foreach ($errors as $msg) {
            echo " - $msg<br />\n";
        }
    }
}
?>


        <div class="col-md-12 form">
            <form action="index.php" class="form-container" method="post">
                <div><h2  class="form-header">Sign up for our mailing list</h2></div>
                <p class="form-information">Required fields are marked with an asterisk(*).</p>

                <label class="form-title" for="firstnamefield">*First Name</label>
                <input class="form-field" type="text" name="firstname" value="<?php if (isset($_POST['firstname'])) echo $_POST['firstname']; ?>"><br />

                <label class="form-title" for="lastnamefield">*Last Name</label>
                <input class="form-field" type="text" name="lastname" value="<?php if (isset($_POST['lastname'])) echo $_POST['lastname'];?>"><br />

                <label class="form-title" for="addressfield">*Address</label>
                <input class="form-field" type="text" name="address" value="<?php if (isset($_POST['address'])) echo $_POST['address']; ?>"><br />

                <label class="form-title" for="cityfield">*City</label>
                <input class="form-field" type="text" name="city" value="<?php if (isset($_POST['city'])) echo $_POST['city']; ?>"><br />

                <label class="form-title" for="statefield">*State</label>
                <input class="form-field" type="text" name="state" value="<?php if (isset($_POST['state'])) echo $_POST['state']; ?>"><br />

                <label class="form-title" for="zipfield">*Zip</label>
                <input class="form-field" type="text" name="zip" value="<?php if (isset($_POST['zip'])) echo $_POST['zip']; ?>"><br />

                <label class="form-title" for="emailfield">*Email</label>
                <input class="form-field" type="email" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"><br />

                <label class="form-title">Email Preference</label>
                    <div class="form-radio">
                        <input id="htmlbutton" type="radio" name="emailpref" value="HTML" checked>
                        <label for="htmlbutton">HTML</label>
                    </div>

                    <div class="form-radio">
                        <input id="plaintextbutton" type="radio" name="emailpref" value="Plain Text">
                        <label for="plaintextbutton">Plain Text</label>
                    </div>

                <label class="form-title" for="dobfield">*Date of Birth</label>
                <input class="form-field" type="date" name="dob" value="<?php if (isset($_POST['dob'])) echo $_POST['dob']; ?>">><br />

                <label class="form-title" for="comments">Comments</label>
                <textarea class="comment-field" name="comment" id="" rows="5" value="<?php if (isset($_POST['comment'])) echo $_POST['comment']; ?>"></textarea>

                <div class="submit-container">
                <input class="submit-button" type="submit" value="Sign Up!">
                </div>

            </form>
        </div>
