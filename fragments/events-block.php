<section class="events-block">
<h2>UPCOMING EVENTS</h2>
<div class="events-block-inner">
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
				foreach ( $EM_Events as $EM_Event ) {
					$i++;

					echo '<div class="events-block-item">';
					$url = $EM_Event->output('#_EVENTURL');
					echo '<h3>' . $EM_Event->output('#F') . ' ' . $EM_Event->output('#d') . '</h3>';
					echo '<div>' . $EM_Event->output('#_EVENTTIMES') . '</div>';
					echo '<div>' . $EM_Event->output('#_LOCATIONTOWN') . '</div>';
					echo '<div class="event-name">' . $EM_Event->output('#_EVENTNAME') . '</div>';
					echo '<a href="' . $url . '" class="events-block-arrow"><i class="fas fa-arrow-right" aria-hidden="true"></i></a>';
					echo '</div>';
					
					if ( $i === 3 ) {	break 1; }
				} wp_reset_postdata();
			?>
			
<div class="events-block-item"><h3>all events</h3>
<div class="events-block-arrow "><i class="fas fa-arrow-right" aria-hidden="true"></i></div>
</div>

</div>
<style>

.events-block {
	display: flex;
	flex-direction: column;
	background-image: url('/wp-content/uploads/2021/06/Rectangle-3-Copy-4.jpg');
	height: 736px;
	justify-content: flex-end;
}

.home .story-carousel-section + .events-block {
	margin-top: -296px;
}

.events-block h2 {
	text-align: center;
}

.events-block-item {
	width: 234px;
	background: white;
	margin-right: 20px;
	padding: 16px 21px;
	padding-bottom: 0;
	display: flex;
	flex-direction: column;
	justify-content: center;
}

.events-block-inner {
	display: flex;
	max-width: 1000px;
	margin: 0 auto;
	width: 100%;
	margin-bottom: 110px;
}

.events-block-arrow {
	height: 35px;
	width: 35px;
	background: #002F57;
	display: flex;
	justify-content: center;
	align-items: center;
	border-radius: 100%;
	color: white;
	position: relative;
	top: 14px;
}

.events-block h3 {
	margin: auto 0;
}
</style>
</section>