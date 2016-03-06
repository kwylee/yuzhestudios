<?php
    require("../connect.php");
    session_start();
    header('Content-Type:text/html; charset=UTF-8');

    if(isset($_GET['currency'])) { 
        $_SESSION['currency'] = $_GET['currency'];        
    }

    $base_url = $_SERVER['SERVER_NAME'];

    function convertCurrency($amount, $from, $to){
        $data = file_get_contents("https://www.google.com/finance/converter?a=$amount&from=$from&to=$to");
        preg_match("/<span class=bld>(.*)<\/span>/",$data, $converted);
        $converted = preg_replace("/[^0-9.]/", "", $converted[1]);
        return number_format(round($converted, 3),2);
    }

    $url = basename($_SERVER['REQUEST_URI']);

    $query = parse_url($url, PHP_URL_QUERY);

    // Returns a string if the URL has parameters or NULL if not
    if ($query) {
        $rmb = $url .'&currency=rmb';
        $gbp = $url .'&currency=gbp';
        $eur = $url .'&currency=eur';
        $usd = $url .'&currency=usd';
    } else {
        $rmb = $url .'?currency=rmb';
        $gbp = $url .'?currency=gbp';
        $eur = $url .'?currency=eur';
        $usd = $url .'?currency=usd';
    }

?>
<html>
    <head>
        <title>Yuzhestudios</title>
        <html lang="zh-Hant">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="icon" href="../img/favicon.ico">
        <link rel="stylesheet" type="text/css" href="../css/main.css?v=5"> 
        <link rel="stylesheet" type="text/css" href="../css/jqx.base.css"> 
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">   
        
    </head>
    <body class="trad">
        <div id="popupBoxPosition" style="display:none;">
            <div class="popupBoxWrapper">
                <div class="popupBoxContent">
                    <p>WeChat QR code</p>
                    <img src="../img/wechatqr.jpg"/>
                    <button><a href="javascript:void(0)" onclick="toggle_visibility('popupBoxPosition');">Close</a></button>
                </div>
            </div>
        </div> 
        <div id="popupBoxImage" style="display:none;">
            <div class="popupBoxWrapper">
                <div class="popupBoxContent">
                    <img class="large-image" src=""/>
                    <button><a href="javascript:void(0)" onclick="toggle_visibility('popupBoxImage');">Close</a></button>
                </div>
            </div>
        </div> 
        <div id="header">
            <div class="row">
                <div class="col-5 lang">
                    <a href="..">English</a> /
                <a href="../trad">繁体中文</a> /
                <a class="space-right" href="../simp">简体中文</a>
                </div>
                <div class="col-5 lang-mobile">
                    <a href="..">Eng</a> /
                    <a href="../trad">繁体</a> /
                    <a href="../simp">简体</a>
                </div>
                <div class="col-2 tac cart">
                    <a  href="cart.php"><i class="fa fa-shopping-cart"></i><span>購物袋</span></a>
                </div>
                <div class="col-5 tar currency">
                    <span>貨幣:</span>
                    <select onchange="javascript:location.href=this.value">
                        <option value="<?php echo $rmb; ?>" <?php if(!isset($_SESSION['currency']) || $_SESSION['currency'] == 'rmb'){ echo 'selected';} ?>>RMB</option>
                        <option value="<?php echo $gbp; ?>" <?php  if(isset($_SESSION['currency']) && $_SESSION['currency'] == 'gbp'){ echo 'selected';} ?>>GBP</option>
                        <option value="<?php echo $eur; ?>" <?php  if(isset($_SESSION['currency']) && $_SESSION['currency'] == 'eur'){ echo 'selected';} ?>>EUR</option>
                        <option value="<?php echo $usd; ?>" <?php  if(isset($_SESSION['currency']) && $_SESSION['currency'] == 'usd'){ echo 'selected';} ?>>USD</option>
                    </select>        
                </div>
            </div>
        </div>