<?php
// This is the login page for the site.
require_once ('config.php'); 
$page_title = 'Login Page';
include ('header.html');

if (isset($_POST['submit'])) {
	require_once (MYSQLI_CONNECT);
	
	// Validate the email address:
	if (!empty($_POST['email'])) {
		$email = mysqli_real_escape_string ($dbConnection, $_POST['email']);
	} else {
		$email = FALSE;
		echo '<p class="error">You forgot to enter your email address!</p>';
	}
	
	// Validate the password:
	if (!empty($_POST['pass'])) {
		$password = mysqli_real_escape_string ($dbConnection, $_POST['pass']);
	} else {
		$password = FALSE;
		echo '<p class="error">You forgot to enter your password!</p>';
	}
	
	if ($email && $password) { // If everything's OK.
		// Query the database: 
		$query = "SELECT user_id, first_name, email, pass FROM users_table WHERE email='$email'";		
		
		if ( !( $result = $dbConnection->query($query))) {
			trigger_error("Query: $query\n<br />MySQL Error: " . $dbConnection->error);
		} 
			
		if ($result->num_rows == 1) { // A match was found
		
		  $row = $result->fetch_array(MYSQLI_NUM);
		  if (password_verify($password, $row[3])) { 
			// Register the values & redirect:
			session_start();
			$_SESSION['user_id'] = $row[0];
			$_SESSION['name'] = $row[1];
			echo htmlspecialchars("Hi $row[1], you are now logged in as '$row[2]'");

		  }	else { // No match was made.
				echo '<p class="error">Either the email address and password entered do not match those on file or you have no account yet.</p>';
		  }
	    }
		
	   } else { // If everything is not OK.
		echo '<p class="error">Please try again.</p>';
	}
	
	$dbConnection->close();

} // End of SUBMIT conditional.
?>

<h1>Login</h1>
<p>Your browser must allow cookies in order to log in.</p>
<form action="login.php" method="post">
	<fieldset>
	<div class="myRow">
		<label class="labelCol" for="email">Email</label> 
		<input type="text" name="email" size="20" maxlength="40" />
	</div>
	<div class="myRow">
		<label class="labelCol" for="[assw">Password</label>
		<input type="password" name="pass" size="20" maxlength="20" />
    </div>
	<div class="mySubmit">
		<input type="submit" name="submit" value="Login" /></div>
	</div>
	</fieldset>
</form>

<?php // Include the HTML footer.
include ('footer.html');
?>
