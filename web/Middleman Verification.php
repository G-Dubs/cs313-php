<?php
	session_start();  // Start a new session

	require ("Connect.php"); // Setup the database connection
	
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Verify the username & password

	foreach($db->query("SELECT * FROM Users WHERE username = '$username'") as $row)
	{
		if(password_verify($password, $row["drowssap"])) // Does the username & password match?
		{
			$_SESSION["userid"] = $row["userid"]; // Everything matched, proceed with login
	
			header("Location: Calendar Display.php"); // Go to the calendar
			die();
		}
		else // Something doesn't match CRITICAL FAILURE!
		{
			header("Location: Calendar Login.php?error=badpw");
			die();
		}
	}
?>