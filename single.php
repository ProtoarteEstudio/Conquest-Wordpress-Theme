<?php
/**
 * The Template for displaying all single posts.
 *
 * @package conquest
 */

get_header(); ?>

		<article id="primary" class="content-area">
			<?php while ( have_posts() ) : the_post(); ?>
			<?php the_tags( '<div class="tags uk-clearfix"><span class="uk-float-left">Tags</span><ul class="menu inline uk-float-left"><li class="tag first">', '</li><li class="tag">', '</li></ul></div>'); ?> 
				
			<h1 class="post-title"><?php the_title(); ?></h1>

			<p class="post-author">By <?php the_author_posts_link(); ?><small> on <?php the_date(); ?> <i class="foundicon-chat"></i><a href="mailto:<?php print get_the_author_meta( 'user_email' ); ?> " target="_blank" class="author-social">Email</a> <i class="foundicon-twitter"></i><a href="http://twitter.com/<?php print get_the_author_meta( 'twitter' ); ?>" target="_blank" class="author-social">twitter</a></small></p>

			<div class="comment-count large">
				<a href="#comments"><?php comments_number( '<span class="count">0</span> <span class="label uk-hidden-small">comments</span>', '<span class="count">1</span> <span class="label uk-hidden-small">comment</span>', '<span class="count">%</span> <span class="label uk-hidden-small">comments</span>' ); ?></a>
			</div>
			<?php endwhile; ?>

			<div class="uk-grid">
				<div class="post-content uk-width-large-4-6">
				<?php while ( have_posts() ) : the_post(); ?>

				<?php conquest_social_sharing( get_the_title(), get_permalink(),  get_the_excerpt() ); ?>

				<?php if ( has_post_thumbnail() ) {
					print '<div class="featured-image">';
				  the_post_thumbnail( 'featured-image' );
				  print '</div>'; 
				} ?>
				<?php the_content(); ?>
				<?php conquest_post_nav(); ?>
				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>
				<?php endwhile; // end of the loop. ?>
				</div>

				<div id="secondary" class="sidebar widget-area uk-width-large-2-6" role="complementary">
				<?php get_sidebar(); ?>
				</div>
			</div>
		</article><!-- #primary -->
<?php get_footer(); ?>