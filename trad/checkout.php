<?php
	include ('header.php');
	include ('sidebar.php');
?>
<div id="main">
	<div class="content-center">
		<?php if(isset($_SESSION['order_id'])){
		?>
		<h2>訂單信息</h2>
		<form action="confirmation.php" method="POST" class="form" required>
			<label for="name">名字: *</label><input type="text" id="name" name="name" value="" required><br>
			<label for="email">電郵: *</label><input type="email" id="email" name="email" value="" required><br>
			<label for="country" required>國家: *</label>
			<select id="country" name="country" id="country">
				<option value="australia">Australia</option>
				<option value="canada">Canada</option>
				<option value="china" selected>China</option>
				<option value="denmark">Denmark</option>
				<option value="france">France</option>
				<option value="germany">Germany</option>
				<option value="hong kong">Hong Kong</option>
				<option value="italy">Italy</option>
				<option value="japan">Japan</option>
				<option value="kuwait">Kuwait</option>
				<option value="macau">Macau</option>
				<option value="malaysia">Malaysia</option>
				<option value="netherlands">Netherlands</option>
				<option value="new zealand">New Zealand</option>
				<option value="norway">Norway</option>
				<option value="qatar">Qatar</option>
				<option value="singapore">Singapore</option>
				<option value="south korea">South Korea</option>
				<option value="spain">Spain</option>
				<option value="sweden">Sweden</option>
				<option value="switzerland">Switzerland</option>
				<option value="taiwan">Taiwan</option>
				<option value="thailand">Thailand</option>
				<option value="aue">UAE</option>
				<option value="uk">UK</option>
				<option value="usa">USA</option>
			</select><br>
			<label for="add1">地址1: *</label><input type="text" id="add1" name="add1" value="" required><br>
			<label for="add2">地址2: </label><input type="text" id="add2" name="add2" value=""><br>
			<label for="city">城市: *</label><input type="text" id="city" name="city" value="" required><br>
			<label for="prov_count">省區: *</label><input type="text" id="prov_count" name="prov_count" value="" required><br>
			<label for="code">郵編: *</label><input type="text" id="code" name="code" value="" required><br>
			<label for="tel">電話: *</label><input type="number" id="tel" name="tel" value="" required><br>
			<p>* 必填信息</p>

			<input type="submit" value="下頁">
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