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
					<td colspan="2">
						<input type="text" name="username" size="15" />
					</td>
				</tr>	
				<tr>
					<td>
						Password: 
					</td>
					<td colspan="2">
						<input type="text" name="password" size="15" />
					</td>
				</tr>
				<tr>
					<td style="vertical-align:text-top">
						Region: 
					</td>
					<td style="vertical-align:text-top; text-align:left">
						<?php
							foreach($db->query("SELECT regionid, regionname FROM Regions") as $row)
							{
								echo $row['regionname'] . "</td> <td> <input type='checkbox' name='region[]' value=" .
									  $row['regionid'] . " required /> </td> </tr> <tr> <td style='text-align:right'>
									  </td> <td style='vertical-align:text-top; text-align:left'>";
							}
						?>
					</td>
				</tr>
			</table>
			<button type="submit">Create</button>
		</form>
	</body>
</html>