<!DOCTYPE html>
<html>
<head>


	<?php
		function retrieveItems(){
			$connection = new mysqli("localhost", "root", "hemal", "Shopping");
			if($connection -> connect_error){
				echo "Connection Error " . $connection -> connect_error;
				return ;
			}

			$sql_string = "SELECT * FROM shopping_cart";
			$result = $connection -> query($sql_string);
			return $result -> num_rows;

		}
	 ?>

	<title>Shopping Cart</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<style type="text/css">
		.row{
			margin-top: 30px;
		}
	</style>
</head>
<body>

	<div class="container">

		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<center>
					<h1>Welcome to my Shopping Website!</h1>
				</center>
			</div>
		</div>

		<div class="row">
				<div class="col-sm-12 text-center">
						<h3>Items in My Cart : <?php echo retrieveItems(); ?></h3>
				</div>

		</div>

		<div class="row">
			<div class="col-sm-12 col-lg-4 col-md-4">
				<center>
					<h3>Item 1</h3>
					<h4>Rs. 100</h4>
					<form action="addItem.php" method="post">
						<input type="hidden" name="item_name" value="Item 1" />
						<input type="hidden" name="item_price" value="100" />
						<input type="submit" value="Add to cart!" class="btn btn-primary btn-lg"/>
					</form>
				</center>
			</div>
			<div class="col-sm-12 col-lg-4 col-md-4">
				<center>
					<h3>Item 2</h3>
					<h4>Rs. 200</h4>
					<form action="addItem.php" method="post">
						<input type="hidden" name="item_name" value="Item 2" />
						<input type="hidden" name="item_price" value="200" />
						<input type="submit" value="Add to cart!" class="btn btn-primary btn-lg"/>
					</form>
				</center>
			</div>
			<div class="col-sm-12 col-lg-4 col-md-4">
				<center>
					<h3>Item 3</h3>
					<h4>Rs. 300</h4>
					<form action="addItem.php" method="post">
						<input type="hidden" name="item_name" value="Item 3" />
						<input type="hidden" name="item_price" value="300" />
						<input type="submit" value="Add to cart!" class="btn btn-primary btn-lg"/>
					</form>
				</center>
			</div>
		</div>


		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<center>
					<form action="showCart.php" method="post">
						<input class="btn btn-info btn-lg" type="submit" value="Go to My Cart!" />
					</form>
				</center>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<center>
					<form action="removeAll.php" method="post">
						<input class="btn btn-warning btn-lg" type="submit" value="Remove all items from Cart!" />
					</form>
				</center>
			</div>
		</div>

	</div>
</body>
</html>
