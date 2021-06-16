<?php get_header(); ?>

<!-- Row for main content area -->
<div id="content" class="row">
	<div class="page-temp-wrapper" style="padding-top: 2.5rem;">
		<div class="small-12 large-8 columns" role="main">
		
		<?php /* Start loop */ ?>
		<?php while (have_posts()) : the_post(); ?>
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<header>
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php // reverie_entry_meta(); ?>
				</header>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>

				<!-- Improvement Suggestion Form - Thank You Message (bottom)-->
				<?php if( is_page(7878) ) { ?>
					<span class="h4-heading"><?php echo get_field('improvement_form_thank_you'); ?></span>
					<p class="improv-para"><?php echo get_field('improvement_form_paragraph'); ?></p>
				<?php } ?>

				<footer>
					<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'reverie'), 'after' => '</p></nav>' )); ?>
				</footer>
			</article>
		<?php endwhile; // End the loop ?>

		</div>
		<?php get_sidebar(); ?>
	</div><!-- End of template wrapper -->
</div>
		
<?php get_footer(); ?>