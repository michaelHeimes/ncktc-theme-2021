<?php get_header(); ?>

<!-- Row for main content area -->
<div id="content" role="main" class="row">
	<div class="basic-page-wrapper">
		<div class="small-12 columns">
		
		<?php /* Start loop */ ?>
		<?php while (have_posts()) : the_post(); ?>
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<header>
					<h1 class="entry-title">Featured Student: <?php the_title(); ?></h1>
				</header>
				<div class="entry-content">

					<?php //image vars
						$image =get_field('featured_student_image');
					?>

					<img src="<?php echo $image; ?>" alt="<?php echo $image['alt']; ?>" style="float: right; display: inline; padding: 0 1rem 2rem 2rem; width: 50%;">
					<?php the_content(); ?>
				</div>
				<footer style="padding-bottom: 1.5rem;">
					<p class="entry-tags"><?php the_tags(); ?></p>
					<?php edit_post_link('Edit this Post'); ?>
				</footer>
			</article>

		<?php endwhile; // End the loop ?>

		</div>
	</div> <!-- /.basic-page-wrapper -->
</div>
		
<?php get_footer(); ?> 