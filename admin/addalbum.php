<!doctype html>
<html lang=en>
<head>
<title>Add Albums</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="includes.css">
</head>
<body>
<?php
//Connection to database.
$connect = mysqli_connect("localhost","admin","instructor","phprediscography");
//Send form data to database.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errors = array(); // Start an errors array

$an = trim($_POST['albumname']);
// Strip HTML tags and apply escaping
$stripped = mysqli_real_escape_string($connect, strip_tags($an));
// Get string lengths
$strLen = mb_strlen($stripped, 'utf8');
// Check stripped string
if( $strLen < 1 ) {
    $errors[] = 'Please enter your first name.';
}else{
$albumname = $stripped;
$albumname = preg_replace("/[^a-z]+/i", "", $albumname);
}

$an = trim($_POST['coverart']);
// Strip HTML tags and apply escaping
$stripped = mysqli_real_escape_string($connect, strip_tags($an));
// Get string lengths
$strLen = mb_strlen($stripped, 'utf8');
// Check stripped string
if( $strLen < 1 ) {
    $errors[] = 'Please enter your first name.';
}else{
$coverart = $stripped;
}

$an = trim($_POST['tracks']);
// Strip HTML tags and apply escaping
$stripped = mysqli_real_escape_string($connect, strip_tags($an));
$tracks = $an;


    if(empty($errors)) {
    mysqli_query($connect, "INSERT INTO albums (albumname, coverart, tracks)
    VALUES ('$albumname', '$coverart', '$tracks')");
    //header("location: thank-you-page.php");
        $to = "tyler_merrill2011@hotmail.com";
        $subject = "New Subscriber";
        $msg = $albumname;
        mail($to, $subject, $msg);
    }
}
?>
   <h2>Add Album</h2>
    <form action="addalbum.php" method="post">
        <p><label class="label" for="albumname">Album Name:</label>
        <input id="albumname" type="text" name="albumname" size="30" maxlength="60" value="<?php if (isset($_POST['albumname'])) echo $_POST['albumname']; ?>"></p>
        <p><label class="label" for="coverart">File path to cover art:</label>
        <input id="coverart" type="coverart" name="coverart" value="<?php if (isset($_POST['coverart'])) echo $_POST['coverart']; ?>"></p>
        <p><label class="label" for="tracks"># of tracks:</label>
        <input id="tracks" type="text" name="tracks" size="30" maxlength="60" value="<?php if (isset($_POST['tracks'])) echo $_POST['tracks']; ?>"></p>
         <div class="submit-container">
         <input class="submit-button" type="submit" value="Upload">
         </div>
    </form><br>
</body>
</html>
