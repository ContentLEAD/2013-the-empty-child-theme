<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>
<br style="clear:both;"/>
		</div><!-- #main -->
	</div><!-- #page -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php get_sidebar( 'main' ); ?>
		<div class="site-info"><p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p></div>
	</footer><!-- #colophon -->

	<?php wp_footer(); ?>

</body>
</html>