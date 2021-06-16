<?php
/* Template Name: Non-Traditional Students */
?>

<?php get_header() ?>

<section class="nontrad-header">
	<div class="ribbon-container"> <!-- in [_globals.scss] -->
		<div class="ribbon-container__blue-ribbon">
		</div>
		<h1>Non-Traditional Students</h1>
	</div>
</section>
<img class="nontrad-header__bottom-bar" src="<?php echo get_stylesheet_directory_uri(); ?>/img/bottom-header-bar.png" alt="Grey bar at bottom of header">

<section class="home-container non-trad-main">
	<div class="home-container__first">
		<div class="home-container__first--left">
			<h3><?= get_field('first_image_panel_header'); ?></h3>
			<p><?= get_field('first_image_panel_content'); ?></p>
		</div>
		<?php $firstImage = get_field('first_image_panel_right');
		if( ! empty($firstImage) ) : ?>
			<img class="nontrad-first-image" src="<?= $firstImage['url']; ?>" alt="<?= $firstImage['alt']; ?>">
		<?php endif; ?>
	</div>

	<div class="home-container__first cta-list-container">
		<?php $secondImage = get_field('second_image_panel_left');
		if( ! empty($secondImage) ) : ?>
			<img class="nontrad-first-image" src="<?= $secondImage['url']; ?>" alt="<?= $secondImage['alt']; ?>">
		<?php endif; ?>
		<div class="home-container__first--right">
			<?php if( have_rows('second_image_panel_content') ) :
				while( have_rows('second_image_panel_content') ) : the_row();
				?>
					<p><?= get_sub_field('list_item_cta'); ?></p>
				<?php endwhile;
			endif;
			?>
		</div>
	</div>

	<div class="banner-fw">
		<div class="banner-fw__inner">
			<h3><?= get_field('cta_banner_header'); ?></h3>
			<p><?= get_field('cta_banner_text'); ?></p>
		</div>
		<a id="snapchat-button" class="green-shadow-button" href="/apply/">Apply Today</a>
	</div>

	<section class="student-charts-section">
		<div class="student-charts-section__main-container">
			<h3><?= get_field('above_collapsible_sections'); ?></h3>
			<p><?= get_field('paragraph_above_collapsible_sections'); ?></p>
		</div>

		<div class="faqs">
			<?php if( have_rows('collapsible_sections') ) : 
			    while( have_rows('collapsible_sections') ) : the_row();
				?>
				<div class="faqs__qa">
					<div class="faqs__qa--content">
						<button class="accordion-label">
							<span id="white-text" class="push-right"><?= get_sub_field('student_name_and_age'); ?></span>
							<span id="white-text" class="no-margin"><?= get_sub_field('student_program_studied'); ?></span>
						</button>

						<div class="accordion-content">
							<div class="acc-left">
								<div class="textbox">
									<h5><?= get_sub_field('text_box_one_header'); ?></h5>
									<p><?= get_sub_field('text_box_one_paragraph'); ?></p>
								</div>
								<div class="textbox">
									<h5><?= get_sub_field('text_box_two_header'); ?></h5>
									<p><?= get_sub_field('text_box_two_paragraph'); ?></p>
								</div>
							</div>
							<div class="acc-right">
								<img class="desktop-image" src="<?= get_sub_field('chart_image')['url']; ?>" alt="Time Management Chart" />
								<img class="mobile-image" src="<?= get_sub_field('mobile_chart_image')['url']; ?>" alt="Time Management Chart" />
							</div>
						</div>
					</div>
				</div>
				<?php endwhile;
			endif;
			?>
		</div> <!-- /.[faqs] main section -->
	</section> <!-- /.[student-charts-section] -->

	<div class="banner-fw">
		<div class="banner-fw__inner less-padding">
			<h3 class="bottom-header"><?= get_field('cta_banner_header_bottom'); ?></h3>
		</div>
	</div>

	<section class="contact-cta">
		<div class="contact-cta__container">
			<?php if( have_rows('cta_contact_boxes') ) :
				while( have_rows('cta_contact_boxes') ) : the_row();
				$rep_email = get_sub_field('rep_email');
				$rep_phone = get_sub_field('rep_phone_number');
				?>
				<div class="ccta-content">
					<h4><?= get_sub_field('campus_location'); ?></h4>
					<h4><?= get_sub_field('rep_name'); ?></h4>
					<a id="email-btn" href="mailto:<?= $rep_email; ?>" class="green-shadow-button-wide">
						<img src="<?= get_sub_field('email_icon')['url']; ?>" alt="Email Icon"> Email <?= get_sub_field('rep_name'); ?>
					</a>
					<a id="phone-btn" href="tel:<?= $rep_phone; ?>" class="green-shadow-button-wide">
						<img src="<?= get_sub_field('phone_icon')['url']; ?>" alt="Phone Icon"> <?= $rep_phone; ?>
					</a>
				</div>
				<?php endwhile;
			endif;
			?>
		</div>
	</section>

</section>

<?php get_footer() ?>