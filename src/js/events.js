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
    adaptiveHeight: false,
    dots: true,
    slidesToShow: 1,
    fade: true,
    cssEase: 'linear',
    //autoplay: true,
    //autoplaySpeed: 3000,
  });

}); // /.ready

  $(document).on('click', '.unified__item', function (e) {
    e.preventDefault();
    var curr_id = $("unified__item img").attr('src');
    var id = $(this).data("src")
    $('.unified__img img').attr('src', id).fadeOut(0);
    setTimeout(function () {
      $('.unified__img img').attr('src', id).fadeIn(100);
    }, 10);
  });

/**
 * Append popup video class to wp menu item
 */
$(function() {
  $('li.js-watch-demo a').attr('class', 'js-watch-demo');
});

/**
 * Card flip for gated content
 */
$(document).on('click', '.card-flip', function() {
  //console.log('clicked on a resource card');
  $('.card-flip.active').not(this).removeClass('active');
  $(this).toggleClass('active');
});


/**
 * CTA button on click expand to show content (form)
 */
$('#js-expand').click(function(e) {
  $('.cta__form').slideToggle();
  $(this).toggleClass('u-hidden');
});





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
