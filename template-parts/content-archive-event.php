<?php
echo '<div class="events-block-item">';

$meta = get_post_meta( get_the_ID() );
//print_r($meta);
$event_all_day = get_post_meta( get_the_ID(), '_event_all_day', true );
//$start_ts = get_post_meta( get_the_ID(), '_start_ts', true );
$end_ts = get_post_meta( get_the_ID(), '_end_ts', true );
$event_start_local = get_post_meta( get_the_ID(), '_event_start_local', true );

$start_ts = strtotime($event_start_local);
$eventdate = date("M j Y", $start_ts);
$eventtime = date("g:i A", $start_ts);

echo '<div class="events-block-item-left">';
echo '<div>' . $eventdate . '</div>';
if ($event_all_day == true) {
	echo '<div>All Day</div>';
}
else {
	echo '<div>' . $eventtime . '</div>';
}
echo '<br>';
$event_categories = get_the_terms(get_the_ID(), 'event-categories' );
foreach ($event_categories as $cat) {
if( $cat->name == 'Beloit' ) {
	echo '<div>Beloit Campus</div>';
}
if( $cat->name == 'Hays' ){
	echo '<div>Hays Campus</div>';
}
}
echo '</div>';
//
echo '<div class="events-block-item-middle">';
echo '<h3>' . get_the_title() . '</h3>';
the_excerpt();
echo '</div>';

echo '<div class="events-block-item-right">';
echo '<a class="event-url" href="' . get_the_permalink() . '">Learn More</a>';
echo '</div>';

echo '</div>';
?>