<?php
try
{
    $dbUrl = getenv('DATABASE_URL');

    $dbOpts = parse_url($dbUrl);

    $dbHost = $dbOpts["host"];
    $dbPort = $dbOpts["port"];
    $dbUser = $dbOpts["user"];
    $dbPassword = $dbOpts["pass"];
    $dbName = ltrim($dbOpts["path"],'/');

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
    echo 'Error!: ' . $ex->getMessage();
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Calendar Database</title>
	</head>
	<body>
		<h1> Users </h1>
		<form action="Display Users.php" method="POST">
			Username: <input type="text" name="username" />
			Book: <input type="text" name="book" />
			</br>
			<button type="submit">Search!</button>
			<?php
				foreach ($db->query('SELECT * FROM Users') as $row) 
				{
					echo "<a href='User Details.php?id=" . $row['username'] . "'>";
					echo $row['username'] . "</a><br />\n";
				}
			?>
		</form>
	</body>
</html>
	 