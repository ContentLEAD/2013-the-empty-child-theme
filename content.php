<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( is_single() ) { ?>

			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>

				<div class="entry-meta">
					<?php twentythirteen_entry_meta(); ?>
					<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .entry-meta -->
			</header><!-- .entry-header -->

		<?php } else { ?>

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="entry-thumbnail">
				<?php the_post_thumbnail(); ?>
				</div>
			<?php endif; ?>

			<header class="entry-header">
				<h1 class="entry-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h1>

				<div class="entry-meta">
					<?php twentythirteen_entry_meta(); ?>
					<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .entry-meta -->
			</header><!-- .entry-header -->

		<?php } ; // is_single() ?>


	<?php if ( is_single() ) { ?>
	<div class="entry-content">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="entry-thumbnail">
			<?php the_post_thumbnail(); ?>
			</div>
		<?php endif; ?>

		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
	</div><!-- .entry-content -->
	<?php } else { ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<?php } ?>


	<footer class="entry-meta">
		<?php if ( comments_open() && ! is_single() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'twentythirteen' ) . '</span>', __( 'One comment so far', 'twentythirteen' ), __( 'View all % comments', 'twentythirteen' ) ); ?>
			</div><!-- .comments-link -->
		<?php endif; // comments_open() ?>

		<?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
			<?php get_template_part( 'author-bio' ); ?>
		<?php endif; ?>
	</footer><!-- .entry-meta -->
</article><!-- #post -->