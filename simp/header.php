<?php
    //require("../database.php"); 
    ?>
<html>
    <head>
      	<title>Yuzhestudios</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="icon" href="img/favicon.ico">
      	<link rel="stylesheet" type="text/css" href="../css/main.css"> 
      	<link rel="stylesheet" type="text/css" href="../css/jqx.base.css"> 
    	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    	
    	
        <script type="text/javascript">
            <!--
                function toggle_visibility(id) {
                   var e = document.getElementById(id);
                   if(e.style.display == 'block')
                      e.style.display = 'none';
                   else
                      e.style.display = 'block';
                }
            //-->
        </script>
        
    </head>
    <body>
        <div id="popupBoxPosition" style="display:none;">
            <div class="popupBoxWrapper">
                <div class="popupBoxContent">
                    <p>WeChat QR code</p>
                    <img src="../img/wechatqr.jpg"/>
                    <button><a href="javascript:void(0)" onclick="toggle_visibility('popupBoxPosition');">Close</a></button>
                </div>
            </div>
        </div> 
		<div id="header">
			<div id="topBar">
				<div id="social">
					<a href="https://www.facebook.com/yuzhestudios?fref=ts" target="_blank"><i class="fa fa-facebook"></i></a>
					<a href="http://instagram.com/yuzhestudios" target="_blank"><i class="fa fa-instagram"></i></a>
					
					<a href="http://www.weibo.com/u/5469563878?topnav=1&wvr=6&topsug=1" target="_blank"><i class="fa fa-weibo"></i></a>
					<a href="./wechat.php" target="_blank"><i class="fa fa-weixin"></i></a>  
				</div>
			</div>
		    <div id="cart">
				<a href="..">English</a> /
				<a href="../trad">繁体中文</a> /
				<a class="space-right" href="../simp">简体中文</a>
		    	<a href="../cart.php"><i class="fa fa-shopping-cart"></i><span>购物袋</span></a>
		    	
		    </div>
	    </div>
        <nav>            
            <a href="#" id="menu-icon"></a>
            <ul>
                <li><a href="index.php"><img src="../img/logo.png" class="logo" alt="logo"></a></li>                
                <li><a href="shop.php">购物</a></li>
                <li><a href="./#section3">样品展示</a></li>
                <li><a href="./#section2">关于</a></li>
                <!-- <select onchange="location = this.options[this.selectedIndex].value;">
                    <option value="">Language</option>
                    <option value="../">English</option>
                    <option value="../trad">繁体中文</option>
                    <option value="../simp">简体中文</option>
                </select> -->
                <li><a href="../cart.php"><i class="fa fa-shopping-cart"></i><span>My Cart</span></a></li>  
            </ul>
            <div id="lang">
                  <a href="..">Eng</a> /
                  <a href="../trad">繁体</a> /
                  <a class="space-right" href="../simp">简体</a>                
            </div>
            <div id="social">
                <a href="http://instagram.com/yuzhestudios" target="_blank"><i class="fa fa-instagram"></i></a>
                <a href="https://www.facebook.com/yuzhestudios?fref=ts" target="_blank"><i class="fa fa-facebook"></i></a>
                
                <!-- <a href="https://twitter.com/yuzhestudios" target="_blank"><i class="fa fa-twitter"></i></a> -->
                <a href="http://www.weibo.com/u/5469563878?topnav=1&wvr=6&topsug=1" target="_blank"><i class="fa fa-weibo"></i></a>
                <a href="javascript:void(0)" onclick="toggle_visibility('popupBoxPosition');"><i class="fa fa-weixin"></i></a>          
                                   
            </div>
        </nav>