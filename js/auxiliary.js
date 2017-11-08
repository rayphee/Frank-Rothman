//JavaScript Document
//Google Maps Framework Code
var map;
function init_map(){
	 var myOptions = {zoom:14,center:new google.maps.LatLng(40.71782,-74.00128),mapTypeId: google.maps.MapTypeId.ROADMAP};
	 map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
	 marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(40.71782, -74.00128)});
	 google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});
}
	 google.maps.event.addDomListener(window, 'load', init_map);
//On Resize Code
window.onresize = function(event) {
	var contentwrapper=$("#content-wrapper");
    if (window.innerWidth>=1099){
		$.stellar({
			responsive:true,
		});
		TweenMax.fromTo(contentwrapper, 2, {css: {backgroundColor:"rgba(240,245,255,1)"}},{css:{backgroundColor:"rgba(240,245,255,.9)"}});
	}
	else{
		TweenMax.to(contentwrapper, 0, {backgroundColor:"rgba(240,245,255,0)"});
	}
};
if (window.innerWidth>=1099){
	$.stellar({
		responsive:true,
        horizontalScrolling:false,
	});
}
smoothScroll.init();