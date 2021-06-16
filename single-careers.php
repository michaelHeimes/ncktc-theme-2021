<?php get_header(); ?>

<!-- Row for main content area -->
<div id="content" role="main" class="row">
	<div class="small-12 medium-8 columns">
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
			<div class="entry-content">
				<h4>Location: <?php the_field('careers_campus'); ?></h4>
				<?php the_field('careers_description'); ?>
			</div>
			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'reverie'), 'after' => '</p></nav>' )); ?>
				<p class="entry-tags"><?php the_tags(); ?></p>
				<?php edit_post_link('Edit this Job Opening'); ?>
			</footer>
	<?php endwhile; // End the loop ?>

	</div>
	<div class="small-12 medium-4 columns panel">
		<h4>Other Openings at NCK Tech</h4>
		<hr />

		<?php $args = array(
				        'post_type' => 'careers',
						'post__not_in' => array(get_the_ID())
	    			); 
				$loop = new WP_Query( $args );
				if ( $loop->have_posts() ) : ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

					<div class="career-post"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>

				<?php endwhile; else : echo '<p>Sorry, no other openings at this time.</p>'; endif; wp_reset_postdata(); ?>
	</div>
</div>
		
<?php get_footer(); ?>