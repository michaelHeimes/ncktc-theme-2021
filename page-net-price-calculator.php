<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="row" id="content" role="main">
	<div class="small-12 columns">
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="endivy-title"><?php the_title(); ?></h1>
				<?php // reverie_endivy_meta(); ?>
			</header>
			<div class="endivy-content">
				<?php the_content(); ?>
				
                <iframe src="<?php echo get_template_directory_uri(); ?>/NetPriceCalculator/npcalc.htm" width="100%" height="800px"></iframe>



			</div>
			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'reverie'), 'after' => '</p></nav>' )); ?>
			</footer>
		</article>
	<?php endwhile; // End the loop ?>
	</div>
	</div>
		
<?php get_footer(); ?>