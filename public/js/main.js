jQuery(document).ready(function($) {
  jQuery('.home-slide').lightSlider({
    item:1,
    slideMargin:0,
    mode: 'fade',
    auto:true,
    pause: 3800,
    speed: 1500,
    pager: false,
    loop:true,
    enableTouch:false,
    controls: false,
    enableDrag: false,
});
  jQuery('.product-slide').lightSlider({
    item:1,
    slideMargin:0,
    auto:false,
    speed: 1000,
    pager: false,
    loop:true,
    prevHtml:'<i class="fa fa-angle-left"></i>',
    nextHtml:'<i class="fa fa-angle-right"></i>',
});
  jQuery().fancybox({
    selector : '[data-fancybox="gallery"], .gallery-item a',
    loop     : true,
});
});
jQuery(document).ready(function() {
    var stickyNavTop = jQuery('#header').offset().top;

    var stickyNav = function(){
        var scrollTop = jQuery(window).scrollTop();

        if (scrollTop > stickyNavTop) {
            jQuery('#header').addClass('sticky-menu');
        } else {
            jQuery('#header').removeClass('sticky-menu');
        }
    };
    stickyNav();
    jQuery(window).scroll(function() {
      stickyNav();
  });
});
