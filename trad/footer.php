<div id="footer">
	<div class="row">
        <div class="col-5">
           	<a href="https://www.facebook.com/yuzhestudios?fref=ts" target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="http://instagram.com/yuzhestudios" target="_blank"><i class="fa fa-instagram"></i></a>
            <!-- <a href="https://twitter.com/yuzhestudios" target="_blank"><i class="fa fa-twitter"></i></a> -->
            <a href="http://www.weibo.com/u/5469563878?topnav=1&wvr=6&topsug=1" target="_blank"><i class="fa fa-weibo"></i></a>     
            <a href="javascript:void(0)" onclick="toggle_visibility('popupBoxPosition');"><i class="fa fa-weixin"></i></a> 
        </div>
        <div class="col-2 tac footer-logo">
            <a href="index.php"><img src="../img/logo.png" class="logo" alt="logo"></a>
        </div>
        <div class="col-5 tar">
        	<a href="contact+info.php">Contact &amp; info</a>
        </div>
    </div>
</div>

	<script src="../js/jquery.min.js"></script>
	<script>
	$("#down-link").click(function() {
        $('html, body').animate({
            scrollTop: $("#section2").offset().top
        }, 800);
    });
    </script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script src="../js/jqexpander.js"></script>
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
    <script type="text/javascript">
	jQuery(".personalise").change(function(){
		    var d = this.checked ? 'block' : 'none';
		    jQuery('.show').css('display', d);
		});
	</script>
	<script type="text/javascript">
    if(document.location.origin == 'http://localhost:8080'){
        var down = '/yuzhestudios/img/icon-down.png';
    }else{
        var down = '/img/icon-down.png';
    }    
    var down_url = document.location.origin + down;
	$( "#personalise" ).tooltip({ 
		content: function(){
            return '<p>Size Guide</p><img src="' + down_url + '"/>';
        }
	});
    if(document.location.origin == 'http://localhost:8080'){
        var size = '/yuzhestudios/img/size-guide2.png';
    }else{
        var size = '/img/size-guide2.png';
    } 
    var size_url = document.location.origin + size;
	$( "#size-guide" ).tooltip({         
        content: function(){
            return '<p>Size Guide</p><img src="' + size_url + '"/>';
        }
	});
	$("form .show input[type=text]").on('input',function () {
	    if(jQuery(this).val().length == jQuery(this).attr('maxlength')) {
	        jQuery(this).next("input").focus();
	    }
	});
	var slideCount = $('#slider ul li').length;
	var slideWidth = $('#slider ul li').width();
	var slideHeight = $('#slider ul li').height();
	var sliderUlWidth = slideCount * slideWidth;
	
	$('#slider').css({ width: slideWidth, height: slideHeight });
	
	$('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });
	
    $('#slider ul li:last-child').prependTo('#slider ul');

    function moveLeft() {
        $('#slider ul').animate({
            left: + slideWidth
        }, 200, function () {
            $('#slider ul li:last-child').prependTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    function moveRight() {
        $('#slider ul').animate({
            left: - slideWidth
        }, 200, function () {
            $('#slider ul li:first-child').appendTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    $('a.control_prev').click(function () {
        moveLeft();
    });

    $('a.control_next').click(function () {
        moveRight();
    });
	</script>

	</body>
</html>