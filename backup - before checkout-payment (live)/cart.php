<?php
include ('header.php');
include ('sidebar.php');
require 'item.php';
if(isset($_GET['id'])){
	$result = mysqli_query($con, 'select * from products where product_id='.$_GET['id']);
	$product = mysqli_fetch_object($result);
	$item = new Item();
	$item->id = $product->product_id;
	$item->name = $product->name;
	$item->price = $product->price;
	$item->quantity = 1;
	//check is product has been added to cart
	$index = -1;
	$cart = unserialize(serialize($_SESSION['cart']));
	for($i=0; $i<count($cart); $i++)
		if($cart[$i]->id==$_GET['id'])
		{
			$index = $i;
			break;
		}
	if($index==-1)
		$_SESSION['cart'][] = $item;
	else{
		$cart[$index]->quantity++;
		$_SESSION['cart'] = $cart;
	}
}

// delete product from cart
if(isset($_GET['index'])){
	$cart = unserialize(serialize($_SESSION['cart']));
	unset($cart[$_GET['index']]);
	$cart = array_values($cart);
	$_SESSION['cart'] = $cart;
}

?>
	<div id="main">
		<h2>Shopping Cart</h2>
		<table cellpadding="2" cellspacing="1" border="1">
			<tr>
				<th>Options</th>
				<th>Product Name</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Sub Total</th>
			</tr>
			<?php
			$cart = unserialize(serialize($_SESSION['cart']));
			$s = 0;
			$index = 0;
			for($i=0; $i<count($cart); $i++) {
				$s += $cart[$i]->price * $cart[$i]->quantity;
			?>
			<tr>
				<td><a href="cart.php?index=<?php echo $index; ?>" onclick="return confirm('Are you sure?')">Delete</a></td>
				<td><?php echo $cart[$i]->name; ?></td>
				<td><?php echo $cart[$i]->price; ?></td>
				<td><?php echo $cart[$i]->quantity; ?></td>
				<td><?php echo $cart[$i]->price * $cart[$i]->quantity; ?></td>
			</tr>
			<?php
				$index++;
			}
			?>
			<tr>
				<td colspan="4" align="right">Total</td>
				<td align="left"><?php echo $s; ?> </td>
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
		<button><a href="shop-test.php">Continue Shopping</a></button>
		
		<form action="https://yoopay.cn/yapi" method="POST">
			<input type="hidden" name="seller_email" value="yuzhestudios@gmail.com">
			<input type="hidden" name="language" value="en">
			<input type="hidden" name="type" value="CHARGE">
			
			<input type="hidden" name="tid" value="4345">
			<input type="hidden" name="item_name" value="yuzhestudios">
			<input type="hidden" name="item_body" value="clothing">
			<input type="hidden" name="item_price" value="<?php echo $s; ?>">
			<input type="hidden" name="item_currency" value="CNY">
			<input type="hidden" name="payment_method" value="1;2;3;4;5;6;7">
			<input type="hidden" name="customer_name" value="Customer Name">
			<input type="hidden" name="customer_email" value="customer@name.com">
			<input type="hidden" name="notify_url" value="HTTP://YUZHESTUDIOS.COM/CART.PHP">
			<input type="hidden" name="sandbox" value="1">
			<input type="hidden" name="sandbox_target_status" value="1">
			<input type="hidden" name="invoice" value="1">
			<input type="hidden" name="sign" value="<?php echo $sign_hash; ?>">
			<input type="submit" value="YooPay" style="width:auto;">
		</form>
	</div>
		
<?php
	include('footer.php')
?>