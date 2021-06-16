<?php
/* Template Name: Partnerships */
?>
<?php get_header() ?>

<section class="partnerships">
	<div class="ribbon-container"> <!-- in [_globals.scss] -->
		<div class="ribbon-container__blue-ribbon">
		</div>
		<h1>Partnerships</h1>
	</div>
</section>
<img class="partnerships__bottom-bar" src="<?php echo get_stylesheet_directory_uri(); ?>/img/bottom-header-bar.png" alt="Grey bar at bottom of header">

<section class="partnerships-main">

<?php include 'call-to-action-cards.php'; ?>

	<div class="home-container__first">
		<div class="home-container__first--left">
			<h3><?php echo get_field('partnerships_header'); ?></h3>
			<p><?php echo get_field('partnerships_paragraph'); ?></p>
			<a class="green-shadow-button" href="<?php echo get_field('partnerships_button_one_link'); ?>"><?php echo get_field('partnerships_button_one_text'); ?></a>
			<a class="green-shadow-button scholarship-button" href="<?php echo get_field('partnerships_button_two_link'); ?>"><?php echo get_field('partnerships_button_two_text'); ?></a>
		</div>
		<?php $partnershipsImage = get_field('partnerships_image');
		if( !empty($partnershipsImage) ) : ?>
			<span class="corner-borders"><img src="<?php echo $partnershipsImage['url']; ?>" alt="<?php echo $partnershipsImage['alt']; ?>"></span>
		<?php endif; ?>
	</div>
</section>

<?php get_footer() ?>