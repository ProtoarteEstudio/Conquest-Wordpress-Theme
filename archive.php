<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package conquest
 */

get_header(); ?>

	<div class="uk-grid">
		<div id="primary" class="content-area uk-width-large-4-6">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php conquest_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</div>
		<div id="secondary" class="sidebar widget-area uk-width-large-2-6" role="complementary">
			<?php get_sidebar(); ?>
		</div>
	</div>
<?php get_footer(); ?>
