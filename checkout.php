<?php
	include ('header.php');
	include ('sidebar.php');
	include ('connect.php');
?>
<div id="main">
	<div class="content-center">
		<?php if(isset($_SESSION['order_id'])){
		?>
		<h2>Customer Infomation<br>and<br>Shipping address</h2>
		<form action="confirmation.php" method="POST" class="form" required>
			<label for="name">Full Name: *</label><input type="text" id="name" name="name" value="" required><br>
			<label for="email">Email: *</label><input type="email" id="email" name="email" value="" required><br>
			<label for="country" required>Country: *</label>
			<select id="country" name="country" id="country">
				<option value="china">China</option>
				<option value="uk">UK</option>
				<option value="usa">USA</option>
			</select><br>
			<label for="add1">Address (line 1): *</label><input type="text" id="add1" name="add1" value="" required><br>
			<label for="add2">Address (line 2): </label><input type="text" id="add2" name="add2" value=""><br>
			<label for="city">City: *</label><input type="text" id="city" name="city" value="" required><br>
			<label for="prov_count">Province/county: *</label><input type="text" id="prov_count" name="prov_count" value="" required><br>
			<label for="code">Postcode/zip: *</label><input type="text" id="code" name="code" value="" required><br>
			<label for="tel">Telephone: *</label><input type="number" id="tel" name="tel" value="" required><br>
			<p>* required information</p>

			<input type="submit" value="Next">
		</form>
		<?php 
		}else{
			echo '<script>window.location.href = "shop.php";</script>';
		}
		?>
	</div>
</div>
<?php	
	include('footer.php')
?>