<?php
/**
 * conquest widgets
 *
 * @package conquest
 */

/*
 * Latest articles widget
 * Displays the latest articles with featured image thumbnail
 */
class Conquest_Latest_Articles extends WP_Widget {

  public function __construct() {
    // widget actual processes
  }

  public function widget( $args, $instance ) {
    // outputs the content of the widget
  }

  public function form( $instance ) {
    // outputs the options form on admin
  }

  public function update( $new_instance, $old_instance ) {
    // processes widget options to be saved
  }
}
add_action( 'widgets_init', function(){
     register_widget( 'Conquest_Latest_Articles' );
});

