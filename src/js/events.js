/**
 * -- EVENTS
 */
import { viewport_width, is_in_view } from "./globals";
import { parallax } from "./parallax";
import { fitText } from "./fit-text";

/**
  * These functions execute in order.
  */
(function(){
  fitText();
})();

/**
  * Events that fire when the page is loaded.
  */
// http://kenwheeler.github.io/slick/
$(document).ready(function() {

  //audience section carrousel
  $('#carousel--audience').slick({
    slidesToShow: 1,
    arrows: false,
    dots: false,
    fade: true,
    cssEase: 'linear',
    //asNavFor: '.slider-nav-thumbnails',
  });
  
  //audience section carousel navigation
  $('#carousel--audience-nav').slick({
    slidesToShow: 4,
    //slidesToScroll: 1,
    asNavFor: '#carousel--audience',
    dots: false,
    focusOnSelect: true
  });


  //default carousel
  $('#carousel').slick({
    adaptiveHeight: true,
    dots: true,
    slidesToShow: 1,
    fade: true,
    cssEase: 'linear',
    //autoplay: true,
    //autoplaySpeed: 3000,
  });

}); // /.ready


/**
 * Events that fire on Window Scroll
 */

$(window).scroll(() => {
  /**
    * Homepage marketing points section animate lines when in viewport
    */
  if ( is_in_view('#how_it_works', 200) ) {
    if ( viewport_width >= 768 ) {
      $('.marketing-points--alt .marketing-points__heading.is-first .line').animate({
        width: '100%'
      }, 500, () => {
        setTimeout(() => {
          $('.marketing-points--alt .marketing-points__heading.is-middle .line').animate({
            width: '100%'
          }, 500);
        }, 200);
      });
    }
  }

  // parallax effect on scroll
  parallax('.js-parallax');

  parallax('.js-parallax-shape',1090);

}); // /.scroll
