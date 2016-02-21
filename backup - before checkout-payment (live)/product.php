<?php
  include ('header.php');
  include ('sidebar.php');
  require 'connect.php';
  $result = mysqli_query($con, 'select * from products where product_id='.$_GET['id']);
  $product = mysqli_fetch_object($result);
?>
		<div id="main">

			<div class="product-imgs">
				<img src="<?php echo $product->image; ?>" class="product-img"  alt="<?php echo $product->name; ?>">
				<img src="<?php echo $product->image; ?>" class="product-img" alt="<?php echo $product->name; ?>">
				<img src="<?php echo $product->image; ?>" class="product-img" alt="<?php echo $product->name; ?>">
				<img src="<?php echo $product->image; ?>" class="product-img" alt="<?php echo $product->name; ?>">
			</div>
			<div class="product-info">
				<h1><?php echo $product->name; ?></h1>
				<span class="hidden">Item no. <?php echo $product->product_no; ?></span>
				<h2>£<?php echo $product->price; ?></h2>
				<p>Colour:</p>
				<p>Size:
				
				<select>
				  <option value="36">36</option>
				  <option value="38">38</option>
				  <option value="40">40</option>
				  <option value="42">42</option>
				</select>
				<p><a id="size-guide" href="#" title="">Size guide</a></p>
				</p>
				<p>Personalisation <a id="personalise" href="#" title="">(i)</a>
				
				<input name="personalise" type="checkbox" class="personalise"/>
				</p>
				<div class="show">
					<input type="text" name="p1" maxlength="1">
					<input type="text" name="p2" maxlength="1">
					<input type="text" name="p3" maxlength="1">
				</div>
				<p>Checkout</p>
				<div id='jqxexpander'>
			        <div>Details</div>
			        <!--Content-->
			        <div>blah blahblah blahblah blahblah blahblah blahblah blahblah blahblah blahblah blahblah blah</div>
			    </div>
			    <br>
			    <button><a href="cart.php?id=<?php echo $product->product_id; ?>">Add to cart</a></button>
			</div>
			<div class="next-product">
				<a id="next" href="product-page-2.php" title="">&#9658;</a>
			</div>
		</div>
		
<?php
	include('footer.php')
?>