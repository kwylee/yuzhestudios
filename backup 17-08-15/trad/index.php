   
    <?php
      include ('header.php');
      include ('sidebar.php');
    ?>
    
    <div class="feature section">
      <img class="bg" src="../img/yuzhe-bg.png" alt="feature image"> 
    </div>
    <div id="section1" class="section" style="">
      <img class="header-logo" src="../img/logo.png">
      
      <div class="down-arrow">
        <a id="down-link" class="target">&#8964;</a>
    </div>
    </div>
    <div id="section2" class="section clearfix">
      <div class="intro">
        Yuzhe Studios 是一個立基於中國上海的獨立時裝設計工作室
        <p>工作室的創意設計空間部分是由畢業於倫敦時裝學院，時尚面料設計專業的孫羽喆擔任</p>
        <p>四個關鍵概念驅使著工作室運作：
      </div>
      <div class="about-block">
        <h1>為“中國製造”而自豪</h1>
        <p>我們渴望改變“中國製造”的負面成見。中國歷史上由許多原創作品和想法- 我們希望把這個標準用回我們的工作室。</p>
      </div>
      
      <div class="about-block">
        <h1>手工製作藝術與古怪有趣的細節結合</h1>
        <p>我們的內部工匠和裁縫將會純手工精緻的製做服裝的每一個細節在自己的工作室裡。我們將獨特的、現代的和古怪有趣的細節與傳統手工藝結合在一起。最好的面料和材料將被採用在你的衣服上。</p>
      </div>

      <div class="about-block">
        <h1>經久不衰的系列</h1>
        <p>我們不會追逐最新的流行趨勢。新的成衣系列是由之前的系列演變發展而來。由於我們對自己產品的自信，所以我們不會在自己的零售渠道進行折扣活動。</p>
      </div>

      <div class="about-block">
        <h1>個性化</h1>
        <p>我們相信你的衣服應該“只屬於”你，所以我們提供各種衣物的標籤上手工縫製的字母縮寫。</p>
      </div>
    </div>
    <div id="section3" class="section clearfix">
          <div class="intro">
            <p>樣品展示 - 敬請期待</p>
            <p>如有疑問請聯繫我們
           <a href="mailto:info@yuzhestudios.com">info@yuzhestudios.com</a>
           </p>
           <p>或者可以通過以下社交媒體軟件找到我們</p>
           <div id="info-social">
              <a href="https://www.facebook.com/pages/Yuzhe-Studios/868641533158899?fref=ts" target="_blank"><i class="fa fa-facebook fa-2x"></i></a>
              <a href="http://instagram.com/yuzhestudios" target="_blank"><i class="fa fa-instagram fa-2x"></i></a>
              <a href="https://twitter.com/yuzhestudios" target="_blank"><i class="fa fa-twitter fa-2x"></i></a>
              <a href="http://www.weibo.com/u/5469563878?topnav=1&wvr=6&topsug=1" target="_blank"><i class="fa fa-weibo fa-2x"></i></a>
            </div>
          </div>      
      </div>
    <script>
    $("#down-link").click(function() {
        $('html, body').animate({
            scrollTop: $("#section2").offset().top
        }, 800);
    });
    </script>
<?php
 include('footer.php')
?>