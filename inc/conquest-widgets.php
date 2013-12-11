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
class Conquest_Latest_Articles_Widget extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    parent::__construct(
      'conquest_latest_articles_widget', // Base ID
      __('Conquest Latest Articles', 'text_domain'), // Name
      array( 'description' => __( 'Displays the latest articles with featured image', 'text_domain' ), ) // Args
    );
    add_action( 'save_post', array($this, 'flush_widget_cache') );
    add_action( 'deleted_post', array($this, 'flush_widget_cache') );
    add_action( 'switch_theme', array($this, 'flush_widget_cache') );
  }


  function widget($args, $instance) {
    $cache = wp_cache_get('widget_recent_posts', 'widget');

    if ( !is_array($cache) )
        $cache = array();

    if ( ! isset( $args['widget_id'] ) )
        $args['widget_id'] = $this->id;

    if ( isset( $cache[ $args['widget_id'] ] ) ) {
        echo $cache[ $args['widget_id'] ];
        return;
    }

    ob_start();
    extract($args);

    $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Latest articles' );
    $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
    $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 10;
    if ( ! $number )
        $number = 10;
    $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

    $r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
    if ($r->have_posts()) :
    ?>
    <?php echo $before_widget; ?>
    <?php if ( $title ) echo $before_title . $title . $after_title; ?>
    <ul>
    <?php while ( $r->have_posts() ) : $r->the_post(); ?>
        <li class="post">
          <a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ? get_the_title() : get_the_ID() ); ?>" class="uk-clearfix">
          <?php if (has_post_thumbnail( $post->ID ) ): ?>
          <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumb-tiny' ); ?>
          <span class="featured-image uk-float-left">
            <img src="<?php echo $image[0]; ?>" alt="">
             <?php comments_number( '<span class="comment-count">0</span>', '<span class="comment-count">1</span>', '<span class="comment-count">%</span>' ); ?>
          </span>
          <?php endif; ?>
          <h4><?php the_title(); ?></h4></a>
        </li>
    <?php endwhile; ?>
    </ul>
    <?php echo $after_widget; ?>
    <?php
    // Reset the global $the_post as this query will have stomped on it
    wp_reset_postdata();

    endif;

    $cache[$args['widget_id']] = ob_get_flush();
    wp_cache_set('widget_recent_posts', $cache, 'widget');
  }

  function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['number'] = (int) $new_instance['number'];
    $this->flush_widget_cache();

    $alloptions = wp_cache_get( 'alloptions', 'options' );
    if ( isset($alloptions['widget_recent_entries']) )
        delete_option('widget_recent_entries');

    return $instance;
  }

  function flush_widget_cache() {
    wp_cache_delete('widget_recent_posts', 'widget');
  }

  function form( $instance ) {
    $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
    $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
    ?>
    <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

    <p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
    <input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
    <?php
  }
}
add_action( 'widgets_init', function(){
     register_widget( 'Conquest_Latest_Articles_Widget' );
});

