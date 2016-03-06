<?php
  include ('header.php');
  include ('sidebar.php');
  mysqli_query($conn, "SET NAMES 'utf8'");
  mysqli_query($conn, "SET CHARACTER SET 'utf8'");
  $result = mysqli_query($conn, 'select * from products');
?>
    <div id="main">
      <div class="shop-page-new clearfix">
      <?php while ($product = mysqli_fetch_object($result)) { ?>
        <div class="shop">
        <a href="product.php?id=<?php echo $product->product_id;?>">
          <div class="shop-img">
            <img src="<?php echo '../'.$product->image.'.jpg'; ?>" alt="<?php echo $product->name; ?>">
          </div>
          <div class="shop-info">
            <p><strong><?php echo $product->name_trad; ?></strong></p>
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
          </div>
          </a>
        </div>
        <?php } ?>
      </div>
    </div>

<?php
  include('footer.php')
?>