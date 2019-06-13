<?php
	require ("Connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calendar Login</title>
</head>
	<body>
		<h1>Login or create a new account</h1>
		<hr />
		<?php
			if($_GET['error'] == 'badpw')
			{
				echo "<span style='color:red'> The password does not match. </span>";
			}
		?>
		<form action="Middleman.php" method="POST">
			<table>
				<tr>
					<td>
						Username: 
					</td>
					<td>
						<input type="text" name="username" />
					</td>
				</tr>	
				<tr>
					<td>
						Password: 
					</td>
					<td>
						<input type="text" name="password" />
					</td>
				</tr>
				<tr>
					<td>
						Region: 
					</td>
					<td>
						<?php
							foreach($db->query("SELECT regionid, region FROM Regions") as $row)
							{
								echo $row['region'] . "<input type='checkbox' name='region[]' value=" . 
									  $row['regionid'] . " required /> </br>";
							}
						?>
					</td>
				</tr>
			</table>
			<button type="submit">Login</button>
			<button type="button" onclick="window.location.href = 'Calendar Account.php'">Create</button>
		</form>
	</body>
</html>