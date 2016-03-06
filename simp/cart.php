<?php
include ('header.php');
include ('sidebar.php');
require '../connect.php';
mysqli_query($conn, "SET NAMES 'utf8'");
mysqli_query($conn, "SET CHARACTER SET 'utf8'");

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
	<h2>购物车</h2>
	<?php 
	/*$cart = implode(unserialize(serialize($_SESSION['cart'])));
	print_r($cart);
	if(isset($cart) || $cart != '' || !empty( $cart )){ */
	?>
	<div class="content-half">
		<?php if (isset($result) && mysqli_num_rows($result) > 0) {
		?>
		
		<div class="row shopping-cart">
			<div class="col-12">
				<div class="col-1 cart-options">options</div>
				<div class="col-2">照片</div>
				<div class="col-3">内容</div>
				<div class="col-2">价格</div>
				<div class="col-2">数量</div>
				<div class="col-2">小计</div>
			</div>
			<?php 
			    // output data of each row
			    while($row = mysqli_fetch_assoc($result)) {
			    ?>
			    	<div class="col-12">
			    		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
				    		<input type="hidden" name="order_product_id" value="<?php echo $row["order_product_id"]; ?>">
							<div class="col-1">
								<button type="submit" class="delete-button"><i class="fa fa-trash"></i></button>
							</div>
						</form>
						<div class="col-2"><img src="<?php echo '../'.$row["image"].'.jpg'; ?>" class="cart-image"></div>
						<div class="col-3 info">
							<?php echo '<a href="product.php?id='.$row["product_id"].'">'.$row["name_simp"].'</a>'; ?></br>			
							<?php echo '尺码: '.$row["size"]; ?></br>
							<?php echo strtoupper($row["personalise"]);?>
						</div>
						
						<?php if(isset($_SESSION['currency']) && $_SESSION['currency'] != 'rmb'){
			              if($_SESSION['currency'] == 'gbp'){
			                echo '<div class="col-2">£';
			              }
			              elseif($_SESSION['currency'] == 'usd'){
			                echo '<div class="col-2"><span style="font-family: Arial;">$</span>';
			              }
			              elseif($_SESSION['currency'] == 'eur'){
			                echo '<div class="col-2">€';
			              }
			              echo convertCurrency($row["price"], "CNY", $_SESSION['currency']). '</div>';
			            }else{ 
			              echo '<div class="col-2">¥'. $row["price"]. '</div>';
			            }
			            ?>
						<div class="col-2"><?php echo $row["quantity"]; ?></div>
						<?php if(isset($_SESSION['currency']) && $_SESSION['currency'] != 'rmb'){
			              if($_SESSION['currency'] == 'gbp'){
			                echo '<div class="col-2">£';
			              }
			              elseif($_SESSION['currency'] == 'usd'){
			                echo '<div class="col-2"><span style="font-family: Arial;">$</span>';
			              }
			              elseif($_SESSION['currency'] == 'eur'){
			                echo '<div class="col-2">€';
			              }
			              echo convertCurrency($row["subtotal"], "CNY", $_SESSION['currency']). '</div>';
			            }else{ 
			              echo '<div class="col-2">¥'. $row["subtotal"]. '</div>';
			            }
			            ?>
					</div>
			    <?php
			    }
			
			?>
			<div class="col-12">
				<div class="col-10" class="tar" align="right">商品总价</div>
				<div class="col-2">
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
				</div>
			</div>
			<div class="col-12 pb">
				<button class="left"><a href="shop-test.php" >继续购物</a></button>
				<button class="right"><a href="checkout.php" class="right">结算</a></button>
			</div>
		</div>
		<?php } else{?>
		<p>您的购物车没有物品</p>
		<button class="left"><a href="shop-test.php" >购物</a></button>
		<?php }?>
	</div>		
</div>
<?php	
	include('footer.php')
?>