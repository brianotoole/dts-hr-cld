$('#js-menu-toggle').click(function() {
  $('.mobile-menu').toggleClass('is-active');
  $('.mobile-menu-toggle').toggleClass('is-active');
  $('html').toggleClass('nav-open');
});
