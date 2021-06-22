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

<section class="foundation-main">
<!--
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
-->

<?php
	$image = get_field('foundation_image');
	$heading = get_field('foundation_image_header');
	$content = get_field('foundation_image_paragraph');
	$button_text = get_field('foundation_image_button_text');
	$button_link = get_field('foundation_image_button_link');
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
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</section>';

	?>
	<div class="banner-fw">
		<div class="banner-fw__inner">
			<h3>Make a Donation</h3>
			<a class="green-shadow-button" href="/foundation/donate-now/">Donate Now</a>
		</div>
	</div>

	<?php include 'call-to-action-cards.php'; ?>
	
</section>
<style>
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

.foundation-main {
	margin-top: 0;
	padding-top: 87px;
	background: white;
}

.banner-fw__inner {
	background-image: url('/wp-content/uploads/2021/06/Rectangle-3-Copy-4.jpg');
}

.banner-fw__inner h3 {
	color: #104C7F;
}

</style>
<?php get_footer() ?>