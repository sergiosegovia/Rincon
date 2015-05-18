///// Disable Right Clic
//$("body").bind("contextmenu", function(e) {
//    e.preventDefault();
//});

///// Play/Pause Video /////
$(document).on('click', '#video', function (e) {
    var video = $(this).get(0);
    if (video.paused === false) {
        video.pause();
    } else {
        video.play();
    }

    return false;
});

///// Resize Logo /////
$(window).scroll(function() {
  if ($(document).scrollTop() > 50) {
    $('.navbar-brand img').attr('src', 'img/logo_horizontal.png');
  } else {
    $('.navbar-brand img').attr('src', 'img/logo-rincon.png');
  }
});

///// Hide Menu /////
$('.nav a').on('click', function(){
  $('.collapse.in').collapse('hide'); 
});

////// Scroll //////

$('a').click(function(){
    $('html, body').animate({
        scrollTop: $( $(this).attr('href') ).offset().top
    }, 1500);
    return false;
});

///// Sliders /////

$(document).ready(function(){
  $('.bxslider').bxSlider();
});

///// Zoom /////
$(".zoom").elevateZoom({ 
  zoomType  : "inner", 
  cursor: "crosshair" 
});

///// Map /////
 
function init_map() {
  var var_location = new google.maps.LatLng(11.023005,-74.816889);
 
  var var_mapoptions = {
    center: var_location,
    zoom: 16,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    mapTypeControl: false,
    panControl:false,
    rotateControl:false,
    streetViewControl: false,
    draggable: false, 
    zoomControl: false, 
    scrollwheel: false, 
    disableDoubleClickZoom: true
  };
 
  var var_marker = new google.maps.Marker({
    position: var_location,
    map: var_map,
    title:"Barranquilla"});
 
  var var_map = new google.maps.Map(document.getElementById("map-container"),
      var_mapoptions);
 
  var_marker.setMap(var_map); 
 
}
 
google.maps.event.addDomListener(window, 'load', init_map);

