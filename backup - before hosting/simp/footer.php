		<div id="footer">
			<a href="">Shipping</a>
			<a href="">Return</a>
			<a href="">Contact</a>

		</div>
	<script src="../js/jquery.min.js"></script>
	<script>
	$("#down-link").click(function() {
        $('html, body').animate({
            scrollTop: $("#section2").offset().top
        }, 800);
    });
    </script>
	<!--<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
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
	$( "#personalise" ).tooltip({ 
		content: '<p>That&apos;s what this widget is</p><img src="img/icon-down.png"/>' 
	});
	$( "#size-guide" ).tooltip({ 
		content: '<p>Size Guide</p><img src="img/size-guide.png"/>' 
	});
	$( "#next" ).tooltip({ 
		content: '<p>Next product</p><img src="imgtrench.jpg"/>' 
	});
	</script>-->
		
	</body>
</html>