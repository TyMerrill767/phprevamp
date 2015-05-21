<!doctype html>
<html lang=en>
<head>
<title>Login</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="includes.css">
</head>
<body>
<?php
    // This section processes submissions from the login form.
    // Check if the form has been submitted:
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //connect to database
        require ('../mysqli_connect.php');
        // Validate the email address:
        if (!empty($_POST['email'])) {
                $e = mysqli_real_escape_string($dbcon, $_POST['email']);
        } else {
        $e = FALSE;
            echo '<p class="error">You forgot to enter your email address.</p>';
        }
        // Validate the password:
        if (!empty($_POST['password'])) {
                $p = mysqli_real_escape_string($dbcon, $_POST['password']);
        } else {
        $p = FALSE;
            echo '<p class="error">You forgot to enter your password.</p>';
        }
        if ($e && $p){//if no problems
    // Retrieve the user_id, first_name and level for that email/password combination:
            $q = "SELECT name, email, level FROM admin WHERE (email='$e' AND password=('$p'))";
    //run the query and assign it to the variable $result
            $result = mysqli_query ($dbcon, $q);
    // Count the number of rows that match the email/password combination
        if (@mysqli_num_rows($result) == 1) {//The user input matched the database record
    // Start the session, fetch the record and insert the three values in an array
            session_start();
            $_SESSION = mysqli_fetch_array ($result, MYSQLI_ASSOC);
    $_SESSION['level'] = (int) $_SESSION['level']; // Ensure that the user level is an integer
    $url = ($_SESSION['level'] === 1) ? '../index.php?level=1' : '../index.php'; // Use a ternary operation to set the URL
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
    <h2>Login</h2>
    <form action="admin-login.php" method="post">
        <p><label class="label" for="email">Email Address:</label>
        <input id="email" type="text" name="email" size="30" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"> </p>
        <br>
        <p><label class="label" for="password">Password:</label>
        <input id="password" type="password" name="password" size="12" maxlength="12" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>" ><span>&nbsp;Between 8 and 12 characters.</span></p>
        <p>&nbsp;</p><p><input id="submit" type="submit" name="submit" value="Login"></p>
    </form><br>
</body>
</html>
