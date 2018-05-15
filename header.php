<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div id="page">
    <header class="header">
      <div class="header__inner">
        <div class="container">
          <div class="row header__row">
            <div class="col-sm-2 col-xs-7">
              <a href="<?php echo get_site_url(); ?>" class="logo"><img src="<?php echo get_template_directory_uri() . '/dist/img/logo-color.svg'; ?>" alt="Datis HR Cloud logo" rel="logo" /></a>
            </div><!--/.col-->
            <div class="col-sm-8 col-xs-5">
              <div class="mobile-menu-toggle u-hidden-desktop u-text-right" id="js-menu-toggle">
                <span class="mobile-menu-toggle__line"></span>
              </div><!--/.mobile-menu-toggle-->
               <div class="nav-wrapper u-visible-desktop">
                <?php
                wp_nav_menu( array(
                  'theme_location'  => 'primary',
                  'menu_class'      => 'nav__inner',
                  'container'       => 'div',
                  'container_class' => 'nav'
                ) );
                ?>
              </div><!--/.nav-wrapper-->
            </div><!--/.col-->
            <div class="col-sm-2">
              login 
              watch demo
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
        'container'      => false
      ) );
      ?>
    </div><!--/.mobile-menu-->
