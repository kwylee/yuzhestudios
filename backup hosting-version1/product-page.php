<?php
  include ('header.php');
  include ('sidebar.php');
?>
		<div id="main">
			<div class="product-imgs">
				<img src="img/trench-square.jpg" class="product-img" alt="">
				<img src="img/trench-square.jpg" class="product-img" alt="">
				<img src="img/trench-square.jpg" class="product-img" alt="">
				<img src="img/trench-square.jpg" class="product-img" alt="">
			</div>
			<div class="product-info">
				<h1>TRENCH COAT</h1>
				<span class="hidden">Item no. 1234</span>
				<h2>£1,000</h2>
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
			</div>
			<div class="next-product">
				<a id="next" href="product-page-2.php" title="">&#9658;</a>
			</div>
		</div>
		
<?php
	include('footer.php')
?>