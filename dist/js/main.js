/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);
module.exports = __webpack_require__(3);


/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


//require('./events.js');
__webpack_require__(2);
//require('./social-sharing.js');

/***/ }),
/* 2 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


//navPrimaryParent = $('.menu-primary li.menu-item-has-children:has(ul)');
//tabletBreakpoint = 768;

$('#js-menu-toggle').click(function () {
  toggleMobileMenu();
});
function toggleMobileMenu() {
  $('.mobile-menu').toggleClass('is-active');
  $('.mobile-menu-toggle').toggleClass('is-active');
  $('html').toggleClass('nav-open');
}

// Primary Nav Dropdown
var nav_parent = $('.nav-primary li.menu-item-has-children:has(ul)');
var breakpoint = 768;
nav_parent.on({
  mouseenter: function mouseenter() {
    if ($(window).width() >= breakpoint) {
      //$('.nav-primary').addClass('active');
      $(this).find('ul.sub-menu').addClass('active');
    }
  }
});
nav_parent.on({
  mouseleave: function mouseleave() {
    if ($(window).width() >= breakpoint) {
      //$('.nav-primary').removeClass('active');
      $(this).find('ul.sub-menu').removeClass('active');
    }
  }
});

// Mobile Nav Dropdown
var parent = $('.nav-mobile li.menu-item-has-children:has(ul)');
parent.append('<i class="nav-mobile__chevron"></i>');
parent.on('click', function (e) {
  e.preventDefault();
  $(this).find('ul > li').toggle();
  //$(this).find('.sub-menu').toggleClass('active');
  $(this).find('i').toggleClass('is-open');
});

var child = $('.nav-mobile li.menu-item-has-children:has(ul)').find('ul > li');
child.on('click', function (e) {
  e.stopPropagation();
});

/***/ }),
/* 3 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);