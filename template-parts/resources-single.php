<?php // Resource single content
?>

  <section class="section section--single">
  <div class="container">
    <div class="row">
      <div class="single__content col-sm-8 col-sm-offset-2 col-xs-12">
      <?php the_content(); ?>
        <?php $single_btn = get_field('resource_single_button'); ?>
        <?php if ($single_btn) : ?>
        <div class="single__button u-text-center u-pad-top">
          <a class="btn btn--primary" target="<?php echo $single_btn['target']; ?>"><?php echo $single_btn['title']; ?>
          </a>
        </div><!--/.single__button-->
        <?php endif; ?>
      </div><!--/.col-->
    </div><!--/.row-->
    <?php if (get_field('resource_infographic')) : ?>
    <div class="row row--infographic">
      <div class="col-sm-8 col-sm-offset-2 col-xs-12">
        <img class="infographic__img" src="<?php the_field('resource_infographic'); ?>">
      </div>
    </div>
    <?php endif; ?>
    <?php if (has_type('blog')) : ?>
    <div class="row row--author">
      <div class="col-sm-8 col-sm-offset-2 col-xs-12">
        <div class="author-detail">
          <div class="author-detail__image">
          <?php if($avatar = get_avatar(get_the_author_meta('ID')) !== false): ?>
            <img src="<?php echo $avatar; ?>">
          <?php else: ?>
          <?php endif; ?>
          </div><!-- /.author-detail__image -->
          <div class="author-detail__bio">
            <h6 class="author-detail__bio-heading">Written by <?php the_author(); ?></h6>
            <p class="author-detail__bio-content"><?php the_author_description(); ?></p>
            <i class="fas fa-file"></i>
            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">Read others posts by <?php the_author(); ?></a>
          </div>
        </div><!-- /.author-detail -->
      </div><!-- /.col -->
    </div><!-- /.row -->
    <?php endif; ?>
  </div><!--/.container-->
  </section>


