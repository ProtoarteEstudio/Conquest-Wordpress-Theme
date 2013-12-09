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

			<p class="post-author">By <?php the_author_posts_link(); ?> on <?php the_date(); ?></p>

			<div class="comment-count large">
				<a href="#comments"><?php comments_number( '<span class="count">0</span> <span class="label">comments</span>', '<span class="count">1</span> <span class="label">comment</span>', '<span class="count">%</span> <span class="label">comments</span>' ); ?></a>
			</div>
			<?php endwhile; // end of the loop. ?>

			<div class="uk-grid">
				<div class="post-content uk-width-large-4-6">
				<?php while ( have_posts() ) : the_post(); ?>
				<div class="social-sharing">
					<a class="btn btn-tweet" target="_blank" href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=<?php echo get_permalink(); ?>&via=TWITTER-HANDLE"><i class="foundicon-twitter"></i><span class="uk-hidden-small"> Twitter</span></a>
					<a class="btn btn-facebook" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>"><i class="foundicon-facebook"></i><span class="uk-hidden-small"> Facebook</span></a>
					<a class="btn btn-google" target="_blank" href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>"><i class="foundicon-google-plus"></i><span class="uk-hidden-small"> Google+</span></a>
					<a class="btn btn-linkedin" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink(); ?>&title=YOUR-TITLE&summary=YOUR-SUMMARY&source=<?php echo get_permalink(); ?>"><i class="foundicon-linkedin"></i><span class="uk-hidden-small"> LinkedIn</span></a>
					<a class="btn btn-pinterest" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>&description=YOUR-DESCRIPTION&media=YOUR-IMAGE-SRC"><i class="foundicon-pinterest"></i><span class="uk-hidden-small"> Pinterest</span></a>
				</div>
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