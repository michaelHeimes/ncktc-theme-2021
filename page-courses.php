<?php get_header(); ?>

<!-- Row for main content area -->
<div id="content" class="row">
	<div class="small-12 medium-8 medium-push-4 column" role="main">
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
			<header class="title-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
	<?php endwhile; // End the loop ?>

	</div><!-- End Main -->

	<div class="small-12 medium-4 medium-pull-8 column panel" id="left-sidebar-menu">
		<h2 style="font-weight: normal; color: #bbb; text-align: center;">Online Classes</h2>
		<hr />
		<?php wp_nav_menu( array(
			'menu'			=> 'online-classes',
			'container_id'	=> 'online-classes-menu',
			'fallback_cb'	=> false,
			) 
		); ?>
	</div>
</div>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/left-menu.js"></script>
<?php get_footer(); ?>

