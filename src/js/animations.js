// Animations
// uses GSAP (TweenMax) + ScrollMagic

import ScrollMagic from 'scrollmagic/scrollmagic/uncompressed/ScrollMagic';
import 'scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap';
import 'scrollmagic/scrollmagic/uncompressed/plugins/debug.addIndicators';
import TweenMax from 'gsap/src/uncompressed/TweenMax';
import TimelineMax from 'gsap/src/uncompressed/TimelineMax';

// ScrollMagic init controller
var controller = new ScrollMagic.Controller();
var tl = new TimelineMax();


$('.solutions .row').each(function() {
  //build tween
  var tween = TweenMax.from($(this), 1, {
    autoAlpha: 0, 
    //scale: 0.95, 
    y: '+=10', 
    ease: Power1.easeOut
  })
  //build scene
  var projectScene = new ScrollMagic.Scene({
    //scene options
    triggerElement: this,
    triggerHook: 0.7,
    reverse: false //dont repeat scene on scroll back up 
  })
  .setTween(tween)//trigger tween
  //.addIndicators({name: 'tween:module',}) //DEBUG ONLY; uses plugin
  .addTo(controller);
});


  // Tween: fade-in header logo on load
  /*
  var logo = $('.logo');
  tl.add(
    TweenMax.from($(logo), 0.2, {
      autoAlpha: 0,
      x: -30,
      ease: Linear.easeNone
    })
  )
  // Tween: slide-in header nav items on load
  $('.solutions .row').each(function () {
    tl.add(
      TweenMax.from($(this), 0.2, {
        autoAlpha: 0,
        x: 30,
        ease: Linear.easeNone
      })
    );
  })
  */