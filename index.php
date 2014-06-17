<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

	<?php if (is_home()) { ?>
		<?php 
			if (is_home() && !is_paged()) {
				$latest_news_show = 3; // How many latest news posts should be displayed?
				$latest_news_post_ids = array();
				$latest_news_query = new WP_Query(array('posts_per_page' => $latest_news_show, 'paged' => 1)); } ?>

		<h1 class="entry-title">Latest Posts</h1>
	<?php } ?>

		<?php if ( have_posts() ) { ?>
			<?php /* The loop */ ?>
			<?php if ( is_home() && !is_paged() ) {
				while ($latest_news_query->have_posts()) { $latest_news_query->the_post();
				array_push($latest_news_post_ids, $post->ID); ?>
					<?php get_template_part( 'content', get_post_format() );
				} ?>
			<?php } else { 
				while ( have_posts() ) { the_post(); ?>
					<?php get_template_part( 'content', get_post_format() );
				}
			}
		} ?>

			<?php twentythirteen_paging_nav(); ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<br style="clear:both;"/>

<?php if (is_home() && !is_paged()) { ?>
<!-- Start #news-categories -->			
	<?php $categories = get_categories();
		$category_post_show = 2; // How many posts should be displayed in each category?
	?>

	<div id="news-categories">

		<?php foreach($categories as $category) : 
				
		$news_cat_query = new WP_Query(array('cat' => $category->cat_ID, 'post__not_in' => $latest_news_post_ids, 'posts_per_page' => $category_post_show));
		if ($news_cat_query->have_posts()) : ?>

		<div class="news-category" id="category-<?php echo $category->cat_ID; ?>">
			<h2 class="category-title"><a href="<?php echo get_category_link($category->cat_ID)?>" title="Category <?php echo $category->cat_name; ?>"><?php echo $category->cat_name; ?></a></h2> 
			<?php while ($news_cat_query->have_posts()) : $news_cat_query->the_post(); ?>
			<?php array_push($latest_news_post_ids, $post->ID); ?>	
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<h4 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h4>
			<div class="entry-meta">
				<?php twentythirteen_entry_meta(); ?>
				<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->

		<div class="entry-content">

			<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
			<div class="entry-thumbnail">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail(); ?></a>
			</div>
			<?php endif; ?>

			<?php the_excerpt(); ?> <a href="<?php the_permalink(); ?>" rel="bookmark" class="read">Read More</a>
			<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
		</div><!-- .entry-content -->

	</article><!-- #post -->
		<?php endwhile;  // Reset Post Data ?>

		</div>

		<?php endif; ?>
		<?php endforeach; ?><!-- End #news-category -->

	</div>
<!-- End #news-categories -->
	<?php } ?>

<?php get_footer(); ?>