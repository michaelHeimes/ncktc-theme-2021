<?php
/* Template Name: About Us */
?>

<?php get_header() ?>

<section class="about-header">
	<div class="ribbon-container"> <!-- in [_globals.scss] -->
		<div class="ribbon-container__blue-ribbon">
		</div>
		<h1>About Us</h1>
	</div>
</section>

<section class="about-main">
	<?php include 'call-to-action-cards.php'; ?>

	<div class="banner-fw">
		<div class="banner-fw__inner">
			<h3>Join Our Team</h3>
			<a class="green-shadow-button" href="/job-opportunities/">View Jobs</a>
		</div>
	</div>

	<!-- Upcoming Events / Academic Calendar / Recent News -->
	<div class="home-container__split">
		<div class="home-container__split--events">			
			<h3>Upcoming Events</h3>
			<?php
				$i = 0;
				$EM_Events = EM_Events::get( array(
					'scope'=>'future',
					'orderby'=>'event_start_date',
					) );

				$index = 0;
				/*
				foreach ( $EM_Events as $event ){
					if ( $event->event_attributes['display_on_homepage'] == 0 ){
						unset($EM_Events[$index]);
					}
					$index++;
				}
				*/
				foreach ( $EM_Events as $EM_Event ) :
					$i++;
			?>

			<div class="event-link">
				<div class="event-link__left">
					<span><?php echo $EM_Event->output('#F'); ?></span>
					<span><?php echo $EM_Event->output('#d'); ?></span><br>
					<span><?php echo $EM_Event->output('#_EVENTTIMES'); ?></span><br>
				</div>
				<div class="event-link__right">
					<a class="event-url" href="<?php echo $EM_Event->output('#_EVENTURL'); ?>"><?php echo $EM_Event->output('#_EVENTNAME'); ?></a><br>
				</div>
			</div>
			<span class="last"><?php echo $EM_Event->output('#_LOCATIONTOWN'); ?></span>
			<a class="learn-more" href="<?php echo $EM_Event->output('#_EVENTURL'); ?>">Learn More ></a>
			<hr>
			<?php if ( $i === 3 ) {	break 1; } ?>
			<?php endforeach; wp_reset_postdata(); // End Featured Event ?>
			
			<a class="blue-link" href="/events">See All Events</a>	
		</div> <!-- /.home-container__split--events -->

		<div class="divider"></div>

		<div class="home-container__split--academics">
			<h3>Academic Calendar</h3>
			<?php
				$i = 0;
				$EM_Events = EM_Events::get( array(
					'scope'=>'future',
					'orderby'=>'event_start_date',
					'category' => 16, // grab only the Academic Calendar Items
					) );

				foreach ( $EM_Events as $EM_Event ) :
					$i++;
			?>
				<div class="event-link">
					<div class="event-link__left">
						<span><?php echo $EM_Event->output('#F'); ?></span>
						<span><?php echo $EM_Event->output('#d'); ?></span><br>
					</div>
					<div class="event-link__right">
						<a class="event-url" href="<?php echo $EM_Event->output('#_EVENTURL'); ?>"><?php echo $EM_Event->output('#_EVENTNAME'); ?></a><br>
					</div>
				</div>
				<hr>
				<?php if ( $i === 3 ) {	break 1; } ?>
				<?php endforeach; wp_reset_postdata(); // End Featured Event ?>
			<a class="blue-link" target="_blank" href="<?php $calendarFile = get_field('calendar_one'); echo $calendarFile['url']; ?>"><?php the_field('calendar_one_text'); ?></a>
			<a class="blue-link" target="_blank" href="<?php $calendarFileTwo = get_field('calendar_two'); echo $calendarFileTwo['url']; ?>"><?php the_field('calendar_two_text'); ?></a>
			
		</div> <!-- home-container__split--news -->

		<div class="divider"></div>

		<div class="home-container__split--news">
			<h3>Recent News</h3>
			<?php $args = array(
			      'post_type' => 'post',
				  'posts_per_page' => 2,
				  'ignore_sticky_posts' => true,
				  'cat' => -12
				  );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<span class="news-title"><?php the_title(); ?></span>
				<p><?php the_excerpt(); ?></p>
				<a class="learn-more" href="<?php the_permalink(); ?>">Read More ></a><br>
				<hr>
			<?php endwhile; wp_reset_postdata(); ?>

			<a class="blue-link" href="/news/">Read More Stories</a>
		</div> <!-- home-container__split--news -->

	</div> <!-- /.home-container__split -->

	<div class="banner-fw">
		<div class="banner-fw__inner">
			<h3>Work At NCK Tech</h3>
			<a class="green-shadow-button" href="#">Learn More</a>
		</div>
	</div>

	<!-- second set of cta overlay cards for about us page -->
	<div class="cta-cards">
		<?php if( have_rows('second_cta_text_overlay_cards') ): 
			while( have_rows('second_cta_text_overlay_cards') ): the_row();
			
				//vars
				$overlayImage2 = get_sub_field('second_cta_overlay_image');
				$overlayText2 = get_sub_field('second_cta_overlay_text');
				$overlayLink2 = get_sub_field('second_cta_overlay_text_link');
				?>
				
				<div class="cta-cards__card no-padding">
					<a href="<?php echo $overlayLink2; ?>" style="background-image: url('<?php echo $overlayImage2['url']; ?>');">
						<h5><?php echo $overlayText2; ?></h5>
					</a>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</section>

<?php get_footer() ?>