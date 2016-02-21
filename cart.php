<?php
include ('header.php');
include ('sidebar.php');
require 'item.php';
require 'connect.php';
if(isset($_SESSION['order_id']))
{
	$result = mysqli_query($conn, 'select order_product.*, products.* from order_product INNER JOIN products ON order_product.product_no = products.product_no where order_product.order_id='.$_SESSION['order_id']);
	$result_sum = mysqli_query($conn, 'SELECT SUM(subtotal) AS sum FROM order_product where order_id='.$_SESSION['order_id']); 
	$row = mysqli_fetch_assoc($result_sum); 
	$sum = $row['sum'];
	$_SESSION['total'] = $sum;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$order_product_id = $_POST['order_product_id'];

	$delete = mysqli_query($conn, 'DELETE FROM order_product WHERE order_product_id = '.$order_product_id); 

	header('Location: '.$_SERVER['REQUEST_URI']);
	echo '<script>window.location.href = "'. $_SERVER['REQUEST_URI'] .'";</script>';
}

?>
	<div id="main">
		<h2>Shopping Cart</h2>
		<?php 
		/*$cart = implode(unserialize(serialize($_SESSION['cart'])));
		print_r($cart);
		if(isset($cart) || $cart != '' || !empty( $cart )){ */
		?>
		<div class="content-half">
		<?php if (isset($result) && mysqli_num_rows($result) > 0) {
		?>
		<table cellpadding="4">
			<tr>
				<th>Options</th>
				<th>Image</th>
				<th>Product Name</th>
				<th>Size</th>
				<th>Personalise</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Sub Total</th>
			</tr>
			<?php 
			    // output data of each row
			    while($row = mysqli_fetch_assoc($result)) {
			    ?>
			    	<tr>
			    		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
				    		<input type="hidden" name="order_product_id" value="<?php echo $row["order_product_id"]; ?>">
							<td><input type="submit" value="Delete"></td>
						</form>
						<td><img src="<?php echo $row["image"]; ?>" class="cart-image"></td>
						<td><?php echo $row["name"]; ?></td>
						<td><?php echo $row["size"]; ?></td>
						<td><?php if($row["personalise"] < '') {echo 'None';}else{ echo $row["personalise"];} ?></td>
						
						<?php if(isset($_SESSION['currency']) && $_SESSION['currency'] != 'rmb'){
			              if($_SESSION['currency'] == 'gbp'){
			                echo '<td>£';
			              }
			              elseif($_SESSION['currency'] == 'usd'){
			                echo '<td><span style="font-family: Arial;">$</span>';
			              }
			              elseif($_SESSION['currency'] == 'eur'){
			                echo '<td>€';
			              }
			              echo convertCurrency($row["price"], "CNY", $_SESSION['currency']). '</td>';
			            }else{ 
			              echo '<td>¥'. $row["price"]. '</td>';
			            }
			            ?>
						<td><?php echo $row["quantity"]; ?></td>
						<?php if(isset($_SESSION['currency']) && $_SESSION['currency'] != 'rmb'){
			              if($_SESSION['currency'] == 'gbp'){
			                echo '<td>£';
			              }
			              elseif($_SESSION['currency'] == 'usd'){
			                echo '<td><span style="font-family: Arial;">$</span>';
			              }
			              elseif($_SESSION['currency'] == 'eur'){
			                echo '<td>€';
			              }
			              echo convertCurrency($row["subtotal"], "CNY", $_SESSION['currency']). '</td>';
			            }else{ 
			              echo '<td>¥'. $row["subtotal"]. '</td>';
			            }
			            ?>
					</tr>
			    <?php
			    }
			
			?>
			
			<tr>
				<td colspan="7" class="tar" align="right">Total</td>
				<td align="left">
					<?php if(isset($_SESSION['currency']) && $_SESSION['currency'] != 'rmb'){
		              if($_SESSION['currency'] == 'gbp'){
		                echo '£';
		              }
		              elseif($_SESSION['currency'] == 'usd'){
		                echo '<span style="font-family: Arial;">$</span>';
		              }
		              elseif($_SESSION['currency'] == 'eur'){
		                echo '€';
		              }
		              echo convertCurrency($sum, "CNY", $_SESSION['currency']);
		            }else{ 
		              echo '¥'. $sum;
		            }
		            ?>
				</td>
			</tr>
			<!-- <tr>
				<td colspan="4" align="right"></td>
				<td align="left">
					<form name="_xclick" action="https://www.paypal.com/cgi-bin/webscr" method="post">
					    <input type="hidden" name="cmd" value="_xclick">
					    <input type="hidden" name="business" value="flower_rosey_karen@hotmail.com">
					    <input type="hidden" name="currency_code" value="GBP">
					    <input type="hidden" name="item_name" value="yuzhe studios">
					    <input type="hidden" name="amount" value="<?php echo $s; ?>">
					    <input class="paypal" type="image" src="http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
					</form>
				</td>
			</tr> -->
		</table>
		<br>
		<button class="left"><a href="shop-test.php" >Continue Shopping</a></button>
		<button class="right"><a href="checkout.php" class="right">Checkout</a></button>
		<?php } else{?>
		<p>You have no products in your cart</p>
		<button class="left"><a href="shop-test.php" >Go to shop</a></button>
		<?php }?>
		</div>
		
		
</div>
<?php	
	include('footer.php')
?>