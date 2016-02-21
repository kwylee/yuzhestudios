<?php
      include ('header.php');
      include ('sidebar.php');
    ?>
    <div id="main">
    	<div class="qr">
			<img src="<?php echo 'http://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']); ?>/img/wechatqr.jpg" alt="Wechat QR code"> 
		</div>  
	</div> 
<?php
 include('footer.php')
?>