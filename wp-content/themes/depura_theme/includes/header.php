<!DOCTYPE html>
<html class="no-js">

<head>
  <title><?php wp_title('•', true, 'right'); ?></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <nav class="main-menu main-menu--home navbar-expand-lg fixed-top main-menu js-menu no-gutters">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 main-menu-brand">
            <a class="main-menu-brand__logo" href="#">Logo</a>
        </div>
        <div class="col-lg-6 main-menu-menu">
          <?php
            wp_nav_menu(
              array(
                'theme_location'    => 'menu-main',
                'depth'             => 0,
                'menu_class'        => 'nav navbar-nav main-menu-menu__nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker()
              )
            );
            ?>
        </div>
      </div>
    </div>
  </nav>

  <div class="modal main-menu--home__toggler-modal" id="Modal-menu-close" tabindex="-1" aria-labelledby="Modal-menu-close" aria-hidden="false">
    <div class="modal-dialog main-menu--home__toggler-modal-dialog fade-in-right d-flex flex-column" role="document">
      <button type="button" class="button-close--white main-menu--home__toggler-modal-close" data-bs-dismiss="modal" aria-label="Close">
        <span></span>
      </button>
      <div class="menu-modal">
        <?php
        wp_nav_menu(
          array(
            'theme_location'    => 'menu-main',
            'depth'             => 0,
            'menu_class'        => 'nav navbar-nav main-menu__nav',
            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
            'walker'            => new wp_bootstrap_navwalker()
          )
        );
        ?>
      </div>
      <div class="language">
        <?php
        wp_nav_menu(
          array(
            'theme_location'    => 'select-lang',
            'depth'             => 0,
            'menu_class'        => 'nav navbar-nav',
            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
            'walker'            => new wp_bootstrap_navwalker()
          )
        );
        ?>
      </div>
    </div>

  </div>
  <div id="searcher-post-answers">
  <!--
Site Title
==========
If you are displaying your site title in the "brand" link in the Bootstrap navbar,
then you probably don't require a site title. Alternatively you can use the example below.
See also the accompanying CSS example in css/bst.css .

<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h1 id="site-title">
        <a class="text-muted" href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a>
      </h1>
    </div>
  </div>
</div>
-->
