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

</section>

<section class="alumni-header alumni-header-boxes">
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
<style>
.alumni-header {
	box-shadow: none;
	height: 348px;
}

.alumni-header.alumni-header-boxes {
	background: white;
	min-height: auto;
	height: auto;
}

.alumni-header-boxes .alumni-form-boxes__box, .alumni-header-boxes .alumni-form-boxes__right--square {
	background: #ECF1F6;
}

.alumni-header .alumni-form-boxes__right--square span, .alumni-header.alumni-header-boxes h3, .banner-fw__inner h3 {
	color: #104C7F;
}

.alumni-header .alumni-form-boxes__right--square svg #Fill-4, .alumni-header .alumni-form-boxes__right--square svg #Fill-6, .alumni-header .alumni-form-boxes__right--square svg #Fill-8, .alumni-header .alumni-form-boxes__right--square svg #Fill-10, .alumni-header .alumni-form-boxes__right--square svg path#Fill-1 {
	//fill: unset;
	fill: #104C7F;
}

.alumni-header .alumni-form-boxes__right--square svg #Fill-3, .alumni-header .alumni-form-boxes__right--square svg #Fill-5, .alumni-header .alumni-form-boxes__right--square svg #Fill-7, .alumni-header .alumni-form-boxes__right--square svg #Fill-9, .alumni-header .alumni-form-boxes__right--square svg #Fill-11, .alumni-header .alumni-form-boxes__right--square svg #Fill-13, .alumni-header .alumni-form-boxes__right--square svg #Fill-15, .alumni-header .alumni-form-boxes__right--square svg #Fill-17 {
	fill: #104C7F;
}

.banner-fw__inner {
	background-image: url('/wp-content/uploads/2021/06/Rectangle-3-Copy-4.jpg');
}

</style>
<?php get_footer() ?>