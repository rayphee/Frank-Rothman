//JavaScript Document
var controller;
$(window).load(function(){
	$.gsap.enabled(true);
	//Cached DOM Elements
	var notupperbar=$(".notupperbar");
	var mapmenu=$("#map");
	var menu=$("#menu");
	var backing=$("#backing");
	var openmenu=$(".openmenu");
	var openmap=$(".openmap");
	var slider=$('#slider');
	var imagetitle=$("#slidertext").find("h");
	var imagetext=$("#slidertext").find("a");
	//Slider Data
	var i=0;
	var animationtime;
    var consultbutton=$(".consult-button");
    var consult=$(".consultation");
    var close=$(".close-consult");
    var tl = new TimelineMax();
	//Open Menu Logic
  	openmenu.click(function(){
		animationtime = 1000;
		if ( notupperbar.hasClass("menushown") ){
			if(notupperbar.hasClass("mapshown") ){
				notupperbar.animate({marginTop:"-=800"}, animationtime,"easeOutQuint").removeClass("menushown").removeClass("mapshown");
				mapmenu.fadeToggle(animationtime/2);
				menu.fadeToggle(animationtime/2);
			}
			else{
				notupperbar.animate({marginTop:"-=400"},animationtime,"easeOutQuint").removeClass("menushown");
				menu.slideToggle(animationtime,"easeOutQuint",null);
				backing.slideToggle(animationtime,"easeOutQuint",null);
			}
		}
		else {
			if(notupperbar.hasClass("mapshown") ){
				notupperbar.addClass("menushown").removeClass("mapshown");
				menu.fadeToggle(animationtime/2);
				mapmenu.fadeToggle(animationtime/2);
			}
			else{
				notupperbar.animate({marginTop:"+=400"},animationtime,"easeOutQuint").addClass("menushown");
				menu.slideToggle(animationtime,"easeOutQuint",null);
				backing.slideToggle(animationtime,"easeOutQuint",null);
			}
		}
  	});
	//Open Map Logic
	openmap.click(function(){
		var location;
		animationtime = 1000;
		location = new google.maps.LatLng(40.71782,-74.00128);
		if ( notupperbar.hasClass("mapshown") ){
			if(notupperbar.hasClass("menushown") ){
				notupperbar.animate({marginTop:"-=800"},animationtime,"easeOutQuint").removeClass("menushown").removeClass("mapshown");
				menu.fadeToggle(animationtime/2);
				mapmenu.fadeToggle(animationtime/2);
			}
			else{
				notupperbar.animate({marginTop:"-=400"},animationtime,"easeOutQuint").removeClass("mapshown");
				mapmenu.slideToggle(animationtime,"easeOutQuint",null);
				backing.slideToggle(animationtime,"easeOutQuint",null);
			}
		}
		else {
			if(notupperbar.hasClass("menushown") ){
				notupperbar.addClass("mapshown").removeClass("menushown");
				mapmenu.fadeToggle(animationtime/2);
				menu.fadeToggle(animationtime/2);
				google.maps.event.trigger(map, 'resize');
				map.setCenter(location);
			}
			else{
				notupperbar.animate({marginTop:"+=400"},animationtime,"easeOutQuint").addClass("mapshown");
				mapmenu.slideToggle(animationtime,"easeOutQuint",null);
				backing.slideToggle(animationtime,"easeOutQuint",null);
				google.maps.event.trigger(map, 'resize');
				map.setCenter(location);
			}
		}
	});
    consultbutton.click(function(){
        /*if ($(consultbutton).hasClass('opened')){
            TweenMax.to(teach, 1, {y:"0px", ease:Power4.easeOut});
            TweenMax.to(train, 1, {x:"0px", y:"0px", ease:Power4.easeOut});
            TweenMax.to(encourage, 1, {x:"0px", y:"0px", ease:Power4.easeOut});
            TweenMax.to(mission, 1, {backgroundColor:"rgb(255,255,255,1)", borderColor:"rgba(0,0,0,1)", ease:Power4.easeOut});
            $(mission).removeClass('opened');
        }
        else{
            TweenMax.to(teach, 1, {y:"230px", ease:Power4.easeOut});
            TweenMax.to(train, 1, {x:"-250px", y:"-170px", ease:Power4.easeOut});
            TweenMax.to(encourage, 1, {x:"250px", y:"-170px", ease:Power4.easeOut});
            TweenMax.to(mission, 1, {backgroundColor:"rgb(255,255,255,0)", borderColor:"rgba(255,255,255,0)", ease:Power4.easeOut});
            $(mission).addClass('opened');
        }*/
        if (window.innerWidth>=799){
            tl.to(consult, 0, {zIndex:4}).to(consult, 0.25, {opacity:1});
            //TweenMax.to(consult, 0, {zIndex:4});
            //TweenMax.to(consult, 1, {opacity:100%});
        }
        else{
            window.location.href = "mailto:frothman@rssslaw.com";
        }
    });
    close.click(function(){
        tl.to(consult, 0.25, {opacity:0}).to(consult, 0, {zIndex:-1});
    });
    
});
$(document).ready(function($) {
	controller = new ScrollMagic();
    new ScrollScene({duration:800}).setPin("#rothmananimationlogo").addTo(controller);
    new ScrollScene({duration:800}).setPin("#skip").addTo(controller);
    new ScrollScene({duration:450, offset:350}).setPin("#rothmanintrotext").addTo(controller);
    new ScrollScene({duration:250}).setPin("#message1").addTo(controller);
    var rotationclock = TweenMax.to("#bar", 0.5, {rotation:25});
    var scaleleftup = TweenMax.to("#scaleleft", 0.5, {marginTop:35,left:-45});
    var scalerightdown = TweenMax.to("#scaleright", 0.5, {marginTop:130,right:-22});
    var barequalize = TweenMax.to("#bar", 0.5, {rotation:0});
    var message1opacity = TweenMax.to("#message1", 0.5, {opacity:0});
    var rothmanintrotextopacity = TweenMax.to("#rothmanintrotext", 0.5, {opacity:1});
    var scalerightequalize = TweenMax.to("#scaleright", 0.5, {marginTop:85,right:-37});
    var scaleleftequalize = TweenMax.to("#scaleleft", 0.5, {marginTop:85,left:-50});
    var rotationcounter = TweenMax.to("#bar", 0.5, {rotation:-25});
    var scalerightup = TweenMax.to("#scaleright", 0.5, {marginTop:35,right:-30});
    var scaleleftdown = TweenMax.to("#scaleleft", 0.5, {marginTop:130,left:-35});
    var logoshift = TweenMax.to("#rothmananimationlogo", 0.5, {x:-250});
    var rothmanintrotextdisappear = TweenMax.to("#rothmanintrotext", 0.5, {opacity:0});
    var rothmananimationlogodisappear = TweenMax.to("#rothmananimationlogo", 0.5, {opacity:0});
    var skipdisappear = TweenMax.to("#skip", 0.5, {opacity:0});
	new ScrollScene({offset:0}).setTween(rotationclock).addTo(controller);
    new ScrollScene({offset:0}).setTween(scaleleftup).addTo(controller);
    new ScrollScene({offset:0}).setTween(scalerightdown).addTo(controller);
    new ScrollScene({duration:50, offset:250}).setTween(message1opacity).addTo(controller);
    new ScrollScene({duration:100, offset:300}).setTween(logoshift).addTo(controller);
    new ScrollScene({duration:50, offset:400}).setTween(barequalize).addTo(controller);
    new ScrollScene({duration:50, offset:400}).setTween(scalerightequalize).addTo(controller);
    new ScrollScene({duration:50, offset:400}).setTween(scaleleftequalize).addTo(controller);
    new ScrollScene({duration:50, offset:300}).setTween(rothmanintrotextopacity).addTo(controller);
    new ScrollScene({duration:250, offset:880}).setTween(rothmananimationlogodisappear).addTo(controller);
    new ScrollScene({duration:250, offset:880}).setTween(rothmanintrotextdisappear).addTo(controller);
    new ScrollScene({duration:250, offset:880}).setTween(skipdisappear).addTo(controller);
 });
