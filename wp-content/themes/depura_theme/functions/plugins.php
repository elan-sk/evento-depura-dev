<?php
// 1. Define ACF PATH
function configure_path_acf($path) {

    // actualizar el path
    $path = get_stylesheet_directory() . '/includes/acf/';

    return $path;

}

add_filter('acf/settings/path', 'configure_path_acf');

// 2. Configure folder
function configure_folder_acf( $dir ) {

    // actualizar el directorio
    $dir = get_stylesheet_directory_uri() . '/includes/acf/';

    return $dir;

}
add_filter('acf/settings/dir', 'configure_folder_acf');

// 3. hide from admin
//add_filter('acf/settings/show_admin', '__return_false');

// 4. Include ACF
include_once( get_stylesheet_directory() . '/includes/acf/acf.php' );
