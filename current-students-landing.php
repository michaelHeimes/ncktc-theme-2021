<?php
/* Template Name: Current Students */
?>

<?php get_header() ?>
<section class="current-students">
	<div class="ribbon-container"> <!-- in [_globals.scss] -->
		<div class="ribbon-container__blue-ribbon">
		</div>
		<h1>Current Students</h1>
	</div>

</section> <!-- /.current-students -->

<div class="current-students__bottom-nav">
		<span class="current-students__bottom-nav--box">
			<a href="https://portals.ncktc.edu/student/login.asp">
				<?php include 'img/nckicons/techknow.svg'; ?>
				<h5>TechKNOW</h5>
			</a>
		</span>

		<span class="current-students__bottom-nav--box">
			<a href="/cafeteria-menu/">
				<?php include 'img/nckicons/cafeteria-menu.svg'; ?>
				<h5>Cafeteria Menu</h5>
			</a>
		</span>

		<span class="current-students__bottom-nav--box">
			<a href="/student-activities/">
				<?php include 'img/nckicons/student-activities.svg'; ?>
				<h5>Student Activities</h5>
			</a>
		</span>
	</div> <!-- /.current-students__bottom-nav -->

<section class="students-main">
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
			<span class="lastt"><?php echo $EM_Event->output('#_LOCATIONTOWN'); ?></span>
			<a class="learn-more" href="<?php echo $EM_Event->output('#_EVENTURL'); ?>">View Event ></a>
			<hr>
			<?php if ( $i === 3 ) {	break 1; } ?>
			<?php endforeach; wp_reset_postdata(); // End Featured Event ?>
			
			<a class="green-shadow-button" href="/events">See All Events</a>	
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

			<a class="green-shadow-button" target="_blank" href="<?php $calendarFile = get_field('calendar_one'); echo $calendarFile['url']; ?>"><?php the_field('calendar_one_text'); ?></a>
			<a class="green-shadow-button" target="_blank" href="<?php $calendarFileTwo = get_field('calendar_two'); echo $calendarFileTwo['url']; ?>"><?php the_field('calendar_two_text'); ?></a>
		</div> <!-- home-container__split--news -->
	</div> <!-- /.home-container__split -->

	<!-- Financial Aid and Scholarships box 
	<div class="home-container__first">
		<div class="home-container__first--left">
			<h3><?php echo get_field('current_students_header'); ?></h3>
			<p><?php echo get_field('current_students_paragraph'); ?></p>
			<a class="green-shadow-button" href="/financial-aid/">Financial Aid</a>
			<a class="green-shadow-button scholarship-button" href="/financial-aid/scholarships/">Scholarships</a>
		</div>
		<?php $currStuImage = get_field('current_students_image');
		if( !empty($currStuImage) ) : ?>
			<span class="corner-borders"><img src="<?php echo $currStuImage['url']; ?>" alt="<?php echo $currStuImage['alt']; ?>"></span>
		<?php endif; ?>
	</div>
	-->
	
	<?php
	$image = get_field('current_students_image');
	$heading = get_field('current_students_header');
	$content = get_field('current_students_paragraph');
	$button_text = 'Financial Aid';
	$button_text2 = 'Scholarships';
	$button_link = '#';
	$button_link2 = '#';
	echo '<section class="story-carousel-section page-container">
	<div class="story-carousel owl-carousela owl-themea">';
	echo '<div class="story-carousel-item">';
	echo '<div class="story-carousel-item-overlay smallclip"></div>';
	echo '<div class="story-carousel-item-inner">';
	echo '<div class="story-carousel-item-image item">';
	if ($image){
		$imageurl = $image['url'];
		echo '<img class="bigclip" src="' . $imageurl . '">';
	}
	echo '</div>';
	echo '<div class="story-carousel-item-content item">';
	echo '<h3>' . $heading . '</h3>';
	echo $content;
	echo '<a href="' . $button_link .'">' . $button_text . '</a>';
	echo '<a href="' . $button_link2 .'">' . $button_text2 . '</a>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</section>';

	?>
	<!-- Call to Action cards (x3) -->
	<?php include 'call-to-action-cards.php'; ?>

	<div class="banner-fw">
		<div class="banner-fw__inner">
			<h3>Looking For A Job?</h3>
			<a class="green-shadow-button" href="/job-listings/">View Job Listings</a>
		</div>
	</div>

	<!-- second set of Call to Action Cards -->
	<div class="cta-cards">
		<!-- separate from list (requires pdf file upload) -->
		<div class="cta-cards__card">
			<img src="<?php echo get_field('student_handbook_card_image'); ?>" alt="Student Handbook Image">
			<h3><?php echo get_field('student_handbook_card_header'); ?></h3>
			<p><?php echo get_field('student_handbook_card_paragraph'); ?></p>
			<a class="green-shadow-button-wide" href="<?php
				$ctaUploadPDF = get_field('student_handbook_card_pdf_upload');
				echo $ctaUploadPDF['url']; ?>">
				<?php echo get_field('student_handbook_card_button_text'); ?>
			</a>
		</div>

		<?php if( have_rows('second_set_of_cta_cards') ):
			while( have_rows('second_set_of_cta_cards') ): the_row(); 
			
				//vars
				$ctaImage2 = get_sub_field('second_cta_image');
				$ctaHeader2 = get_sub_field('second_cta_header');
				$ctaPara2 = get_sub_field('second_cta_paragraph');
				$ctaButtonTxt2 = get_sub_field('second_cta_button_text');
				$ctaButtonLink2 = get_sub_field('second_cta_button_link');
				?>

				<div class="cta-cards__card">
					<img src="<?php echo $ctaImage2['url']; ?>" alt="<?php echo $ctaImage2['alt']; ?>">
					<h3><?php echo $ctaHeader2; ?></h3>
					<p><?php echo $ctaPara2; ?></p>
					<a class="green-shadow-button-wide" href="<?php echo $ctaButtonLink2; ?>"><?php echo $ctaButtonTxt2; ?></a>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>

	<!-- these are the cta cards with images only -->
	<div class="cta-cards">
		<?php if( have_rows('cta_text_overlay_cards') ): 
			while( have_rows('cta_text_overlay_cards') ): the_row();
			
				//vars
				$overlayImage = get_sub_field('cta_overlay_image');
				$overlayText = get_sub_field('cta_overlay_text');
				$overlayLink = get_sub_field('cta_overlay_text_link');
				?>
				
				<div class="cta-cards__card no-padding">
					<a href="<?php echo $overlayLink; ?>" style="background-image: url('<?php echo $overlayImage['url']; ?>');">
						<h5><?php echo $overlayText; ?></h5>
					</a>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>

	<div class="cta-icons">
		<a href="/transcript-request/" class="cta-icons__icon-box">
			<div class="icon-image"><?php include 'img/nckicons/transcript-icon.svg'; ?></div>
			<span class="h5-heading">Transcript Request</span>
		</a>

		<a href="/pay-online/" class="cta-icons__icon-box">
			<div class="icon-image"><?php include 'img/nckicons/payments-icon.svg'; ?></div>
			<span class="h5-heading">GRAD GIFT</span>
		</a>

		<a href="/rave-alert/" class="cta-icons__icon-box">
			<div class="icon-image"><?php include 'img/nckicons/rave-icon.svg'; ?></div>
			<span class="h5-heading">RAVE ALERT</span>
		</a>
	</div>

	<div class="cta-icons">
		<a href="http://mail.google.com/a/ncktc.edu" class="cta-icons__icon-box">
			<div class="icon-image"><?php include 'img/nckicons/webmail-icon.svg'; ?></div>
			<span class="h5-heading">Webmail</span>
		</a>

		<a href="https://ncktc.ethinksites.com/" class="cta-icons__icon-box">
			<div class="icon-image"><?php include 'img/nckicons/moodle-icon.svg'; ?></div>
			<span class="h5-heading">MOODLEROOMS</span>
		</a>
		
		<a href="/pay-online/" class="cta-icons__icon-box">
			<div class="icon-image"><?php include 'img/nckicons/payments-icon.svg'; ?></div>
			<span class="h5-heading">Online Payments</span>
		</a>
	</div> <!-- end of icon cta cards -->
</section>
<style>
.current-students__bottom-nav {
	padding-top: 60px;
	padding-bottom: 60px;
	color: #104C7F;
}

.current-students__bottom-nav .cls-1 {
	fill: #104C7F !important;
}

.current-students__bottom-nav h5, .current-students__bottom-nav a {
	color: #104C7F !important;
}

.home-container__split--events .event-link {
	display: block;
}


.home-container__split--events hr {
	margin-left: 0;
}

.home-container__split--academics .event-link {
	padding-bottom: 0;
}

.story-carousel-item-inner {
	display: flex;
}

.story-carousel-item-inner > .item {
	width: 50%;
}

.story-carousel-item-content {
	display: flex;
	flex-direction: column;
	justify-content: center;
	padding: 50px;
	color: white;
	padding-left: 80px;
	padding-right: 80px;
}

.story-carousel-item-content  h3 {
	color: white;
}

.story-carousel-item {
	position: relative;
	padding: 90px 0;
	margin-left: 2px;
	z-index: 0;
}

.story-carousel-item-overlay {
	position: absolute;
	background: #002F57;
	z-index: -1;
	top: 0;
	bottom: 0;
	left: 10%;
	right: 0;
}


</style>
<?php get_footer() ?>