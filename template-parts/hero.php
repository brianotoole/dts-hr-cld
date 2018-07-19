<?php
// Hero

//Custom Field Group == Component: Hero
$hero_background = get_field('hero_background');
$hero_heading = get_field('hero_heading');
$hero_subheading = get_field('hero_subheading');
$hero_button = get_field('hero_button');
?>

<div class="hero <?php if (is_page('about')) : echo 'hero--about'; endif; ?>" <?php if ($hero_background) : ?>style="background-image:url('<?php echo $hero_background['url']; ?>')" <?php endif; ?>>
    
    <div class="hero__inner">
      <div class="container">
        <div class="row">
         <?php
          if ( have_posts() ) :
            while ( have_posts() ) :
              the_post();
          ?>
          <div class="col-sm-10 col-xs-12">
            <div class="hero__text">
              <h1 class="hero__heading h2 u-text-bold u-text-upper"><?php the_field('hero_heading'); ?></h1>
              <p class="hero__subheading"><?php the_field('hero_subheading'); ?></p>

              <?php if (get_field('hero_button_type') == 'video') : ?>
                <div class="hero__button">
                  <!--<a class="js-watch-demo btn btn--primary">Watch Video</a>-->
                  <?php $wistia_id = get_field('hero_wistia_id'); ?>
                  <a href="//fast.wistia.net/embed/iframe/<?php echo $wistia_id; ?>?popover=true" class="btn btn--primary wistia-popover[height=388,playerColor=7b796a,width=640]">Watch Video</a>
                  <script src="//fast.wistia.com/assets/external/popover-v1.js" charset="ISO-8859-1"></script>
                </div><!--/.hero__button-->
              <?php elseif (get_field('hero_button_type') != 'video' && get_field('hero_button_link')) : ?>
                <div class="hero__button">
                <?php $hero_button_link = get_field('hero_button_link'); ?>
                  <a class="btn btn--primary" href="<?php echo $hero_button_link['url']; ?>" target="<?php echo $hero_button_link['target']; ?>"><?php echo $hero_button_link['title']; ?></a>
                </div><!--/.hero__button-->
              <?php endif; ?>

            </div><!--/.hero__text-->
          </div><!--/.col-->
          <?php
            endwhile;
          endif;
          ?>
          </div><!--/.row-->
        </div><!--/.container-->
    </div><!--/.hero__inner-->

</div><!--/.hero-->
