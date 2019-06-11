<?php
	require ("Connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books</title>
</head>
	<body>
		<h1>Login or create a new account</h1>
		<hr />
		<form action="Calendar Account.php" method="POST">
			<table>
				<td>
					<tr>
						Username: 
					</tr>
					<tr>
						<input type="text" name="username" />
					</tr>
				</td>
				<td>
					<tr>
						Password: 
					</tr>
					<tr>
						<input type="text" name="password" />
					</tr>
				</td>
			</table>
			<button type="submit">Login</button>
			<button type="button" a href="Calendar Display.php">Create</button>
		</form>
	</body>
</html>