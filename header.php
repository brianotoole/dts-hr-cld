<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<?php
//Custom Field Group == Site Options
$site_logo = get_field('site_logo', 'option');
?>
<!-- Hotjar Tracking Code for https://www.datis.com -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:957984,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>

<!-- Google Analytics -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-37058681-1', 'auto');
ga('set', '&uid', '9');
ga('set', 'forceSSL', true);
ga('send', 'pageview');

	jQuery(document).ready(function(e) {
    jQuery('a').click(function(e) {
		var $this = jQuery(this);
      	var href = $this.prop('href').split('?')[0];
		var ext = href.split('.').pop();
		if ('xls,xlsx,doc,docx,ppt,pot,pptx,pdf,pub,txt,zip,rar,tar,7z,gz,exe,wma,mov,avi,wmv,wav,mp3,midi,csv,tsv,jar,psd,pdn,ai,pez,wwf,torrent,cbr'.split(',').indexOf(ext) !== -1) {		
        ga('send', 'event', 'Download', ext, href);
      }
	  if (href.toLowerCase().indexOf('mailto:') === 0) {
        ga('send', 'event', 'Mailto', href.substr(7));
      }
	  if (href.toLowerCase().indexOf('tel:') === 0) {
        ga('send', 'event', 'Phone number', href.substr(4));
      }
      if ((this.protocol === 'http:' || this.protocol === 'https:') && this.hostname.indexOf(document.location.hostname) === -1) {
        ga('send', 'event', 'Outbound', this.hostname, this.pathname);
      }
	});
});


  var _gaq = _gaq || [];

  _gaq.push(['_setAccount', '']);

  _gaq.push(['_trackPageview']);



  (function() {

    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;

    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';

    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);

  })();

</script>



<body <?php body_class(); ?>>
  <div id="page">
    <header class="header">
      <div class="header__inner">
        <div class="container">
          <div class="row header__row">
            <div class="col-sm-2 col-xs-4">
            <?php if ($site_logo) : ?>
              <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">
                <img src="<?php echo $site_logo; ?>" title="<?php bloginfo('name'); ?>" rel="logo" class="logo">
              </a>
            <?php else : ?>
              <?php bloginfo('name'); ?>
            <?php endif; ?>
            </div><!--/.col-->
            <div class="col-sm-6 col-xs-0">
              <div class="mobile-menu-toggle u-hidden-desktop" id="js-menu-toggle">
                <span class="mobile-menu-toggle__line"></span>
              </div><!--/.mobile-menu-toggle-->
               <div class="nav-wrapper u-visible-desktop">
               <?php primary_nav(); ?>
              </div><!--/.nav-wrapper-->
            </div><!--/.col-->
            <div class="col-sm-4 col-xs-4 end-md start-sm center-xs u-hidden-phone btn-group">
              <?php secondary_nav(); ?>
            </div>
          </div><!--/.row-->
        </div><!--/.container-->
      </div><!--/.header__inner-->
    </header>

    <div class="mobile-menu">
      <?php mobile_nav(); ?>
    </div><!--/.mobile-menu-->
