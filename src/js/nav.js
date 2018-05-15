
//navPrimaryParent = $('.menu-primary li.menu-item-has-children:has(ul)');
//tabletBreakpoint = 768;

$('#js-menu-toggle').click(function() {
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
  mouseenter: function() {
    if ($(window).width() >= breakpoint) {
      //$('.nav-primary').addClass('active');
      $(this).find('ul.sub-menu').addClass('active');
    }
  }
});
nav_parent.on({
  mouseleave: function() {
    if ($(window).width() >= breakpoint) {
      //$('.nav-primary').removeClass('active');
      $(this).find('ul.sub-menu').removeClass('active');
    }
  }
});

// Mobile Nav Dropdown
var parent = $('.nav-mobile li.menu-item-has-children:has(ul)');
parent.append('<i class="nav-mobile__chevron"></i>');
parent.on('click', function(e) {
  e.preventDefault();
  $(this).find('ul > li').toggle();
  //$(this).find('.sub-menu').toggleClass('active');
  $(this).find('i').toggleClass('is-open');
});

var child = $('.nav-mobile li.menu-item-has-children:has(ul)').find('ul > li');
child.on('click', function(e) {
  e.stopPropagation();
});

