<?php
  include ('header.php');
  include ('sidebar.php');
  $result = mysqli_query($con, 'select * from products');
?>
    <div id="main">
      <div class="shop-page-new clearfix">
      <?php while ($product = mysqli_fetch_object($result)) { ?>
        <div class="shop">
        <a href="product.php?id=<?php echo $product->product_id;?>">
          <div class="shop-img">
            <img src="<?php echo $product->image; ?>" alt="<?php echo $product->name; ?>">
          </div>
          <div class="shop-info">
            <p><strong><?php echo $product->name; ?></strong></p>
            <p>£<?php echo $product->price;?></p>
          </div>
          </a>
        </div>
        <?php } ?>
      </div>
    </div>

<?php
  include('footer.php')
?>