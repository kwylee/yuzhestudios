//enlarge product images
$(".product-img").click(function() {
    var image = $(this).attr("src");
    console.log(image);
    $(".large-image").attr("src", image); 
    toggle_visibility('popupBoxImage');
});
//toggle pop up box (WeChat)
function toggle_visibility(id) {
     
   var e = document.getElementById(id);
   if(e.style.display == 'block')
      e.style.display = 'none';
   else
      e.style.display = 'block';
}
//home page down button
$("#down-link").click(function() {
    $('html, body').animate({
        scrollTop: $("#section2").offset().top
    }, 800);
});
//expanded details
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
//open tooltip on hover (personalise and size guide)
if(document.location.origin == 'http://localhost:8080'){
      var down = '/yuzhestudios/img/personlisation.jpg';
  }else{
      var down = '/img/personlisation.jpg';
  }    
  var down_url = document.location.origin + down;
$( "#personalise" ).tooltip({ 
  content: function(){
          return '<p>為您手工配製個性化的名字首字母</p><img src="' + down_url + '"/>';
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
//show personalise input fields on checked
jQuery(".personalise").change(function(){
      var d = this.checked ? 'block' : 'none';
      jQuery('.show').css('display', d);
  });
//go to next input on personalise after letter entered
$("form .show input[type=text]").on('input',function () {
    if(jQuery(this).val().length == jQuery(this).attr('maxlength')) {
        jQuery(this).next("input").focus();
    }
});
//lookbook slider
var slideCount = $('#slider ul li').length;
var slideWidth = $('#slider ul li').width();
var slideHeight = $('#slider ul li').height();
var sliderUlWidth = slideCount * slideWidth;

$('#slider').css({ width: slideWidth, height: slideHeight });

$('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });

$('#slider ul li:last-child').prependTo('#slider ul');
//lookbook slider controls
function moveLeft() {
    $('#slider ul').animate({

        left: + slideWidth
    }, 300, function () {
        $('#slider ul li:last-child').prependTo('#slider ul');
        $('#slider ul').css('left', '');
    });
};
function moveRight() {
    $('#slider ul').animate({
        left: - slideWidth
    }, 300, function () {
        $('#slider ul li:first-child').appendTo('#slider ul');
        $('#slider ul').css('left', '');
    });
};

$('a.control_prev').click(function (event) {
    event.preventDefault();
    moveLeft();
});

$('a.control_next').click(function (events) {
    event.preventDefault();
    moveRight();
});

//add swipe functionallity to slider
var slide = document.getElementById('slider');
var mc = new Hammer(slide);
mc.on("swiperight", function(ev) {
    moveLeft();
});
mc.on("swipeleft", function(ev) {
    moveRight();
});
//reload page on orientation change
window.onorientationchange = function() { 
  var orientation = window.orientation; 
  switch(orientation) { 
      case 0: window.location.reload(); 
      break; 
      case 90: window.location.reload(); 
      break; 
      case -90: window.location.reload(); 
      break; 
  } 
};

