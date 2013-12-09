<?php 
function register_my_menus() {
  register_nav_menus(
    array(
      'primary-menu' => __( 'Primary Menu' ),
      'extra-menu-1' => __( 'Footer Menu 1' ),
      'extra-menu-2' => __( 'Footer Menu 2' )
    )
  );
}
add_action( 'init', 'register_my_menus' );