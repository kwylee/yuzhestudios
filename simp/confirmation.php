<?php
	include ('header.php');
	include ('sidebar.php');
	include ('../connect.php');

	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$country = $_POST['country'];
		$add1 = $_POST['add1'];
		$add2 = $_POST['add2'];
		$city = $_POST['city'];
		$prov_count = $_POST['prov_count'];
		$code = $_POST['code'];
		$tel = $_POST['tel'];

		$check = mysqli_query($conn, "SELECT customer_no, email FROM customer WHERE email ='".$_POST['email']."'");
		if(mysqli_num_rows($check))
		{		
			$customer_exist = mysqli_fetch_object($check);
			$_SESSION['customer_no'] = $customer_exist->customer_no;	
    		$sql = "UPDATE customer SET  name = '$name', country = '$country', address_line1 = '$add1', address_line2 = '$add2', city = '$city', prov_count = '$prov_count', code = '$code', tel = '$tel' 
			WHERE email = '$email' ";
		}
		else{
			$sql = "INSERT INTO customer (name, email, country, address_line1, address_line2, city, prov_count, code, tel)
			VALUES ('$name', '$email', '$country', '$add1', '$add2', '$city', '$prov_count', '$code', '$tel')";
			echo "New customer";
		}		

		if ($conn->query($sql) === TRUE) {
		    
		    if(!isset($_SESSION['customer_no']))
		    {
		    	$_SESSION['customer_no'] = mysqli_insert_id($conn);
		    		    	
		    }
		    
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$order_id = $_SESSION['order_id'];
		$customer_no = $_SESSION['customer_no'];
		$total = $_SESSION['total'];

		$query_order = "INSERT INTO orders (order_id, customer_no, total)
		VALUES ('$order_id', '$customer_no', '$total')";

		if ($conn->query($query_order) === TRUE) {
		    echo "New order created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

	}
	$result = mysqli_query($conn, 'select order_product.*, products.* from order_product INNER JOIN products ON order_product.product_no = products.product_no where order_product.order_id='.$_SESSION['order_id']);

	if(isset($_SESSION['customer_no'])){
		$query_customer = mysqli_query($conn, "SELECT * FROM customer WHERE customer_no ='".$_SESSION['customer_no']."'");
		//if customer is not found yet - database not updated new customer yet
		if(mysqli_num_rows($query_customer) < 1){
			//reload page till new cutomer is added to database
			echo '<script>window.location.reload();</script>';	
		}
		$customer = mysqli_fetch_object($query_customer);
	}	
?>
<div id="main">
	<div class="content-half">
		<h2>Confirmation</h2>
		<?php if (isset($result) && mysqli_num_rows($result) > 0) {
		?>
		<table cellpadding="4">
			<tr>
				<th>Image</th>
				<th>Product info</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Sub Total</th>
			</tr>
			<?php 
			    // output data of each row
			    while($row = mysqli_fetch_assoc($result)) {
			    ?>
			    	<tr>
						<td><img src="<?php echo '../'.$row["image"]; ?>" class="cart-image"></td>
						<td><?php echo $row["name"]; ?></br>
						<?php echo 'Size: '.$row["size"]; ?></br>
						<?php echo strtoupper($row["personalise"]);?></td>
						
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
				<td colspan="4" class="tar" align="right">Shipping</td>
				<td align="left">
					<?php 
					$shipping = 100;
					if(isset($customer->country) && ($customer->country == 'china' || $customer->country == 'hong kong' || $customer->country == 'taiwan' || $customer->country == 'macau')){
						echo 'Free';
					}
					elseif(!isset($_SESSION['currency']) || $_SESSION['currency'] == 'rmb'){
						echo '¥'.$shipping;
					}
					else{
						if($_SESSION['currency'] == 'gbp'){
			                echo '£';
			            }
			              elseif($_SESSION['currency'] == 'usd'){
			                echo '<span style="font-family: Arial;">$</span>';
			            }
			              elseif($_SESSION['currency'] == 'eur'){
			                echo '€';
			            }
					 	echo convertCurrency($shipping, "CNY", $_SESSION['currency']);
					}
		            ?>
				</td>
			</tr>
			<tr>
				<td colspan="4" class="tar" align="right">Total</td>
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
		              echo convertCurrency($_SESSION['total'], "CNY", $_SESSION['currency']).' ≡ ¥'. $_SESSION['total'];
		            }else{ 
		              echo '¥'. $_SESSION['total'];
		            }
		            ?>
				</td>
			</tr>
		</table>
		<div>			
			<h3>Customer info</h3>
			<p><?php echo ucwords($customer->name); ?></br>
			<?php echo $customer->email; ?></br>
			<?php echo ucwords($customer->address_line1); ?></br>
			<?php if($customer->address_line2 > ''){echo ucwords($customer->address_line2) . '</br>';} ?>
			<?php echo ucwords($customer->city); ?></br>
			<?php echo ucwords($customer->prov_count); ?></br>
			<?php echo ucwords($customer->country); ?></br>
			<?php echo strtoupper($customer->code); ?></br>
			<?php echo $customer->tel; ?></p>
		</div>
		<?php
		$sign = strtoupper('d747829c984982e81fcd3bb515831cd7yuzhestudios@gmail.com'. $_SESSION['order_id'] . $_SESSION['total'] .'CNYhttp://yuzhestudios.com/cart.php11');
		$sign_hash = md5($sign);
		?>
		<form action="https://yoopay.cn/yapi" method="POST">
			<input type="hidden" name="seller_email" value="yuzhestudios@gmail.com">
			<input type="hidden" name="language" value="zh">
			<input type="hidden" name="type" value="CHARGE">
			
			<input type="hidden" name="tid" value="<?php echo $_SESSION['order_id']; ?>">
			<input type="hidden" name="item_name" value="yuzhestudios">
			<input type="hidden" name="item_body" value="clothing">
			<input type="hidden" name="item_price" value="<?php echo $_SESSION['total']; ?>">
			<input type="hidden" name="item_currency" value="CNY">
			<input type="hidden" name="payment_method" value="1;2;5;6;7">
			<input type="hidden" name="customer_name" value="<?php echo $customer->name; ?>">
			<input type="hidden" name="customer_email" value="<?php echo $customer->email; ?>">
			<input type="hidden" name="notify_url" value="HTTP://YUZHESTUDIOS.COM/CART.PHP">
			<input type="hidden" name="return_url" value="https://yuzhestudios.com/simp/success.php">
			<input type="hidden" name="sandbox" value="1">
			<input type="hidden" name="sandbox_target_status" value="1">
			<input type="hidden" name="invoice" value="1">
			<input type="hidden" name="sign" value="<?php echo $sign_hash; ?>">
			<input type="submit" value="Pay" style="width:auto;"></br>
			<span class="font-3">You will be directed to our secure payment partner, Yoopay, to complete payment</span>
		</form>
		<?php }else{ 
			echo '<script>window.location.href = "shop.php";</script>';
		} ?>
	</div>
</div>
<?php	
	include('footer.php')
?>