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
				<?php
					foreach($_POST["item"] as $items)
					{
						echo $items;
					}
				?>
			</div>
			<div>
				This is your shipping address:
			</div>
			<div>
				This is the total cost of your purchase:
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