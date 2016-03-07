<?php
	include ('header.php');
	include ('sidebar.php');
	include ('../connect.php');
	mysqli_query($conn, "SET NAMES 'utf8'");
	mysqli_query($conn, "SET CHARACTER SET 'utf8'");

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
		if(!isset($customer->country) || empty($customer->country)){
			echo '<script>window.location.reload();</script>';
		}
		elseif($customer->country == 'china' || $customer->country == 'hong kong' || $customer->country == 'taiwan' || $customer->country == 'macau'){
			$total = $_SESSION['total'];
		}else{
			$total = $_SESSION['total'] + 100;
			$update_order = "UPDATE orders SET  total = '$total' 
			WHERE order_id = '$order_id' 
			AND status = 0 
			ORDER BY order_count DESC
			LIMIT 1";

			if ($conn->query($update_order) === TRUE) {
			    echo "Order total updated";
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
	}	
	
?>
<div id="main">
	<div class="content-half">
		<h2>确认订单信息</h2>
		<?php if (isset($result) && mysqli_num_rows($result) > 0) {
		?>
		<div class="row shopping-cart">
			<div class="col-12">
				<div class="col-3">照片</div>
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
			    		<form></form>
						<div class="col-3"><img src="<?php echo '../'.$row["image"].'.jpg'; ?>" class="cart-image"></div>
						<div class="col-3 info">
							<?php echo $row["name_simp"]; ?></br>
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
				<div class="col-10" class="tar" align="right">发货</div>
				<div class="col-2">
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
				</div>
			</div>
			<div class="col-12">
				<div class="col-10" class="tar" align="right">总价</div>
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
		              echo convertCurrency($total, "CNY", $_SESSION['currency']).' ≡ ¥'. $total;
		            }else{ 
		              echo '¥'. $total;
		            }
		            ?>
				</div>
			</div>
		</div>
		<div>			
			<h3>顾客信息</h3>
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
		//sign = app_key, seller_email, tid, item_price, item_currency, notify_url, sandbox, invoice
		$sign = strtoupper('d747829c984982e81fcd3bb515831cd7yuzhestudios@gmail.com'. $_SESSION['order_id'] . $total .'CNYhttp://yuzhestudios.com/cart.php01');
		$sign_hash = md5($sign);
		?>
		<form action="https://yoopay.cn/yapi" method="POST">
			<input type="hidden" name="seller_email" value="yuzhestudios@gmail.com">
			<input type="hidden" name="language" value="zh">
			<input type="hidden" name="type" value="CHARGE">
			
			<input type="hidden" name="tid" value="<?php echo $_SESSION['order_id']; ?>">
			<input type="hidden" name="item_name" value="yuzhestudios">
			<input type="hidden" name="item_body" value="clothing">
			<input type="hidden" name="item_price" value="<?php echo $total; ?>">
			<input type="hidden" name="item_currency" value="CNY">
			<input type="hidden" name="payment_method" value="1;2;5;6;7">
			<input type="hidden" name="customer_name" value="<?php echo $customer->name; ?>">
			<input type="hidden" name="customer_email" value="<?php echo $customer->email; ?>">
			<input type="hidden" name="notify_url" value="HTTP://YUZHESTUDIOS.COM/CART.PHP">
			<input type="hidden" name="return_url" value="https://yuzhestudios.com/simp/success.php">
			<input type="hidden" name="sandbox" value="0">
			<input type="hidden" name="sandbox_target_status" value="1">
			<input type="hidden" name="invoice" value="1">
			<input type="hidden" name="sign" value="<?php echo $sign_hash; ?>">
			<input type="submit" value="付款" style="width:auto;"></br>
			<span class="font-3">您将会跳转至我们的合作付款平台“友付”继续完成支付</span>
		</form>
		<?php }else{ 
			echo '<script>window.location.href = "shop.php";</script>';
		} ?>
	</div>
</div>
<?php	
	include('footer.php')
?>