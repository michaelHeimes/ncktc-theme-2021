<?php get_header(); ?>
<style type="text/css">
	article .fa:before {
		width: 2rem;
		display: none;
	}
	article ul { 
		list-style-type: none; 
		margin-left: 0;
		text-align: left;
		word-wrap: break-word;
	}
	.small-12.medium-6.panel p {
		font-size: 12px;
		margin-bottom: 0!important;
	}
	.small-12.medium-6.panel h3 {
		text-align: center;
		margin-top: 1rem;
	}
	.small-12.medium-6.panel a { font-weight: normal; }
	@media screen and (min-width: 641px) {
		.small-12.medium-6.panel {
			margin: 0 3.3% 2rem 0;
			min-height: 385px;
		}
		.small-12.medium-6.panel img {
			display: none !important;
		}
		.small-12.medium-6.panel p {
			margin: 0;
		}
		article .fa:before { display: inline-block; }
	}
	@media screen and (min-width: 800px){
		.small-12.large-3.panel {
			width: 23%;
			margin: 0 1% 1rem;
			min-height: 450px;
		}
		.small-12.medium-6.panel img {
			display: block !important;
		}
		.small-12.medium-6.panel > p:nth-of-type(1) {
			margin-bottom: 1.25rem;
		}
	}
</style>
<!-- Row for main content area -->
<div id="content" class="row">
	<div class="page-temp-wrapper">
		<div class="small-12 columns" role="main">

		<?php while (have_posts()) : the_post(); ?>

			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

				<div class="entry-content">
					<?php the_content(); ?>
				</div>

<!-- start section for acf directory ( styles in [_interior-pages.scss] )-->
				<h2 class="staff-admin-head">Administration</h2>
				<div class="staff-wrapper">
					<?php
						$args = array(
							'post_type' => 'faculty',
							'meta_key' => 'add_to_admin',
							'orderby' => 'the_title',
							'order' => 'ASC',
							'posts_per_page' => -1
						);

						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post();

						//vars
						$facImage = get_field('staff_image');
						$facEmail = get_field('faculty_email');
						$facPhone = get_field('faculty_phone');
						$facTitle = get_field('staff_title');
						$facDegree = get_field('staff_degrees');

						// Meta Key used to validate
						$admin_check = get_field('add_to_admin');
					?>
						<?php if( $admin_check === true ) : ?>
							<div class="staff-member">
								<img src="<?php echo $facImage['sizes']['staff']; ?>" alt="<?php echo $facImage['alt']; ?>">
								<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
								<p style="font-weight: bold;"><?php echo $facTitle; ?></p>
								<p>Email: <a href="mailto:<?php echo $facEmail; ?>"><?php echo $facEmail; ?></a><br>
								Phone: <a href="tel:<?php echo $facPhone; ?>"><?php echo $facPhone ?></a></p>
								<p><?php echo $facDegree; ?></p>
							</div>
						<?php endif; ?>
					<?php endwhile; wp_reset_postdata(); ?>
				</div><!-- /.staff-wrapper -->

