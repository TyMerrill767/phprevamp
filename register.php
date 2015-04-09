<?php
require ('mysqli_connect.php'); //Connect to database.
if ($_SERVER['REQUEST_NETHOD'] == 'POST') {
    $errors = array();
    //Check for a first name.
    if (empty($_POST['fname'])) {
        $errors[] = 'You forgot to enter your first name.';
    } else {
        $fn = myqli_real_escape_string($dbcon, trim($_POST['fname']));
    }
?>

<form action="register.php" method="post">
<p><label class="label" for="fname">First Name:</label>
<input type="text" name="fname" size="30" maxlength="30"
value="<?php if (isset($_POST['fname'])) echo $_POST['fname'];?>"></p>
<p><input type="submit" name="submit" value="Register"></p>
