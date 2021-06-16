<?php get_header(); ?>

<!-- Row for main content area -->
	<div id="content" class="row">
	<div class="small-12 column" role="main">
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
			<header>
				<h1 class="entry-title column"><?php the_title(); ?></h1>
			</header>
			<div class="openings row" style="margin-bottom: 2rem;">
				<?php $args = array( 
				        'post_type' => 'careers',
				        'order' => 'ASC',
				        'orderby' => 'title',
				        'meta_query' => array( array(
									            'key' => 'careers_campus',
									            'value' => 'beloit',
									            'compare' => 'LIKE'
										        )
										    )		
	    			); 
				$loop = new WP_Query( $args );
				if ( $loop->have_posts() ) : ?>
					<div class="small-12 medium-6 column">
					<h2>Beloit Openings</h2>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

					<div class="career-post"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>

				<?php endwhile; echo '<hr class="show-for-small-only" /></div>'; endif; wp_reset_postdata(); ?>

				<?php $args = array(
				        'post_type' => 'careers',
				        'order' => 'ASC',
				        'orderby' => 'title',
				        'meta_query' => array( array(
									            'key' => 'careers_campus',
									            'value' => 'hays',
									            'compare' => 'LIKE'
										        )
										    )		
	    			); 
				$loop = new WP_Query( $args );
				if ( $loop->have_posts() ) : ?>
					<div class="small-12 medium-6 column">
					<h2>Hays Openings</h2>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

					<div class="career-post"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>

				<?php endwhile; echo '<hr class="show-for-small-only" /></div>'; endif; wp_reset_postdata(); ?>

   			</div>
			<div class="entry-content column">
				<?php the_content(); ?>
			</div>
	<?php endwhile; // End the loop ?>

	</div>
	</div>
		
<?php get_footer(); ?>