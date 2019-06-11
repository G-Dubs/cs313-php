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
    <title>Books</title>
</head>
	<body>
		<h1>Search results</h1>
		<hr />
		<table>
			<?php
				$name = $_POST["username"];
				foreach ($db->query("SELECT u.username, r.regionname FROM Users u  
													 LEFT JOIN RegionJoin rj ON u.userid = rj.userid 
													 LEFT JOIN Regions r ON rj.regionid = r.regionid
													 WHERE u.username = '$name'") as $row)
				{
					echo "<tr><td>" . $row['username'] . "</td><td>" . $row['regionname'] . "</td></tr>\n";
				}
			?>
		</table>
		<a href="My Database.php">Back search page</a>
	</body>
</html>