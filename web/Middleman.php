<?php
	session_start();  // Start a new session

	require ("Connect.php"); // Setup the database connection

	$username = $_POST['username'];
	$password = $_POST['password'];
	$region = $_POST['region'];
	$hashword = password_hash($password, PASSWORD_DEFAULT);

	// Does this username already exist?

	$stmt = $db->prepare("SELECT * FROM Users WHERE Username ILIKE '" . $username . "'");
	$stmt->execute();

	if ($stmt->rowCount() > 0)
	{
		header("Location: Calendar Account.php?error=nameinuse"); // Go back to this page because you picked
		die();                                                    // the same username as someone else 
	}

	// Register a new user

	$stmt = $db->prepare("INSERT INTO Users (Username, Drowssap) VALUES (:username, :hashword)");
	$stmt-> bindValue(':username', $username, PDO::PARAM_STR);
	$stmt-> bindValue(':hashword', $hashword, PDO::PARAM_STR);
	$stmt-> execute();

	$userId = $db->lastInsertId(); // Gets the last user id to insert into my database

	foreach($region as $homeRegion)
	{
		$stmt = $db->prepare("INSERT INTO RegionJoin (userid, regionid) VALUES ($userId, $homeRegion)");
		$stmt-> execute();
	}

	$_SESSION["userId"] = $userId; // Gets the user id that was used, so it will remember you

	header("Location: Calendar Login.php"); // Go to the login page
	die();
?>