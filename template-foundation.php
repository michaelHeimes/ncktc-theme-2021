<?php
/*
	Template Name: Foundation Pages
*/
?>
<?php get_header(); ?>

<?php include 'interior-page-header-template.php'; ?>

<!-- Row for main content area -->
<div id="content-interior">
	<div class="interior-main" role="main">

		<aside class="interior-menu">
			<?php wp_nav_menu( array(
				'menu'			=> 'foundation',
				'container_id'	=> 'foundation-menu',
				'fallback_cb'	=> false,
				) ); 
			?>
		</aside>

		<div class="interior-main__content">
			<?php while (have_posts()) : the_post(); ?>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
			<?php endwhile; ?>
		</div>

	</div> <!-- /.interior-main -->
</div> <!-- /#content -->
<?php get_footer(); ?>