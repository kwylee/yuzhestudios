<?php
  include ('header.php');
  include ('sidebar.php');
  require '../connect.php';
  mysqli_query($conn, "SET NAMES 'utf8'");
  mysqli_query($conn, "SET CHARACTER SET 'utf8'");

  $result = mysqli_query($conn, 'select * from products where product_id='.$_GET['id']);
  $product = mysqli_fetch_object($result);

  if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
  	$product_no = $_POST['product_no'];
  	$size = $_POST['size'];
  	$personalise = $_POST['p1'] . ' ' . $_POST['p2'] .' '. $_POST['p3'];
  	$quantity = $_POST['quantity'];
  	$subtotal = $_POST['price'] * $_POST['quantity'];

  	if(!isset($_SESSION['order_id'])){
  		$query = mysqli_query($conn, 'SELECT MAX(order_id) AS max FROM order_product;');
		if($query)
		{
			$row = mysqli_fetch_assoc($query); 
			$_SESSION['order_id'] = $row['max'] + 1;
		}
		else{
			$_SESSION['order_id'] = 1;
		}
  	}  	

  	$id = $_SESSION['order_id'];

	$sql = "INSERT INTO order_product (order_id, product_no, size, personalise, quantity, subtotal)
	VALUES ('$id', '$product_no', '$size', '$personalise', '$quantity', '$subtotal')";

	if ($conn->query($sql) === TRUE) {
		$_SESSION['message'] = '商品加入<a href="cart.php">购物车</a>';
	    echo '<script>window.location.href = "product.php?id='. $_POST['id'] .'";</script>';
	    //exiting allows unsetting session message
	    exit;
	    	
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

  }
?>
		<div id="main">

			<div class="product-imgs">
				<img src="<?php echo '../'.$product->image.'.jpg'; ?>" class="product-img"  alt="<?php echo $product->name; ?>">
				<img src="<?php echo '../'.$product->image.'-2.jpg'; ?>" class="product-img" alt="<?php echo $product->name; ?>">
				<img src="<?php echo '../'.$product->image.'-3.jpg'; ?>" class="product-img" alt="<?php echo $product->name; ?>">
				<img src="<?php echo '../'.$product->image.'-4.jpg'; ?>" class="product-img" alt="<?php echo $product->name; ?>">
			</div>
			<div class="product-info">
			<?php 		
			if(isset($_SESSION['message'])){
				echo '<p class="message">'.$_SESSION['message'].'</p>';
				unset($_SESSION['message']);					
			}
			?>
				<h1><?php echo $product->name_simp; ?></h1>
				<p class="prod-no"><?php echo $product->product_no; ?></p>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
				<input type="hidden" name="id" value="<?php echo $product->product_id; ?>">
				<input type="hidden" name="product_no" value="<?php echo $product->product_no; ?>">
				<input type="hidden" name="price" value="<?php echo $product->price; ?>">
				<?php if(isset($_SESSION['currency']) && $_SESSION['currency'] != 'rmb'){
	              if($_SESSION['currency'] == 'gbp'){
	                echo '<p>£';
	              }
	              elseif($_SESSION['currency'] == 'usd'){
	                echo '<p style="font-family: Arial;">$';
	              }
	              elseif($_SESSION['currency'] == 'eur'){
	                echo '<p>€';
	              }
	              echo convertCurrency($product->price, "CNY", $_SESSION['currency']). '</p>';
	            }else{ 
	              echo '<p>¥'. $product->price. '</p>';
	            }
	            ?>
				<p>尺码:
					<select name="size">
					  <option value="XS">XS</option>
					  <option value="S">S</option>
					  <option value="M">M</option>
					  <option value="L">L</option>
					</select>
					</p>
					<p><a id="size-guide" href="#" title="">尺寸对照表</a></p>
					</p>
					<p>个性化定制 <a id="personalise" href="#" title="">(i)</a>
					
					<input name="personalise" type="checkbox" class="personalise"/>
					</p>
					<div class="show">
						<input type="text" pattern="[A-Za-z]+" title="Letters only" name="p1" maxlength="1">
						<input type="text" pattern="[A-Za-z]+" title="Letters only" name="p2" maxlength="1">
						<input type="text" pattern="[A-Za-z]+" title="Letters only" name="p3" maxlength="1">
					</div>
					<p><label for="quantity">数量: </label><input type="number" id="quantity" name="quantity" value="1" min="1" max="3"></p>
					
					<div id='jqxexpander'>
				        <div>详细说明</div>
				        <!--Content-->
				        <div><?php echo $product->description_simp; ?></div>
				    </div>
				    <br>
				    <input type="submit" value="添加到购物车">
			    </form>
			</div>
		</div>
		
<?php
	include('footer.php')
?>