<?php
	/*
		Template Name: Highschool Pages
	*/
?>
<?php get_header(); ?>

<?php include 'interior-page-header-template.php'; ?>

<!-- Row for main content area -->
<div id="content-interior">
	<div class="interior-main" role="main">

		<aside class="interior-menu">
			<h5 class="hs-menu-header">Counselor Resources</h5>
			<?php wp_nav_menu( array(
				'menu'			=> 'hs-counselor-resources',
				'container_id'	=> 'hs-counselor-menu',
				'fallback_cb'	=> false,
				) );
			?>

			<h5 class="hs-menu-header">Parent Resources</h5>
			<?php wp_nav_menu( array(
				'menu'			=> 'hs-parent-resources',
				'container_id'	=> 'hs-parent-menu',
				'fallback_cb'	=> false,
				) );
			?>
		</aside>

		<div class="interior-main__content">
			<?php while ( have_posts() ) : the_post(); ?>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
			<?php endwhile; ?>
		</div>

	</div> <!-- /.interior-main -->
</div> <!-- /#content-interior -->
<?php get_footer(); ?>