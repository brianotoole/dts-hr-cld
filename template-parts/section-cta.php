<?php
// Field Group == Component: CTA
$cta_heading = get_field('cta_heading');
$cta_button = get_field('cta_button');
?>
<?php if ($cta_heading) : ?>
<section class="section section--pad-md-even section--tertiary section--cta">
 <div class="col-xs-12 cta u-text-center">
  <div class="cta__inner">
    <div class="container">
      <div class="cta__heading-wrapper">
        <h2 class="cta__title"><?php echo $cta_heading; ?></h2>
      </div>
    </div>
    <a href="<?php if (!empty($cta_button['url'])) { echo $cta_button['url']; } else { echo get_site_url() . '/contact'; } ?>" class="btn btn--primary"><?php echo $cta_button['title']; ?></a>
  </div>
  </div>
</section>
<?php endif; ?>
