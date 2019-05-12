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
				<span class="first">
					These are the items you will purchase:
				</span>
				<span class="second">
					<?php
						foreach($_POST["item"] as $i => $items)
						{							
							if ($i == (count($_POST["item"]) -1))
							{
								echo "$items.";
							}
							else
							{
								echo "$items, ";	
							}
						}
					?>
				</span>
				<div>
					This is your shipping address:
					<?php
						foreach($_POST["address"] as $a => $address)
						{				
							if ($a == 1)
							{
								echo "$address, ";
							}
							else
							{
								echo "$address ";
							}
						}
					?>
				</div>
				<div>
					This is the total cost of your purchase:
					<?php
						echo $_POST["total"];
					?>
				</div
			</div>
		</p>	
		<div>
			<button type="button"><a href="shoppingCart.php">Return to Cart</a></button>
			<img src="Indigo Background.jpg" alt="Banner" width="1130" height="1">
			<button type="button"><a href="done.php"> Checkout </button>			
		</div>
	</body>
</html>