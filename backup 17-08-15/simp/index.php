   
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
        Yuzhe Studios 是一个立基于中国上海的独立时装设计工作室
        <p>工作室的创意设计空间部分是由毕业于伦敦时装学院，时尚面料设计专业的孙羽喆担任</p>
        <p>四个关键概念驱使着工作室运作： 
      </div>
      <div class="about-block">
        <h1>为“中国制造”而自豪</h1>
        <p>我们渴望改变“中国制造”的负面成见。中国历史上由许多原创作品和想法 - 我们希望把这个标准用回我们的工作室。</p>
      </div>
      
      <div class="about-block">
        <h1>手工制作艺术与古怪有趣的细节结合</h1>
        <p>我们的内部工匠和裁缝将​​会纯手工精致的制做服装的每一个细节在自己的工作室里。我们将独特的、现代的和古怪有趣的细节与传统手工艺结合在一起。最好的面料和材料将被采用在你的衣服上</p>
      </div>

      <div class="about-block">
        <h1>经久不衰的系列 </h1>
        <p>我们不会追逐最新的流行趋势。新的成衣系列是由之前的系列演变发展而来。由于我们对自己产品的自信，所以我们不会在自己的零售渠道进行折扣活动。 </p>
      </div>

      <div class="about-block">
        <h1>个性化</h1>
        <p>我们相信你的衣服应该“只属于”你，所以我们提供各种衣物的标签上手工缝制的字母缩写。 </p>
      </div>
    </div>
    <div id="section3" class="section clearfix">
        
          <div class="intro">
            <p>敬请期待</p>
            <p>如有疑问请联系我们 
           <a href="mailto:info@yuzhestudios.com">info@yuzhestudios.com</a>
           </p>
           <p>或者可以通过以下社交媒体软件找到我们</p>
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