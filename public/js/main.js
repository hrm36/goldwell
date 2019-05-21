jQuery(document).ready(function($) {
  jQuery('.home-slide').lightSlider({
    item:1,
    slideMargin:0,
    mode: 'fade',
    auto:true,
    pause: 3800,
    speed: 1500,
    pager: true,
    loop:true,
    controls: false,
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
  var prevSlide = null;
  var slider = jQuery('#lightSlider').lightSlider({
    gallery:true,
    item:1,
    vertical:true,
    verticalHeight:430,
    vThumbWidth:300,
    thumbItem:5,
    thumbMargin:4,
    enableThumbDrag: true,
    slideMargin:40,
    onAfterSlide: function (el) {
        prevSlide = slider.getCurrentSlideCount();
    },
    onBeforeSlide: function (el) {
        if (prevSlide) {
            console.log(prevSlide)
            var youtubePlayer = jQuery('#lightSlider li').eq(prevSlide - 1).find('.ls-youtube').get(0),
            vimeoPlayer = jQuery('#lightSlider li').eq(prevSlide - 1).find('.ls-vimeo').get(0);
            console.log(vimeoPlayer)
            if (youtubePlayer) {
                youtubePlayer.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
            } else if (vimeoPlayer) {
                jQueryf(vimeoPlayer).api("pause");
            }
        }

    }
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
