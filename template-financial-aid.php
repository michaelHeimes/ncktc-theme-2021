<?php
/*
	Template Name: Financial Aid Pages
*/
?>
<?php get_header(); ?>

<?php include 'interior-page-header-template.php'; ?>

<div id="content-interior">
	<div class="interior-main" role="main">

		<aside class="interior-menu">
			<?php wp_nav_menu( array(
				'menu'			=> 'financial-aid',
				'container_id'	=> 'financial-aid-menu',
				'fallback_cb'	=> false,
				) );
			?>
		</aside>

		<?php if( !is_page(377) ): ?>
			<div class="interior-main__content">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				<?php endwhile; ?>
			</div> <!-- /.[__content] -->
		<?php endif; ?>

		
		<?php if( is_page(377) ): ?>
			<div class="interior-main__content" style="max-width: 45rem;">
				<p class="scholarship-p"> <?php echo get_field('intro_paragraph'); ?> </p>

				<?php if( have_rows('scholarships_section') ):
					while( have_rows('scholarships_section') ) : the_row();

					// acf vars
					$title = get_sub_field('scholarship_name');
					$icon = get_sub_field('scholarship_icon');
					$info = get_sub_field('scholarship_info_text');
					?>
					<div class="scholarship-container">

						<div class="icon-links">
							<img src="<?php echo $icon['url']; ?>" alt="Scholarship Icon">
							<br>

							<?php if( have_rows('additional_links') ):
								while( have_rows('additional_links') ) : the_row();

								// acf vars
								$al_text = get_sub_field('link_text');
								$al_link = get_sub_field('link_url');
								?>

								<a class="learn-more" href="<?php echo $al_link; ?>"> <?php echo $al_text; ?> </a><br>
							<?php endwhile; ?>
							<?php endif; ?>
						</div>

						<div class="text-content">
							<h4><?php echo $title; ?></h4>
							<p><?php echo $info; ?></p>
						</div>

					</div> <!-- /.scholarship-container -->
				<?php endwhile; ?>
				<?php endif; ?>
			</div> <!-- /.[__content] -->
		<?php endif; ?>

	</div> <!-- /.interior-main -->
</div> <!-- /#content-interior -->

<?php get_footer(); ?>