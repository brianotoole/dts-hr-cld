<?php
// Section CTA-Home

//Custom Field Group == Page: Home
$cta_heading = get_field('cta_heading');
$cta_button_text = get_field('cta_button_text');
$cta_button_link = get_field('cta_button_link');
?>

<section class="section section--cta-home section--secondary">
  <div class="container">
    <div class="row cta">
      <div class="col-md-4 col-sm-12 col-xs-12">
        <h6 class="cta__title">See Our Solution In Action</h6>
      </div>
      <div class="col-md-8 col-sm-12 col-xs-12">
        <div class="cta__form">
          <?php echo do_shortcode('[gravityform id=1 title=false description=false ajax=true]'); ?>
        </div>
      </div>
    </div>
  </div>
</section>