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

<?php the_content();

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

echo '<div class="featured-events">';
foreach ( $EM_Events as $EM_Event ) {
	$i++;
	$postid = $EM_Event->post_id;
	echo '<div class="events-block-item">';
	if (get_the_post_thumbnail($postid)) {
	echo get_the_post_thumbnail($postid);
	}
	else {
		echo '<img src="/wp-content/uploads/2020/05/Rectangle-4.png">';
	}
	echo '<div class="events-block-item-bottom">';
	echo '<h3 class="event-name">' . $EM_Event->output('#_EVENTNAME') . '</h3>';
	echo '<div>' . $EM_Event->output('#F') . ' ' . $EM_Event->output('#d');
	echo ' ' . $EM_Event->output('#_EVENTTIMES') . '</div>';
	echo '<div>' . $EM_Event->output('#_LOCATIONTOWN') . '</div>';
	echo '<p>' . get_the_excerpt($postid) . '</p>';
	$url = $EM_Event->output('#_EVENTURL');
	echo '<a href="' . $url . '" class="green-shadow-button">Register Now</a>';
	echo '</div>';
	echo '</div>';
	
	if ( $i === 3 ) {	break 1; }
} wp_reset_postdata();
echo '</div>';


echo '<div class="events-list">';
$date = date("Y-m-d");
echo do_shortcode('[ajax_load_more post_type="event" meta_key="_event_start_date" meta_value="' . $date . '" meta_compare=">=" meta_type="DATETIME" orderby="meta_value_num" order="ASC" scroll="false" offset="3"]');
echo '</div>'

//echo do_shortcode('[ajax_load_more post_type="event" meta_key="_event_start_date" meta_value="2021-06-19" meta_compare=">=" meta_type="DATETIME" orderby="meta_value_num" order="ASC"]');
//echo do_shortcode('[ajax_load_more post_type="event" meta_key="_event_start_date" meta_value="2021-06-19" meta_compare=">="  orderby="meta_value_num" order="ASC" pause="true"]');
/*
$args = array(
'posts_per_page'	=> 3,
'post_type'		=>'event',
'post_status' => 'publish',
'meta_key' => '_event_start_date',
'meta_value' => '2021-08-23',
);
$the_query = new WP_Query( $args );
if( $the_query->have_posts() ){
while ( $the_query->have_posts() ) { $the_query->the_post();
	the_title();
	$meta = get_post_meta( get_the_ID() );
	print_r($meta);
	echo '<br>';
}
}
wp_reset_query();
*/
?>
<style>
.page-template-events .container {
	background: none;
}

.events-list {
	max-width: 800px;
	margin: auto;
}

.events-list .events-block-item {
	display: flex;
	//justify-content: space-around;
	justify-content: space-between;
	margin-bottom: 40px;
}

.events-list .events-block-item-left, .events-list .events-block-item-right {
	width: 25%;
}

.events-list .events-block-item-middle {
	width: 50%;
}

.featured-events {
	display: flex;
	max-width: 1200px;
	margin: auto;
	justify-content: space-between;
	margin-top: 80px;
	margin-bottom: 60px;
	flex-wrap: wrap;
}

.featured-events .events-block-item {
	width: 387px;
	background: #ECF1F6;
	display: flex;
	flex-direction: column;
}
.featured-events .events-block-item-bottom {
	display: flex;
	flex-direction: column;
	flex-grow: 1;
	align-items: flex-start;
	padding: 30px;
}

.featured-events .events-block-item a {
	margin-top: auto;
}

</style>
<?php /*
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
					//unset( $EM_Events[$index] );
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

</section> */ ?>

<?php get_footer() ?>