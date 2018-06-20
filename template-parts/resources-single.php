<?php // Resource single content

if ( have_posts() ) {
  while ( have_posts() ) { ?>
  <section class="section section--single">
  <div class="container">
    <div class="row">
      <div class="single__content col-xs-12">
      <?php  the_post();
        the_content();
      } ?>
        <?php $single_btn = get_field('resource_single_button'); ?>
        <?php if ($single_btn) : ?>
        <div class="single__button u-text-center u-pad-top">
          <a class="btn btn--primary" target="<?php echo $single_btn['target']; ?>"><?php echo $single_btn['title']; ?>
          </a>
        </div><!--/.single__button-->
        <?php endif; ?>
      </div><!--/.col-->
    </div><!--/.row-->
  </div><!--/.container-->
  </section>

<?php } ?>
