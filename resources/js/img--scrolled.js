            // Esto sería para que funcionara a unos pixeles concretos. En este caso a 500.

/*jQuery(function() {
    var full_img = jQuery(".full_img");
    jQuery(window).scroll(function() {    
        var scroll = jQuery(window).scrollTop();
        var thisTop = jQuery(this).offset().top;
        var thisBot = thisTop + jQuery(this).height();
    
        if (scroll >= 500) {
            full_img.addClass("full_img--scrolled");
        } else {
            full_img.removeClass("full_img--scrolled");
        }
    });
})
*/
        // Esto es para que funcione cuando la caja toque el viewport bottom.


jQuery(function() {
  jQuery(window).scroll(function() {


    var $window = jQuery(window);
    var viewportTop = $window.scrollTop()-90;
    var viewportBottom = viewportTop + $window.height();
      
    jQuery('.full_img').each(function(){
      var thisTop = jQuery(this).offset().top;
      var thisBot = thisTop + jQuery(this).height();

      if (thisBot <= viewportBottom){
        jQuery(this).addClass('full_img--scrolled');
      }
        
      if (thisBot >= viewportBottom){
        jQuery(this).removeClass('full_img--scrolled');
      }

    });
});

});
