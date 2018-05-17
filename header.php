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
              <img src="<?php echo $site_logo; ?>" title="<?php bloginfo('name'); ?>" rel="logo" class="logo">
            <?php else : ?>
              <?php bloginfo('name'); ?>
            <?php endif; ?>
            </div><!--/.col-->
            <div class="col-sm-6 col-xs-0">
              <div class="mobile-menu-toggle u-hidden-desktop" id="js-menu-toggle">
                <span class="mobile-menu-toggle__line"></span>
              </div><!--/.mobile-menu-toggle-->
               <div class="nav-wrapper u-visible-desktop">
                <?php
                wp_nav_menu( array(
                  'theme_location'  => 'primary',
                  'menu_class'      => 'nav__inner',
                  'container'       => 'div',
                  'container_class' => 'nav-primary'
                ) );
                ?>
              </div><!--/.nav-wrapper-->
            </div><!--/.col-->
            <div class="col-sm-4 col-xs-4 btn-group">
              <a class="btn btn--outline btn--small u-visible-desktop">Login</a> 
              <a class="btn btn--primary btn--small">Watch Demo</a> 
            </div>
          </div><!--/.row-->
        </div><!--/.container-->
      </div><!--/.header__inner-->
    </header>

    <div class="mobile-menu">
      <?php
      wp_nav_menu( array(
        'theme_location' => 'mobile',
        'menu_class'     => '',
        'container'      => div,
        'container_class' => 'nav-mobile'
      ) );
      ?>
    </div><!--/.mobile-menu-->
