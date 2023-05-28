<?php

function dep_widgets_init() {

  /*
  Sidebar (one widget area)
   */
  register_sidebar( array(
    'name'            => __( 'Sidebar', 'dep' ),
    'id'              => 'sidebar-widget-area',
    'description'     => __( 'The sidebar widget area', 'dep' ),
    'before_widget'   => '<section class="%1$s %2$s">',
    'after_widget'    => '</section>',
    'before_title'    => '<h4>',
    'after_title'     => '</h4>',
  ) );

  /*
  Footer (three widget areas)
   */
  register_sidebar( array(
    'name'            => __( 'Footer Columns', 'dep' ),
    'id'              => 'footer-widget-columns',
    'description'     => __( 'The footer columns area', 'dep' ),
    'before_widget'   => '<div class="%1$s %2$s col-lg-6 site-footer__column">',
    'after_widget'    => '</div>',
    'before_title'    => '<h4>',
    'after_title'     => '</h4>',
  ) );

  /*
  Footer (Menu)
   */
  register_sidebar( array(
    'name'            => __( 'Footer Menu', 'dep' ),
    'id'              => 'footer-widget-menu',
    'description'     => __( 'The footer menu area', 'dep' ),
    'before_widget'   => '<div class="%1$s %2$s site-footer__menu">',
    'after_widget'    => '</div>',
    'before_title'    => '<h4>',
    'after_title'     => '</h4>',
  ) );

  /*
  Footer (Social)
   */
  register_sidebar( array(
    'name'            => __( 'Footer Social', 'dep' ),
    'id'              => 'footer-widget-social',
    'description'     => __( 'The footer social area', 'dep' ),
    'before_widget'   => '<div class="%1$s %2$s site-footer__social">',
    'after_widget'    => '</div>',
    'before_title'    => '<h4>',
    'after_title'     => '</h4>',
  ) );

  /*
  Footer (Copyright)
   */
  register_sidebar( array(
    'name'            => __( 'Footer Copyright', 'dep' ),
    'id'              => 'footer-widget-copyright',
    'description'     => __( 'The footer copyright widget area', 'dep' ),
    'before_widget'   => '<div class="%1$s %2$s col-lg site-footer__bottom-column">',
    'after_widget'    => '</div>',
    'before_title'    => '<h4>',
    'after_title'     => '</h4>',
  ) );

}
add_action( 'widgets_init', 'dep_widgets_init' );
