<?php
/*
Template Name: Campus Page
*/?>
<?php get_header(); ?>

<?php include 'interior-page-header-template.php'; ?>

<!-- Row for main content area -->
<div id="content-interior">
	<div class="interior-main" role="main">

		<div class="interior-main__content" style="max-width: 75rem;">
			<div class="entry-content row">
				<div class="small-12 medium-6 columns">
					<?php if (get_field('campus_video') == '' || null ) { ?>
					<div class="flex-video" style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/img/video-coming-soon.gif'); background-size: cover;">
						<?php } else { ?>
						<div class="flex-video">
							<iframe width="640" height="360" src="<?php the_field('campus_video'); ?>/?rel=0&wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
						<?php } ?>
						</div><!-- End Flex Video -->
					</div><!-- End Video Column -->

					<div class="small-12 medium-6 columns">
						<?php the_field('campus_description'); ?>	
					</div>
				</div><!-- End Row -->

				<div class="row">

					<div class="small-12 medium-6 columns events">
						<h3 style="padding-bottom: 1.5rem;">Events on Campus</h3>
						<?php if ( is_page( array( 172, 'beloit-campus', 'Beloit Campus' ) ) ){ ?>
							<?php 
								$events = EM_Events::get(array('scope'=>'future','category'=>10, 'limit'=>10));
								if ( !empty($events) ){

									foreach ($events as $EM_Event){ ?>
									<div>
										<span>
											<span class="fa fa-calendar" aria-hidden="true"></span>&nbsp;<?php echo $EM_Event->output('#_EVENTLINK'); ?>
										</span>
										<span>&nbsp;-&nbsp;</span>
										<span><?php echo $EM_Event->output('#_{F d\, Y}'); ?></span>
										<hr/>
									</div>
		
						<?php	} } else { ?>
							<p><span class="fa fa-frown-o" aria-hidden="true"></span>&nbsp;No events at this time. Please check back later.</p>
						<?php } echo '<a href="/events/">View more events &rarr;</a>'; } ?>

						<?php if ( is_page( array( 174, 'hays-campus', 'Hays Campus' ) ) ){ ?>
							<?php 
									$events = EM_Events::get(array('scope'=>'future','category'=>11, 'limit'=>10));
									if ( !empty($events) ){

									foreach ($events as $EM_Event){ ?>
										
									<div>
										<span>
											<span class="fa fa-calendar" aria-hidden="true"></span>&nbsp;<?php echo $EM_Event->output('#_EVENTLINK'); ?>
										</span>
										<span>&nbsp;-&nbsp;</span>
										<span>
										<?php echo $EM_Event->output('#_{F d\, Y}'); ?>
										</span>
										<hr/>
									</div>
							
							<?php	} } else { ?>
								<p><span class="fa fa-frown-o" aria-hidden="true"></span>&nbsp;No events at this time. Please check back later.</p>
						<?php } echo '<a href="/events/">View more events &rarr;</a>'; } ?>
						<!-- <p>Got an event? <a href="#">Submit an event for approval.</a></p> -->
					</div>				

					<div class="small-12 medium-6 columns contact">
						<h3>Contact</h3>
						<?php if ( is_page( array( 172, 'beloit-campus', 'Beloit Campus' ) ) ){ ?>
							<h4>NCK Tech Beloit</h4>
							<address>
								3033 U.S. 24, Beloit, KS 67420
							</address>
							<p><a href="tel:(785) 738-2276">785-738-2276</a></p>
							<?php echo do_shortcode('[location location="1"]#_LOCATIONMAP[/location]' ); ?>
						<?php } ?>
						<?php if ( is_page( array( 174, 'hays-campus', 'Hays Campus' ) ) ){ ?>
							<h4>NCK Tech Hays</h4>
							<address>
								2205 Wheatland Ave, Hays, KS 67601
							</address>
							<p><a href="tel:(785) 738-2276">785-625-2437</a></p>
							<?php echo do_shortcode('[location location="2"]#_LOCATIONMAP[/location]' ); ?>
						<?php } ?>
					</div>

					

				</div><!-- end row -->

				<footer>
				<?php if ( is_page( array( 172, 'beloit-campus', 'Beloit Campus' ) ) ){ ?>
					<div class="row blocks">
						<div class="small-6 medium-3 columns">
							<div class="visit">
								<a href="/visit/">
									<h4><span class="fa fa-check-square-o"></span>&nbsp;Tour</h4>
								</a>
							</div>
						</div>
						<div class="small-6 medium-3 columns">
							<div class="housing">
								<a href="<?php echo get_permalink(364);?>">
									<h4><span class="fa fa-home"></span>&nbsp;Housing</h4>
								</a>
							</div>
						</div>
						<div class="small-6 medium-3 columns">
							<div class="map">
								<a href="<?php echo get_stylesheet_directory_uri(); ?>/img/beloit-map.jpg">
									<h4><span class="fa fa-compass"></span>&nbsp;Campus Map</h4>
								</a>
							</div>
						</div>
						<div class="small-6 medium-3 columns">
							<div class="cafeteria">
								<a href="<?php echo get_permalink(439); ?>">
									<h4><span class="fa fa-cutlery"></span>&nbsp;Menu</h4>
								</a>
							</div>
						</div>
					</div>

				<?php	} ?>

				<?php if ( is_page( array( 174, 'hays-campus', 'Hays Campus' ) ) ){ ?>
					<div class="row blocks">
						<div class="small-6 medium-3 columns">
							<div class="visit">
								<a href="/visit/">
									<h4><span class="fa fa-check-square-o"></span>&nbsp;Visit</h4>
								</a>
							</div>
						</div>
						<div class="small-6 medium-3 columns">
							<div class="housing">
								<a href="https://ncktc.edu/wp-content/uploads/2019/03/Apartment-Rental-Information-Hays-Campus.pdf">
									<h4><span class="fa fa-home"></span>&nbsp;Housing</h4>
								</a>
							</div>
						</div>
						<div class="small-6 medium-3 columns">
							<div class="map">
								<a href="<?php echo get_stylesheet_directory_uri(); ?>/img/ncktc-hays-map.jpg">
									<h4><span class="fa fa-compass"></span>&nbsp;Map</h4>
								</a>
							</div>
						</div>
						<div class="small-6 medium-3 columns">
							<div class="gateway" style="background: rgba(0, 100, 197, 0.75); padding: 38px 0;">
								<a href="<?php echo get_permalink(407);?>">
									<h4 style="line-height: 1.2;"><span class="fa fa-pencil"></span>&nbsp;Gateway Program</h4>
								</a>
							</div>
						</div>
					</div>
				<?php	} ?>
			</footer>
			</div> <!-- /.entry-content row -->
		</div> <!-- /.interior-main__content -->

	</div> <!-- /.interior-main -->
</div> <!-- /#content-interior -->

<?php get_footer(); ?>