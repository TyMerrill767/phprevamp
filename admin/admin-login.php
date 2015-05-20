<!doctype html>
<html lang=en>
<head>
<title>Login</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="includes.css">
</head>
<body>
<div id="container">
<div id="content"><!-- Start of the login page content. -->
<?php
// This section processes submissions from the login form.
// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	//connect to database
	require ('mysqli_connect.php');
	// Validate the email address:
	if (!empty($_POST['email'])) {
			$e = mysqli_real_escape_string($dbcon, $_POST['email']);
	} else {
	$e = FALSE;
		echo '<p class="error">You forgot to enter your email address.</p>';
	}
	// Validate the password:
	if (!empty($_POST['psword'])) {
			$p = mysqli_real_escape_string($dbcon, $_POST['psword']);
	} else {
	$p = FALSE;
		echo '<p class="error">You forgot to enter your password.</p>';
	}
	if ($e && $p){//if no problems
// Retrieve the user_id, first_name and user_level for that email/password combination:
		$q = "SELECT user_id, fname, user_level FROM users WHERE (email='$e' AND psword=SHA1('$p'))";
//run the query and assign it to the variable $result
		$result = mysqli_query ($dbcon, $q);
// Count the number of rows that match the email/password combination
	if (@mysqli_num_rows($result) == 1) {//The user input matched the database record
// Start the session, fetch the record and insert the three values in an array
		session_start();
		$_SESSION = mysqli_fetch_array ($result, MYSQLI_ASSOC);
$_SESSION['user_level'] = (int) $_SESSION['user_level']; // Ensure that the user level is an integer
$url = ($_SESSION['user_level'] === 1) ? 'admin-page.php' : 'members-page.php'; // Use a ternary operation to set the URL
header('Location: ' . $url); // Make  the browser load either the members’ or the admin page
exit(); // Cancels the rest of the script.
	mysqli_free_result($result);
	mysqli_close($dbcon);
	} else { // No match was made.
	echo '<p class="error">The email address and password entered do not match our records.<br>Perhaps you need to register, click the Register button on the header menu</p>';
	}
	} else { // If there was a problem.
		echo '<p class="error">Please try again.</p>';
	}
	mysqli_close($dbcon);
	} // End of SUBMIT conditional.
?>
<!-- Display the form fields-->
<h2>Login</h2>
<form action="login.php" method="post">
	<p><label class="label" for="email">Email Address:</label>
	<input id="email" type="text" name="email" size="30" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" > </p>
	<br>
	<p><label class="label" for="psword">Password:</label>
	<input id="psword" type="password" name="psword" size="12" maxlength="12" value="<?php if (isset($_POST['psword'])) echo $_POST['psword']; ?>" ><span>&nbsp;Between 8 and 12 characters.</span></p>
	<p>&nbsp;</p><p><input id="submit" type="submit" name="submit" value="Login"></p>
</form><br>
</div>
</div>
</body>
</html>
