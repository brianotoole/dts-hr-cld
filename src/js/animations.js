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


$('.solutions .solution__wrap').each(function() {
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
    triggerHook: 0.8,
    reverse: false //dont repeat scene on scroll back up 
  })
  .setTween(tween)//trigger tween
  //.addIndicators({name: 'tween:module',}) //DEBUG ONLY; uses plugin
  .addTo(controller);
});

$('.solutions path').each(function(){
  // Create a scene for each project
  //var tweenDelay = new TimelineMax()
  //build tween
  var tweenSvg = TweenMax.from($(this), 1, {
    //autoAlpha: 0, 
    //scale: 0.95, 
    fill: '#323a45', //color__secondary
    ease: Power1.easeNone
  })
  
  var myScene = new ScrollMagic.Scene({
    triggerElement: this,
    triggerHook: 0.5,
    reverse: true //dont repeat scene on scroll back up 
  })
  .setTween(tweenSvg)
  .setClassToggle(this, 'active')
  //.addIndicators() //to debug, comment out when done
  .addTo(controller);
});

/*var shape = document.querySelector('.a path');
var shapeLength = shape.getTotalLength();
console.log(shapeLength); //89.26751708984375
*/

$('.solution__item').each(function() {
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
    triggerHook: 0.8,
    reverse: false //dont repeat scene on scroll back up 
  })
  .setTween(tween)//trigger tween
  //.addIndicators({name: 'tween:module',}) //DEBUG ONLY; uses plugin
  .addTo(controller);
});


// build scene for scrolling line animation on 'benefits'
var scene = new ScrollMagic.Scene({
  triggerElement: ".benefits",
  reverse: false
})
.setTween(".benefits__line", 1.5, {width: "84%"}) // trigger a TweenMax.to tween

.addTo(controller);


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