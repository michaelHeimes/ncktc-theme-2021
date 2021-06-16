<?php
/*
Template Name: Basic Interior Page
*/
get_header(); ?>

<!-- Row for main content area -->
<?php if(!is_page(1062) && !is_page(9201) ) { ?>
	<div id="content" class="row">
		<div class="basic-page-wrapper">
			<div class="small-12 columns" role="main">	
				<?php while (have_posts()) : the_post(); ?>
					<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
						<header>
							<h1 class="entry-title"><?php the_title(); ?></h1>
							<?php // reverie_entry_meta(); ?>
						</header>

						<div class="entry-content">
							<?php the_content(); ?>
						</div>
						
					</article>
				<?php endwhile; ?>
			</div>
		</div>
	</div> <!-- /.page-temp-wrapper -->
<?php } ?>

<!-- Application page -->
<?php
	if( is_page(1062) ) { ?>
	<style> #content:before { box-shadow: none; } </style>

	<div id="content">
		<div class="apply-main">
			<h1><?php the_title(); ?></h1>

			<div class="apply-main__wrapper">
				<p><?php the_content(); ?></p>
				<?php gravity_form( 23, false, false, false, '', false ); ?>
			</div>
		</div>
	</div>
<?php } ?>

<!-- Will be removed - for NCK to test the reworked application TEMP PAGE -->
<?php
	if( is_page(9201) ) { ?>
	<style> #content:before { box-shadow: none; } </style>

	<div id="content">
		<div class="apply-main">
			<h1><?php the_title(); ?></h1>

			<div class="apply-main__wrapper">
				<p><?php the_content(); ?></p>
				<?php gravity_form( 92, false, false, false, '', false ); ?>
			</div>
		</div>
	</div>
<?php } ?>
		
<?php get_footer(); ?>