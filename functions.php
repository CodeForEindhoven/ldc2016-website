<?php
/**
 * Theme: ldc2016
 *
 * Functions file for child theme. If you want to make simpler changes than what is
 * included here, consider using the Flat Bootstrap Child theme that is included with the
 * parent theme, Flat Bootstrap.
 *
 * @package flat-bootstrap
 */

$xsbf_theme_options = array(
  'background_color' => 'ffffff',
  'touch_support' => true,
  'fontawesome' => true,
  'custom_header_location' => 'header',
  'image_keyboard_nav' => false,
  'sample_widgets' => false,
  'sample_footer_menu' => false,
  'testimonials' => false // requires Jetpack plugin
);

/*
 * ALSO HOOK INTO PRINT_STYLES TO OVERRIDE WHAT CSS GETS LOADED
 */
add_action('wp_print_styles', 'xsbf_dev_print_styles');
function xsbf_dev_print_styles() {
  wp_dequeue_style('bootstrap');
  wp_deregister_style('bootstrap');
  wp_register_style('bootstrap', '//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css', array(), '3.1.0', 'all' );
  wp_enqueue_style( 'bootstrap');
  wp_dequeue_style('theme-flat');
}

xsbf_load_includes();
function xsbf_load_includes() {
  require_once get_template_directory() . '/inc/template-tags.php';
  require_once get_template_directory() . '/inc/theme-functions.php';
  require_once get_template_directory() . '/inc/bootstrap-navmenu.php';
}

add_filter('xsbf_credits', 'xsbf_dev_credits');
function xsbf_dev_credits ( $site_credits ) {
  $theme = wp_get_theme();
  $site_credits = sprintf( __( '&copy; %1$s %2$s. Theme by %3$s and %4$s.', 'xtremelysocial' ),
    date ( 'Y' ),
    '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . get_bloginfo( 'name' ) . '</a>',
    '<a href="http://xtremelysocial.com/" rel="designer">XtremelySocial</a>',
    '<a href="' . $theme->get( 'ThemeURI' ) . '" rel="designer">' . $theme->get( 'Author' ) . '</a>'
  );
  return $site_credits;
}

add_filter( 'rwmb_meta_boxes', 'your_prefix_meta_boxes' );
function your_prefix_meta_boxes( $meta_boxes ) {
  $meta_boxes[] = array(
    'title' => __( 'Tech Link', 'textdomain' ),
    'post_types' => 'post',
    'fields' => array(
      array(
        'id' => 'techllink',
        'name' => __( 'Link to technical documentation', 'textdomain' ),
        'type' => 'url',
      )
    ),
  );
  return $meta_boxes;
}
