<?php
/* Template Name: Events */
?>

<?php get_header() ?>

<section class="events-header">
	<div class="ribbon-container"> <!-- in [_globals.scss] -->
		<div class="ribbon-container__blue-ribbon">
		</div>
		<h1>Events</h1>
	</div>
</section>
<img class="events-header__bottom-bar" src="<?php echo get_stylesheet_directory_uri(); ?>/img/bottom-header-bar.png" alt="Grey bar at bottom of header">

<section class="events-main">
	<div class="cta-cards">
		<?php
			$i = 0;
			$EM_Events = EM_Events::get( array(
				'scope'    => 'future',
				'orderby'  => 'event_start_date',
				'meta_key' => 'display_on_events_main_page',
				) );

			$index = 0;
			foreach ( $EM_Events as $event ) {
				if ( $event->event_attributes['display_on_events_main_page'] == 0 ) {
					unset( $EM_Events[$index] );
				}
				$index++;
			}

			foreach ( $EM_Events as $EM_Event ) :
				$i++;

				$eventsImg = get_field('add_image_to_featured_event', $EM_Event->ID);
		?>

		<div class="cta-cards__card">
			<img src="<?php echo $eventsImg['url']; ?>" alt="<?php echo $eventsImg['alt']; ?>">
			<h3 style="min-height: 7.8rem;"><?php echo $EM_Event->output('#_EVENTNAME'); ?></h3>
			<p><?php echo $EM_Event->output('#_EVENTEXCERPTCUT{25}'); ?></p>
			<a class="green-shadow-button-wide" href="<?php echo $EM_Event->output('#_EVENTURL'); ?>">Event Details</a>
		</div>
		<?php if ( $i === 4 ) {	break 1; } ?>
		<?php endforeach; wp_reset_postdata(); // End Featured Events ?>
	</div> <!-- /.cta-cards -->

	<div class="events__event-boxes">
		<div class="events-calendar-notice">
			<p>This page shows our most recent events.<br> To see all of our events, view our calendar.</p>
			<h4><a href="/events/" class="event-url">View Calendar</h4></a>
		</div>
		<?php
			$i = 0;
			$EM_Events = EM_Events::get( array(
				'scope'   => 'future',
				'orderby' => 'event_start_date',
				'order'   => 'ASC', // shows most recent (upcoming) event first
				'limit'   => 10, // limit to 10 "days" worth of events
				) );

			foreach ( $EM_Events as $EM_Event ) :
				$i++;
		?>
		<div class="events__event-boxes--box">
			<div class="event-link">
				<div class="event-link__left">
					<span><?php echo $EM_Event->output('#F'); ?> <?php echo $EM_Event->output('#d'); ?></span>
					<span><?php echo $EM_Event->output('#_EVENTTIMES'); ?></span>
					<span class="last"><?php echo $EM_Event->output('#_LOCATIONTOWN'); ?></span>
				</div>
				<div class="event-link__center">
					<a class="event-url" href="<?php echo $EM_Event->output('#_EVENTURL'); ?>"><?php echo $EM_Event->output('#_EVENTNAME'); ?></a><br>
					<p><?php echo $EM_Event->output('#_EVENTEXCERPTCUT{25}'); ?></p>
				</div>
				<div class="event-link__right">
					<a class="learn-more-alt" href="<?php echo $EM_Event->output('#_EVENTURL'); ?>">Learn More</a>
				</div>
			</div>
		</div> <!-- /.events__event-boxes--box -->
		<?php endforeach; wp_reset_postdata(); // End Featured Events ?>
	</div> <!-- /.events__event-boxes -->

</section>

<?php get_footer() ?>