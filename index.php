<!--PHP code block to validate, sanitize, and insert data into database upon form submission-->
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
        $to = "tyler_merrill2011@hotmail.com";
        $subject = "New Subscriber";
        $msg = $firstname;
        mail($to, $subject, $msg);
    }
}
?>

<!DOCTYPE HTML>
<html lang ="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <head>
        <title>Daft Punk Discography</title>

        <link href="_css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="_css/custom.css" rel="stylesheet" type="text/css">
        <link href="_css/headline.css" rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400' rel='stylesheet' type='text/css'>

        <script language="javascript" type="text/javascript" src="_js/jquery-2.1.1.js"></script>
        <script language="javascript" type="text/javascript" src="_js/main.js"></script>
        <script language="javascript" type="text/javascript" src="_js/modernizr.js"></script>
        <script language="javascript" type="text/javascript" src="_js/bootstrap.min.js"></script>

    </head>

<body>
    <?php
    if ($_GET['level']){
        include('admin/admin-header.php');
    }else{
        include('includes/header.php');
    }
    ?>

    <div class="container-fluid jumbotron main">
        <img class ="jumbo-logo" src="_img/daft-punk-logo_gold.png" alt="logo" title="daft punk logo">
<!--ANIMATED HEADLINE EFFECT (HEADLINE.CSS)-->
        <section class="cd-intro">
            <h1 class="cd-headline rotate-1 quote">
                <span>daft punk is</span>
                <span class="cd-words-wrapper">
                    <b class="is-visible">funk.</b>
                    <b>house.</b>
                    <b>electro.</b>
                </span>
            </h1>
        </section>
<!--END EFFECT-->
    </div>

<!--BAND MEMBER DIVS-->
    <div class="container-fluid">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <img id="member1" src="_img/daft-punk_one.jpg" alt="guy-manuel" title="Guy-Manuel">
        </div>

        <div id= "member1text" class=" container col-md-6 col-md-pull-1">
            <h2 id="band" class="bio">The Band</h2>
            <h3>Thomas Bangalter</h3>
            <p><b>Thomas Bangalter</b> is a French electronic musician best known for being one half of the French house music duo Daft Punk, alongside <b>Guy-Manuel de Homem-Christo</b>. He has also recorded and released music as a member of the trio Stardust, the duo Together, and as a solo artist including compositions for the film Irréversible. Thomas Bangalter owns a music label called Roulé. Outside of music production, his credits include film director and cinematographer.</p>
            <p>Thomas was born in Paris, France. He began playing the piano at the age of six. Bangalter stated in a video interview that his parents were strict in keeping up his practice, for which he later thanked them. His father, Daniel Vangarde was a famous songwriter and producer for performers such as the Gibson Brothers, Ottawan, and Sheila B. Devotion.</p>
        </div>
    </div>


    <div class="container-fluid">
        <div class="col-md-6 col-md-push-6">
            <img id="member2" src="_img/daft-punk_two.jpg" alt="guy-manuel" title="Guy-Manuel">
        </div>

        <div id= "member2text" class=" container col-md-6 col-md-pull-5">
            <h3>Guy Manuel de Homem-Christo</h3>
            <p><b>Guillaume Emmanuel "Guy-Manuel" de Homem-Christo</b> is the other half of the French house music duo Daft Punk. He has also produced several works from his record label Crydamoure with label co-owner Éric Chedeville. He and Chedeville formed the musical duo Le Knight Club.</p>
            <p>De Homem-Christo met <b>Thomas Bangalter</b> when they were attending the Lycée Carnot school together in 1987. It was there that they discovered their mutual fascination for films and music of the 1960s and 70s. A negative review referred to their music as "a daft punky thrash", which inspired the band's new name.</p>
        </div>
    </div>

<!--ALBUM DIVS-->
    <div class="container-fluid albums">
        <h2 id="albums">Albums</h2>
        <?php include('includes/get.php') ?>
    </div>

<!--MAILING LIST FORM-->
       <!--Checks for errors in form input, outputs error message if any are found-->
        <div id="error-area" class="container-fluid">
        <?php
            if (!empty($errors)){
                foreach ($errors as $msg) {
                    echo "<p class='error form-information'>- $msg</p><br />\n";
                }
            } else {
                 echo "";
            }
        ?>
        </div>

        <!--Sign-up form, retains information if errors are found-->
        <div class="col-md-12 form">
            <form action="index.php" class="form-container" method="post">
                <div><h2 id="mail" class="form-header">Sign up for our mailing list</h2></div>
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
    <?php include('includes/footer.php');?>
</body>


</html>
