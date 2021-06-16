<?php/*
	Template Name: Alumni News
*/
	?>
<?php get_header(); ?>

<?php include 'interior-page-header-template.php'; ?>

<!-- Row for main content area -->
<div id="content-interior">
	<div class="interior-main" role="main">

		<aside class="interior-menu">
			<?php wp_nav_menu( array(
				'menu'			=> 'alumni',
				'container_id'	=> 'alumni-menu',
				'fallback_cb'	=> false,
				) );
			?>
		</aside>

		<div class="interior-main__content">
			<?php while (have_posts()) : the_post(); ?>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>

				<div class="news-entries">
					<?php 
						$args = array( // Start Featured Event
						'category_name' => 'alumni-news',
						'posts_per_page' => 5,
						); 
						$loop = new WP_Query( $args );

						if ( $loop->have_posts() ) {
							while ( $loop->have_posts() ) : $loop->the_post();
								get_template_part( 'content', get_post_format() );
							endwhile;
						} else { echo '<p>Sorry, no news to display at this time.</p>'; } wp_reset_postdata();
					?>

					<!-- Display navigation to next/previous pages when applicable -->
					<?php if ( function_exists('reverie_pagination') ) { reverie_pagination(); } else if ( is_paged() ) { ?>
						<nav id="post-nav">
							<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'reverie' ) ); ?></div>
							<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'reverie' ) ); ?></div>
						</nav>
					<?php } ?>
			
				</div><!-- /.news-entries -->

			<?php endwhile; ?>
		</div> <!-- /.interior-main__content -->
		
	</div> <!-- /.interior-main -->
</div> <!-- /#content-interior -->
<?php get_footer(); ?>