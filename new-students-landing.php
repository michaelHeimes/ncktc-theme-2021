<?php
/* Template Name: New Students */
?>

<?php get_header() ?>
<section class="new-students">
	<div class="ribbon-container"> <!-- in [_globals.scss]
		<div class="ribbon-container__blue-ribbon">
		</div> -->
		<h1>Admissions</h1>
	</div>

	<div class="info-boxes">
		<div class="info-boxes__box">
			<h2>VISIT A<br>CAMPUS!</h2>
			<?php gravity_form( 79, false, false, false, '', false ); ?>
			<!-- Form Name: Schedule A Visit / ID: 79 -->
			<!-- This form populates the Main Form on the "*/visit/" Page -->
		</div> <!-- /.[__left] -->

		<div class="info-boxes__box">
			<h2>Apply <br>Today!</h2>
			<?php gravity_form( 80, false, false, false, '', false ); ?>
			<!-- Form Name: Apply Today / ID: 80 -->
			<!-- This form populates the Main Form on the "*/apply/" Page -->
		</div> <!-- /.[__right] -->
	</div> <!-- /.info-boxes -->
</section>

<section class="new-students-main">
	<div class="new-students-main__resource-container">
		<h2>Admissions &amp; Resources</h2>
		<div class="new-students-main__resource-container--boxes">

			<div class="boxes-left-side">
				<div class="top-section">
					<h3>New Around Here?</h3>
					<p>Getting ready for college can seem like a lot of work. Not to worry. We have broken out the main steps here for you to make coming to NCK Tech a breeze.</p>
					<p>If you get stuck, we have dedicated staff standing by to help you with any questions you may have.</p>
					<a class="learn-more" href="/admissions-process/">See Our Admissions Process &rsaquo;</a><br>
					<a class="learn-more" href="/contact/">Talk to an Admissions Counselor &rsaquo;</a>
				</div>
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/new-student-card-bottom.jpg" alt="NCK Tech Staff Member">
			</div>

			<div class="boxes-right-side">
				<div class="boxes-top">
					<div class="white-box">
						<span>01.</span>
						<h5>Apply</h5>
						<p>Completing an application is the first step in the admissions process.<br> Apply online today. It only takes about 10 minutes. $50 application fee required.</p>
						<a class="learn-more" href="/apply/">Apply Now &rsaquo;</a>
					</div>
					
					<div class="white-box">
						<span>02.</span>
						<h5>Submit Test Scores</h5>
						<p>Our Accuplacer Test is free. Please take the test and submit your scores at the end.</p>
						<a class="learn-more" href="/accuplacer-test-day/">Take The Accuplacer Test &rsaquo;</a>
					</div>
				</div> <!-- top box row -->

				<div class="boxes-bottom">
					<div class="white-box">
						<span>03.</span>
						<h5>Financial Aid &amp; Scholarships</h5>
						<p>Financial aid and scholarships are available to help with your educational expenses. Start by filling out the FAFSA (Free Application for Federal Student Aid) to see what financial aid you qualify for. You can then apply for scholarships offered by NCK Tech.</p>
						<a class="learn-more" href="https://fafsa.ed.gov/">Apply for FAFSA &rsaquo;</a>
						<a class="learn-more" href="/financial-aid/scholarships/">Apply for Scholarships &rsaquo;</a>
					</div>

					<div class="white-box">
						<span>04.</span>
						<h5>Find Housing</h5>
						<p>Both of our campuses have many housing options available. Choose your campus to find great places to live!</p>
						<a class="learn-more" href="/beloit-on-campus-housing/">Beloit Housing &rsaquo;</a>
						<a class="learn-more" href="/campus-housing-hays/">Hays Housing &rsaquo;</a>
					</div>
				</div> <!-- bottom box row -->
			</div> <!-- /.boxes-right-side -->
		</div>
	</div>

	<!-- cta cards above videos -->
	<div class="new-students-cta-wrapper">
		<div class="new-students-cta-links">
			<?php if( have_rows('cta_cards_by_four') ):
				while( have_rows('cta_cards_by_four') ): the_row();

				//vars
				$ctaImageFour = get_sub_field('cta_by_four_image');
				$ctaTextFour = get_sub_field('cta_by_four_header');
				$ctaLinkFour = get_sub_field('cta_by_four_card_link');
				?>
				<a href="<?php echo $ctaLinkFour; ?>" class="new-students-cta-links__card">
					<div class="placement-card-image" style="background-image: url('<?php echo $ctaImageFour['url']; ?>');">
						<h5><?php echo $ctaTextFour; ?></h5>
					</div>
				</a>
				<?php endwhile; ?>
			<?php endif; ?>
		</div> <!-- /.cta-links -->
	</div> <!-- /.cta-wrapper -->

	<div class="campus-video-cards">
		<h2>Our Campuses</h2>

		<div class="campus-video-cards__container">

			<?php if( have_rows('campus_videos') ):
				while( have_rows('campus_videos') ): the_row();

				//vars
				$videoSrc = get_sub_field('video_source');
				$videoHeader = get_sub_field('video_box_header');
				$videoParagraph = get_sub_field('video_box_paragraph');

				$videoButtonOneTxt = get_sub_field('video_box_button_one_text');
				$videoButtonOneLink = get_sub_field('video_box_button_one_link');
				$videoButtonTwoTxt = get_sub_field('video_box_button_two_text');
				$videoButtonTwoLink = get_sub_field('video_box_button_two_link');
				?>
					<div>
						<iframe id="ytplayer" type="text/html" src="<?php echo $videoSrc; ?>" allowfullscreen frameborder="0"></iframe>
						<div class="campus-video-cards__container--below">
							<h3><?php echo $videoHeader; ?></h3>
							<p><?php echo $videoParagraph; ?></p>
							<div>
								<a class="green-shadow-button" href="<?php echo $videoButtonOneLink; ?>"><?php echo $videoButtonOneTxt; ?></a>
								<a class="green-shadow-button" href="/virtual-tour/" style="width: 10rem; text-align: center;">Virtual Tour</a>
							</div>
							<a class="learn-more" href="<?php echo $videoButtonTwoLink; ?>"><?php echo $videoButtonTwoTxt; ?> &rsaquo;</a>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div> <!-- /.[__container] -->
	</div> <!-- /.campus-video-cards -->

	<!-- re-used from 'home-page.php/scss' -->
	<div class="home-container__first">
		<h2>Room &amp; Board</h2>
		<div class="new_students-block-container">
		<div class="new_students-block-inner"></div>
		<?php $newStuImage = get_field('new_students_image');
		if( !empty($newStuImage) ) : ?>
			<span class="new-students-corner-borders"><img src="<?php echo $newStuImage['url']; ?>" alt="<?php echo $newStuImage['alt']; ?>"></span>
		<?php endif; ?>
		<div class="home-container__first--left">
			<h3><?php echo get_field('new_students_header'); ?></h3>
			<p><?php echo get_field('new_students_paragraph'); ?></p>
			<a class="green-shadow-button" href="/beloit-on-campus-housing/">Beloit Campus</a>
			<a class="green-shadow-button scholarship-button" href="/campus-housing-hays/">Hays Campus</a>
		</div>
		
		</div>
	</div>

	<!-- cta-cards below "Room & Board" -->
	<div class="low-cta-wrapper">
		<div class="low-cta-links">
			<?php if( have_rows('above_footer_cta_cards') ):
				while( have_rows('above_footer_cta_cards') ): the_row();

				//vars
				$lowCtaLink = get_sub_field('cta_link');
				$lowCtaImage = get_sub_field('cta_image');
				$lowCtaHeader = get_sub_field('cta_header_text');
				?>
					<a class="low-cta-links__card" href="<?php echo $lowCtaLink; ?>">
						<div class="card-image" style="background-image: url('<?php echo $lowCtaImage['url']; ?>');">
							<h5><?php echo $lowCtaHeader; ?></h5>
						</div>
					</a>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div> <!-- /.cta-wrapper -->

	<?php include 'alt-top-footer.php'; ?> <!-- alt footer used on "New Students" and "Academics" Pages -->
</section> <!-- /.new-students-main -->
<style>
.new_students-block-container {
	display: flex;
	align-items: center;
	//flex-direction: row-reverse;
	justify-content: flex-start;
	position: relative;
}

.new_students-block-container img {
	position: static;
}

.new_students-block-container .new-students-corner-borders {
	position: relative;
	padding-top: 5%;
	padding-bottom: 5%;
}

.home-container__first--left {
	background: transparent;
}

.new_students-block-inner {
	background: #002F57;
	position: absolute;
	left: 10%;
	right: 0;
	bottom: 0;
	top: 0;
	z-index: 0;
}

.new-students-main .home-container__first--left {
	color: white;
}
</style>
<?php get_footer() ?>