<?php
/* Template Name: Alumni */
?>
<?php get_header() ?>

<section class="alumni-header">
	<div class="ribbon-container"> <!-- in [_globals.scss] -->
		<div class="ribbon-container__blue-ribbon">
		</div>
		<h1>Alumni</h1>
	</div>

	<div class="alumni-form-boxes">
		<div class="alumni-form-boxes__box">
			<h3>Join the Alumni Association</h3>
			<?php gravity_form( 82, false, false, false, '', false ); ?>
		</div> <!-- /.[__box] -->

		<div class="alumni-form-boxes__right">
			<a href="https://www.surveymonkey.com/r/ncktc-student-follow-up?sm=kyvQhMMrQOKL6Vyw7ksbmSTfek9NSk08l21ZA8CJSvg%3d" class="alumni-form-boxes__right--square">
				<?php include 'img/nckicons/survey-icon.svg'; ?>
				<span class="h5-heading">Follow-Up Surveys</span>
			</a>

			<a href="/transcript-request/" class="alumni-form-boxes__right--square">
				<?php include 'img/nckicons/transcript-icon.svg'; ?>
				<span class="h5-heading">Transcript Request</span>
			</a>
		</div> <!-- /.alumni-form-boxes__right -->
	</div> <!-- /.alumni-form-box -->

</section>
<img class="alumni-header__bottom-bar" src="<?php echo get_stylesheet_directory_uri(); ?>/img/bottom-header-bar.png" alt="Grey bar at bottom of header">

<section class="alumni-main">
	<!-- full-width banner -->
	<div class="banner-fw">
		<div class="banner-fw__inner">
			<h3>Make A Donation</h3>
			<a class="green-shadow-button" href="/alumni/donate/">Donate Now</a>
		</div>
	</div>

	<!-- cta-cards -->
	<div class="alumni-cta-wrapper">
		<div class="alumni-cta-links">
			<?php if( have_rows('cta_cards_by_four') ):
				while( have_rows('cta_cards_by_four') ): the_row();

				//vars
				$ctaImageFour = get_sub_field('cta_by_four_image');
				$ctaTextFour = get_sub_field('cta_by_four_header');
				$ctaLinkFour = get_sub_field('cta_by_four_card_link');
				?>
					<a href="<?php echo $ctaLinkFour; ?>" class="alumni-cta-links__card">
						<div class="placement-card-image" style="background-image: url('<?php echo $ctaImageFour['url']; ?>');">
							<h5><?php echo $ctaTextFour; ?></h5>
						</div>
					</a>
				<?php endwhile; ?>
			<?php endif; ?>
		</div> <!-- /.alumni-cta-links -->
	</div> <!-- /.alumni-cta-wrapper -->	
</section>

<?php get_footer() ?>