jQuery(window).load(function() {
  jQuery('.flexslider').flexslider({
    animation: "slide",
	start:function(slider){
        //HIDE THE ARROWS BY DEFAULT...
        jQuery('.flex-direction-nav').css({visibility:'hidden'});
	}
  });
});