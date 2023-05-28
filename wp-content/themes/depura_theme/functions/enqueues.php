<?php

/**
 * @file
 */

/**
 * Add Script dependencies for Theme.
 */
function dep_enqueues() {

  /* Styles */

  wp_register_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css', FALSE, '5.0.1', NULL);
  wp_enqueue_style('bootstrap-css');

  wp_register_style('material-css', 'https://fonts.googleapis.com/icon?family=Material+Icons', FALSE, '1.8.1', NULL);
  wp_enqueue_style('material-css');

  wp_register_style('font-family', 'https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;700&display=swap', FALSE, NULL);
  wp_enqueue_style('font-family');

  wp_register_style('fa-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css', FALSE, '6.1.1', NULL);
  wp_enqueue_style('fa-css');

  wp_register_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', FALSE, '1.8.1', NULL);
  wp_enqueue_style('slick-css');

  wp_register_style('slick-theme-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', FALSE, '1.8.1', NULL);
  wp_enqueue_style('slick-theme-css');

  wp_register_style('style-css', get_template_directory_uri() . '/assets/css/theme.css', FALSE, NULL);
  wp_enqueue_style('style-css');

  /* Scripts */

  wp_enqueue_script('jquery');
  /* Note: this above uses WordPress's
  onboard jQuery. You can enqueue
  other pre-registered scripts from WordPress too. See:
  https://developer.wordpress.org/reference/functions/wp_enqueue_script/#Default_Scripts_Included_and_Registered_by_WordPress */

  wp_register_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js', FALSE, NULL, TRUE);
  wp_enqueue_script('bootstrap-js');

  wp_register_script('slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', FALSE, '1.8.1', TRUE);
  wp_enqueue_script('slick-js');

  wp_register_script('build-js', get_template_directory_uri() . '/assets/js/theme.js', FALSE, NULL, TRUE);
  wp_enqueue_script('build-js');

  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

}

add_action('wp_enqueue_scripts', 'dep_enqueues', 100);

/**
 * Add sha keyScript on footer.
 */
function add_style_attributes($html, $handle) {
  if ('bootstrap-css' === $handle) {
    return str_replace("media='all'", "media='all' integrity='sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x' crossorigin='anonymous'", $html);
  }

  return $html;
}

add_filter('style_loader_tag', 'add_style_attributes', 10, 2);

/**
 * Add sha keyScript on footer.
 */
function add_script_attributes($html, $handle) {

  if ('bootstrap-js' === $handle) {
    return str_replace("id='bootstrap-js-js'", "id='bootstrap-js-js' integrity='sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4' crossorigin='anonymous'", $html);
  }

  return $html;
}

add_filter('script_loader_tag', 'add_script_attributes', 11, 3);







