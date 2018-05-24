<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<?php
//Custom Field Group == Site Options
$site_logo = get_field('site_logo', 'option');
?>


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
            <div class="col-sm-4 col-xs-4 start-sm center-xs u-hidden-phone btn-group">
              <?php secondary_nav(); ?>
            </div>
          </div><!--/.row-->
        </div><!--/.container-->
      </div><!--/.header__inner-->
    </header>

    <div class="mobile-menu">
      <?php mobile_nav(); ?>
    </div><!--/.mobile-menu-->
