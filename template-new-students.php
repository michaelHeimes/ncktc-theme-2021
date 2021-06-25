<?php
/*
	Template Name: New Students Pages
*/
	?>
<?php get_header(); ?>

<?php include 'interior-page-header-template.php'; ?>

<!-- Row for main content area -->
<div id="content-interior">
	<div class="interior-main" role="main">

		<aside class="interior-menu">
			<?php wp_nav_menu( array(
				'menu'			=> 'new-students',
				'container_id'	=> 'new-students-menu',
				'fallback_cb'	=> false,
				) );
			?>
		</aside>

		<div class="interior-main__content">
			<?php while (have_posts()) : the_post(); ?>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			<?php endwhile; // End the loop ?>
		</div>

	</div> <!-- /.interior-main -->
</div> <!-- /#content-interior -->

<?php get_footer(); ?>