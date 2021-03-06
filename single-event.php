<?php get_header(); ?>

<!-- Row for main content area -->
<div id="content" role="main" class="row">
	<div class="page-temp-wrapper" style="padding-top: 2.5rem;">
		<div class="small-12 large-8 columns">
		
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
				<footer>
					<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'reverie'), 'after' => '</p></nav>' )); ?>
					<p class="entry-tags"><?php the_tags(); ?></p>
					<?php edit_post_link('Edit this Post'); ?>
				</footer>
			</article>
			<?php comments_template(); ?>
		<?php endwhile; // End the loop ?>

		</div>
		<?php get_sidebar(); ?>
	</div> <!-- /.page-temp-wrapper -->
</div>
		
<?php get_footer(); ?>