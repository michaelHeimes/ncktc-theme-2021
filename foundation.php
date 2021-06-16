<?php
/* Template Name: Foundations */
?>

<?php get_header() ?>

<section class="foundation-header">
	<div class="ribbon-container"> <!-- in [_globals.scss] -->
		<div class="ribbon-container__blue-ribbon">
		</div>
		<h1>Foundation</h1>
	</div>
</section>
<img class="foundation-header__bottom-bar" src="<?php echo get_stylesheet_directory_uri(); ?>/img/bottom-header-bar.png" alt="Grey bar at bottom of header">


<section class="foundation-main">
	<div class="home-container__first">
		<div class="home-container__first--left">
			<h3><?php echo get_field('foundation_image_header'); ?></h3>
			<p><?php echo get_field('foundation_image_paragraph'); ?></p>
			<a class="green-shadow-button" href="<?php echo get_field('foundation_image_button_link'); ?>"><?php echo get_field('foundation_image_button_text'); ?></a>
		</div>
		<?php $foundationStuImage = get_field('foundation_image');
		if( !empty($foundationStuImage) ) : ?>
			<span class="corner-borders"><img src="<?php echo $foundationStuImage['url']; ?>" alt="<?php echo $foundationStuImage['alt']; ?>"></span>
		<?php endif; ?>
	</div>

	<div class="banner-fw">
		<div class="banner-fw__inner">
			<h3>Make a Donation</h3>
			<a class="green-shadow-button" href="/foundation/donate-now/">Donate Now</a>
		</div>
	</div>

	<?php include 'call-to-action-cards.php'; ?>
	
</section>

<?php get_footer() ?>