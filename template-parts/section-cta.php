<?php
// Field Group == Component: CTA
$cta_heading = get_field('cta_heading');
$cta_button = get_field('cta_button');
$cta_form = get_field('cta_form_embed')
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
    <a id="js-expand" class="btn btn--primary"><?php echo $cta_button; ?></a>
    <div class="cta__form" style="display: none;"><?php echo $cta_form; ?></div>
  </div>
  </div>
</section>
<?php endif; ?>
