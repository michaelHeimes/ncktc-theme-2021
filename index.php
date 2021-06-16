<?php get_header(); ?>

<!-- Row for main content area -->
<div id="content" class="row">
	<div class="small-12 large-8 columns" role="main">
	
	<?php
	// hijack the posts post type to force it to sort in chronological order
	$args = new WP_Query([
		'post_type' => 'post',
		'posts_per_page' => -1,
		'ignore_sticky_posts' => true, // required - these interfere with the whole query
		'orderby' => 'date',
		'order' => 'DESC'
	]);
	
	if ( $args->have_posts() ) : ?>
		<?php while ( $args->have_posts() ) : $args->the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>
		
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		
	<?php endif; ?>

	<?php if ( function_exists('reverie_pagination') ) { reverie_pagination(); } else if ( is_paged() ) { ?>
		<nav id="post-nav">
			<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'reverie' ) ); ?></div>
			<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'reverie' ) ); ?></div>
		</nav>
	<?php } ?>

	</div>
	<?php get_sidebar(); ?>
		</div>
<?php get_footer(); ?>