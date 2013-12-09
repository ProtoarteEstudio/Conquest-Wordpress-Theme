<?php
/**
 * The template for displaying the footer.
 *
 * @package conquest
 */
?>

    </div><!-- #content inner -->
	</div><!-- #content -->

	<footer class="site-footer uk-container uk-container-center" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'conquest_credits' ); ?>
			<a href="http://wordpress.org/" rel="generator"><?php printf( __( 'Proudly powered by %s', 'conquest' ), 'WordPress' ); ?></a>
		</div>
	</footer>

<?php wp_footer(); ?>

<script>
jQuery(document).ready(function ($) {
$('#mobile-nav .menu').dcAccordion({
  eventType: 'click',
  autoClose: true,
  saveState: false,
  disableLink: true,
  showCount: false,
  speed: 'fast'
});
});
</script>

</body>
</html>