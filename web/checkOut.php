<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Shopping Cart</title>
		<link rel="stylesheet" type="text/css" href="mystyle.css">
	</head>
	<body>
		<div>
			To edit your purchases, click Return to Cart.
		</div>
		<p>
			<div>
				These are the items you will purchase:
			</div>
			<div class="inline">
				<?php
					foreach($_POST["item"] as $i=> $items)
					{
						echo "<table>
									<tr>";
						
						if (i == count($_POST["item"]) -1)
						{
							echo "<td>
										$items.
									</td>";
						}
						else
						{
							echo "<td>
										$items, 
									</td>";	
						}

						echo "</tr>
							</table>";
					}
				?>
			</div>
			<div>
				This is your shipping address:
			</div>
			<div>
				This is the total cost of your purchase: &nbsp; $
				<?php
					echo $_POST["total"];
				?>
			</div>
		</p>	
		<div>
			<button type="reset"> Reset </button>
			<img src="Indigo Background.jpg" alt="Banner" width="1130" height="1">
			<button type="button"><a href="shoppingCart.php">Return to Cart</a></button>
		</div>
	</body>
</html>

<?php

?>