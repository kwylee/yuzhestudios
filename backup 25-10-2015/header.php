<?php
    //require("database.php"); 
    ?>
<html>
    <head>
      	<title>Yuzhestudios</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="icon" href="img/favicon.ico">
      	<link rel="stylesheet" type="text/css" href="./css/main.css"> 
      	<link rel="stylesheet" type="text/css" href="./css/jqx.base.css"> 
      	<link href='http://fonts.googleapis.com/css?family=Covered+By+Your+Grace' rel='stylesheet' type='text/css'>
    	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700,300italic' rel='stylesheet' type='text/css'>
    	<script src="./js/jqexpander.js"></script>
    	<script type="text/javascript">
        jQuery(document).ready(function () {
            // Create jqxExpander
            jQuery("#jqxexpander").jqxExpander({expanded:false});
            // bind to expanded event.
            jQuery("#jqxexpander").bind('expanded', function (event) {
            });
            // bind to collapsed event.
            jQuery("#jqxexpander").bind('collapsed', function (event) {
            });
        });
    	</script>
    	
    </head>
    <body> 
		<div id="header">
			<div id="topBar">
				<div id="social">
					<a href="https://www.facebook.com/yuzhestudios?fref=ts" target="_blank"><i class="fa fa-facebook"></i></a>
					<a href="http://instagram.com/yuzhestudios" target="_blank"><i class="fa fa-instagram"></i></a>
					<a href="https://twitter.com/yuzhestudios" target="_blank"><i class="fa fa-twitter"></i></a>
					<a href="http://www.weibo.com/u/5469563878?topnav=1&wvr=6&topsug=1" target="_blank"><i class="fa fa-weibo"></i></a>					
				</div>
			</div>
		    <div id="cart">
			    <a href="">English</a> /
			    <a href="trad">繁体中文</a> /
			    <a class="space-right" href="simp">简体中文</a>
	    	    <i class="fa fa-shopping-cart"></i><span>My Cart</span>		    	
		    </div>
	    </div>
        <nav>            
            <a href="#" id="menu-icon"></a>
            <ul>
                <li><a href="index.php"><img src="img/logo.png" class="logo" alt="logo"></a></li>                
                <li><a href="shop.php">Shop</a></li>
                <li><a href="#section3">Lookbook</a></li>
                <li><a href="#section2">About</a></li>
                <select onchange="location = this.options[this.selectedIndex].value;">
                    <option value="">Language</option>
                    <option value="/">English</option>
                    <option value="trad">繁体中文</option>
                    <option value="simp">简体中文</option>
                </select>
                <li><i class="fa fa-shopping-cart"></i><span>My Cart</span></li>  
            </ul>
            <div id="social">
                <a href="https://www.facebook.com/yuzhestudios?fref=ts" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="http://instagram.com/yuzhestudios" target="_blank"><i class="fa fa-instagram"></i></a>
                <a href="https://twitter.com/yuzhestudios" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="http://www.weibo.com/u/5469563878?topnav=1&wvr=6&topsug=1" target="_blank"><i class="fa fa-weibo"></i></a>                 
            </div>
        </nav>