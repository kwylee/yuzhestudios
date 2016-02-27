<?php
	include ('header.php');
	include ('sidebar.php');
	include ('../connect.php');

	$sql = mysqli_query($conn, 'UPDATE orders SET  status = 1 WHERE order_id = '.$_SESSION['order_id']);

	$msg = "yapi_tid = ". $_GET['yapi_tid'] ."\n";

	$result = mysqli_query($conn, 'select order_product.*, products.* from order_product INNER JOIN products ON order_product.product_no = products.product_no where order_product.order_id='.$_SESSION['order_id']);
	if (isset($result) && mysqli_num_rows($result) > 0) {
		// output data of each row
	    while($row = mysqli_fetch_assoc($result)) {

	    	$msg .= "Products: \n".$row["name"]." - ".$row["product_no"]." - Size: ".$row["size"]." - Personalise: ".$row["personalise"]." - Quantity: ".$row["quantity"]."\n";
	    
	    }

	}
	$query_customer = mysqli_query($conn, "SELECT * FROM customer WHERE customer_no ='".$_SESSION['customer_no']."'");
	$customer = mysqli_fetch_object($query_customer);

	$msg .= "\nCustomer info: \n".$customer->name."\n".$customer->email."\n".$customer->address_line1."\n".$customer->address_line2."\n".$customer->city."\n".$customer->prov_count."\n".$customer->country."\n".$customer->code."\n".$customer->tel;

	// use wordwrap() if lines are longer than 70 characters
	$msg = wordwrap($msg,120);

	// send email
	$mail = mail("karenwylee@hotmail.co.uk","New order: Order id ". $_SESSION['order_id'],$msg);

	if($mail){ 
		session_destroy();
	}
?>


<div id="main">
	<div class="content-center">
	<?php if($mail){ ?>
		<h2>谢谢！您的订单已成功接受处理，您会收到我们的电子邮件。</h2>
	<?php } ?>

	</div>
</div>

<?php 
	include ('footer.php');
?>