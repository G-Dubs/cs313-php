<?php
	session_start();  // Start a new session

	require ("Connect.php"); // Setup the database connection

	$username = $_POST['username'];
	$password = $_POST['password'];
	$hashword = password_hash($password, PASSWORD_DEFAULT);

	// Does this username already exist?

	$stmt = $db->prepare("SELECT * FROM Users WHERE Username ILIKE '" . $username . "'");
	$stmt->execute();

	if ($stmt->rowCount() > 0)
	{
		header("Location: Calendar Login.php?error=nameinuse"); // Go back to this page because you picked
		die();                                                  // the same username as someone else 
	}

	// Register a new user

	$stmt = $db->prepare("INSERT INTO Users (Username, Drowssap) VALUES (:username, :hashword)");
	$stmt-> bindValue(':username', $username, PDO::PARAM_STR);
	$stmt-> bindValue(':hashword', $hashword, PDO::PARAM_STR);
	$stmt-> execute();

	$_SESSION["userId"] = $db->lastInsertId(); // Gets the last user id that was used, so it will remember you

	header("Location: Calendar Login.php"); // Go back to the login page
	die();
?>