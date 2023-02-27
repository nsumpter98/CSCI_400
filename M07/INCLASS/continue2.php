<?php // continue.php = version 2
  session_start();

  if (isset($_SESSION['forename']))
  {
    $forename = $_SESSION['forename'];
    $surname  = $_SESSION['surname'];

	//Call the function only when you are ready to end the sessions
    //destroy_session_and_data();
	
    echo htmlspecialchars("Welcome back $forename");
		echo "<br>";
    echo htmlspecialchars("Your full name is $forename $surname.");
  }
  else echo "Please <a href='authenticate2.php'>click here</a> to log in.";

//This function can be called when you need to destroy a session (usually when the user clicks a log out button)
  function destroy_session_and_data()
  {
    $_SESSION = array();
    setcookie(session_name(), '', time() - 2592000, '/');
    session_destroy();
  }
?>
