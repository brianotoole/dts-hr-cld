<section class="section footer">
 <div class="container">
   <div class="footer__top">
     <?php footer_nav(); ?>
   </div><!--/.footer__top-->
  
   <div class="footer__bottom">
     <div class="footer__bottom-logo u-visible-desktop">
       <?php $site_logo = get_field('site_logo', 'option'); ?>
       <?php if ($site_logo) : ?>
          <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">
            <img src="<?php echo $site_logo; ?>" title="<?php bloginfo('name'); ?>" rel="logo" class="logo">
          </a>
        <?php else : ?>
          <?php bloginfo('name'); ?>
        <?php endif; ?>
      </div><!--/.footer__bottom-logo-->
     <div class="footer__bottom-copy">&copy; <?php echo bloginfo('name'); ?> <?php echo the_date('Y'); ?></div>
     <div class="footer__bottom-menu">
       <ul>
         <li><a href="<?php echo home_url(); ?>/sitemap">Sitemap</a></li>
         <li><a href="<?php echo home_url(); ?>/terms">Terms of Use</a></li>
         <li><a href="<?php echo home_url(); ?>/privacy">Privacy Policy</a></li>
       </ul>
     </div><!--/.footer__bottom-menu-->
     <div class="footer__bottom-badge">
       <img src="<?php echo get_template_directory_uri(); ?>/dist/img/logo-aicpa.png">
       <div class="footer__bottom-logo u-hidden-desktop">
       <?php $site_logo = get_field('site_logo', 'option'); ?>
       <?php if ($site_logo) : ?>
          <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">
            <img src="<?php echo $site_logo; ?>" title="<?php bloginfo('name'); ?>" rel="logo" class="logo">
          </a>
        <?php else : ?>
          <?php bloginfo('name'); ?>
        <?php endif; ?>
      </div><!--/.footer__bottom-logo-->
     </div><!--/footer__bottom-badge-->
   </div><!--/.footer__bottom-->

 </div><!--/.container-->
</section>

  <?php wp_footer(); ?>
  </div><!--/#page-->

<script>

var wistiaEmbedSrc = jQuery('.pum-content').find('iframe').attr('src');
jQuery('.pum-close').on('click',function() {
  var wistiaEmbed = jQuery('.pum-content').find('iframe');
  wistiaEmbed.attr('src', '');
  jQuery('.solutions-video').on('click',function() {
      wistiaEmbed.attr('src', wistiaEmbedSrc);
  });
});





// Capterra
var capterra_vkey = 'cc880d56a1ff17c5129509568115807e',
capterra_vid = '2094770',
capterra_prefix = (('https:' == document.location.protocol) ? 'https://ct.capterra.com' : 'http://ct.capterra.com');
(function() {

   var ct = document.createElement('script'); ct.type = 'text/javascript'; ct.async = true;

   ct.src = capterra_prefix + '/capterra_tracker.js?vid=' + capterra_vid + '&vkey=' + capterra_vkey;

   var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ct, s);

})();


// Pardot
piAId = '107012';

piCId = '1293';

 

(function() {

                function async_load(){

                                var s = document.createElement('script'); s.type = 'text/javascript';

                                s.src = ('https:' == document.location.protocol ? 'https://pi' : 'http://cdn') + '.pardot.com/pd.js';

                                var c = document.getElementsByTagName('script')[0]; c.parentNode.insertBefore(s, c);

                }

                if(window.attachEvent) { window.attachEvent('onload', async_load); }

                else { window.addEventListener('load', async_load, false); }

})();



// Addroll
adroll_adv_id = "2SFBVMTLMVA4HP6VVDZD53";

adroll_pix_id = "PNEJS4ZHYZFVNESMYQLMGX";

(function () {

var oldonload = window.onload;

window.onload = function(){

   __adroll_loaded=true;

   var scr = document.createElement("script");

   var host = (("https:" == document.location.protocol) ? "https://s.adroll.com" : "http://a.adroll.com");

   scr.setAttribute('async', 'true');

   scr.type = "text/javascript";

   scr.src = host + "/j/roundtrip.js";

   ((document.getElementsByTagName('head') || [null])[0] ||

    document.getElementsByTagName('script')[0].parentNode).appendChild(scr);

   if(oldonload){oldonload()}};

}());

</script>
<script type="text/javascript"> _linkedin_data_partner_id = "57492"; </script><script type="text/javascript"> (function(){var s = document.getElementsByTagName("script")[0]; var b = document.createElement("script"); b.type = "text/javascript";b.async = true; b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js"; s.parentNode.insertBefore(b, s);})(); </script> <noscript> <img height="1" width="1" style="display:none;" alt="" src="https://dc.ads.linkedin.com/collect/?pid=57492&fmt=gif" /> </noscript>
</body>
</html>