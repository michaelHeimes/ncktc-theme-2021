<?php
/* 
* Template Name: Scholarship Listings Page
*/

get_header(); ?>

<!-- Row for main content area -->
	<div id="content" class="row">
	<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/scholarships.jpg" title="Scholarship Opportunities" alt="Scholarship Opportunities" style="margin-bottom: 1rem;" />
	<div class="small-12 large-8 columns" role="main">
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
<!-- 			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php // reverie_entry_meta(); ?>
			</header> -->
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'reverie'), 'after' => '</p></nav>' )); ?>
			</footer>
		</article>
	<?php endwhile; // End the loop ?>

	</div>
	<?php get_sidebar(); ?>
	</div>
		
<?php get_footer(); ?>