<!-- adminisitration integrated with exisiting columns; -->

				<br><br>
				<div class="row" style="margin: 0 auto; text-align: center; ">
				<h4><span class="fa fa-search"></span>Search Faculty/Staff</h4>
					<div class="small-12 medium-6" style="float: none; margin: 0 auto;">
						<input id="filter_input" type="text" placeholder="Type to Filter - Search by Name, Email, or Phone Number" style="margin: 0 auto; float: none;" />
					</div>
				</div>
				<br><br>


				<div class="row" style="text-align: center;">
					<div class="small-12 medium-6 columns">
						<h2>Beloit Faculty</h2>
						<ul class="filter">
							<?php
								add_filter( 'posts_orderby' , 'posts_orderby_lastname' );
								$args = array(
									'post_type' => 'faculty',
									'advisors' => 'beloit-faculty',
									'posts_per_page' => -1, 		
								);
								$loop = new WP_Query( $args );
								while ( $loop->have_posts() ) : $loop->the_post();
								$bio = get_field('faculty_biography');
								$first = strstr($bio,"\n",true);
							?>

							<li class="panel">
								<span class="fa fa-user"></span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br/>
								<span class="fa fa-envelope">Email:&nbsp;</span><?php the_field('faculty_email');?><br/>
								<span class="fa fa-phone">Phone:&nbsp;</span><a href="tel:<?php the_field('faculty_phone'); ?>"><?php the_field('faculty_phone'); ?></a>
								<br><span style="display: inline-block;"><?php the_field('staff_title'); ?></span>
							</li>
							<?php endwhile; wp_reset_postdata(); remove_filter( 'posts_orderby' , 'posts_orderby_lastname' ); ?>
						</ul>

						<h2>Beloit Staff</h2>
						<ul class="filter">
							<?php
								add_filter( 'posts_orderby' , 'posts_orderby_lastname' );
								$args = array(
									'post_type' => 'faculty',
									'advisors' => 'beloit-staff',
									'posts_per_page' => -1,
								);
								$loop = new WP_Query( $args );
								while ( $loop->have_posts() ) : $loop->the_post();
								$bio = get_field('faculty_biography');
								$first = strstr($bio,"\n",true);
							?>
							<li class="panel">
								<span class="fa fa-user"></span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br/>
								<span class="fa fa-envelope">Email:&nbsp;</span><?php the_field('faculty_email');?><br/>
								<span class="fa fa-phone">Phone:&nbsp;</span><a href="tel:<?php the_field('faculty_phone'); ?>"><?php the_field('faculty_phone'); ?></a>
								<br><span style="display: inline-block;"><?php the_field('staff_title'); ?></span>
							</li>
							<?php endwhile; wp_reset_postdata(); remove_filter( 'posts_orderby' , 'posts_orderby_lastname' ); ?>
						</ul>
					</div><!-- End Column -->

					<div class="small-12 medium-6 columns">
						<h2>Hays Faculty</h2>
						<ul class="filter">
							<?php
								add_filter( 'posts_orderby' , 'posts_orderby_lastname' );
								$args = array( 
									'post_type' => 'faculty',
									'advisors' => 'hays-faculty',
									'posts_per_page' => -1, 		
								); 
								$loop = new WP_Query( $args );
								while ( $loop->have_posts() ) : $loop->the_post();
								$bio = get_field('faculty_biography');
								$first = strstr($bio,"\n",true);
							?>
							<li class="panel">
								<span class="fa fa-user"></span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br/>
								<span class="fa fa-envelope">Email:&nbsp;</span><?php the_field('faculty_email');?><br/>
								<span class="fa fa-phone">Phone:&nbsp;</span> 	<a href="tel:<?php the_field('faculty_phone'); ?>"><?php the_field('faculty_phone'); ?></a>
								<br><span style="display: inline-block;"><?php the_field('staff_title'); ?></span>
							<?php endwhile; wp_reset_postdata(); remove_filter( 'posts_orderby' , 'posts_orderby_lastname' ); ?>
						</ul>

						<h2>Hays Staff</h2>
						<ul class="filter">
							<?php
								add_filter( 'posts_orderby' , 'posts_orderby_lastname' );
								$args = array( 
									'post_type' => 'faculty',
									'advisors' => 'hays-staff',
									'posts_per_page' => -1,
								);
								$loop = new WP_Query( $args );
								while ( $loop->have_posts() ) : $loop->the_post();
								$bio = get_field('faculty_biography');
								$first = strstr($bio,"\n",true);
							?>
							<li class="panel">
								<span class="fa fa-user"></span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br/>
								<span class="fa fa-envelope">Email:&nbsp;</span><?php the_field('faculty_email');?><br/>
								<span class="fa fa-phone">Phone:&nbsp;</span><a href="tel:<?php the_field('faculty_phone'); ?>"><?php the_field('faculty_phone'); ?></a>
								<br><span style="display: inline-block;"><?php the_field('staff_title'); ?></span>
							</li>
							<?php endwhile; wp_reset_postdata(); remove_filter( 'posts_orderby' , 'posts_orderby_lastname' ); ?>
						</ul>
					</div><!-- End Column -->
				</div><!-- End row -->

			</article>

		<?php endwhile; // End the loop ?>

		</div>
	</div> <!-- /.page-temp-wrapper -->
</div>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/filter.js"></script>
<script type="text/javascript">	
	jQuery(document).ready(function($){
		$(function() {
        	$('#filter_input').fastLiveFilter('.filter');
   		 });
	});
</script>

<?php get_footer(); ?>