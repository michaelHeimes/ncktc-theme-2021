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

<section class="partnerships-main">

<?php include 'call-to-action-cards.php'; ?>
<!--
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
	-->
	<?php
	$image = get_field('partnerships_image');
	$heading = get_field('partnerships_header');
	$content = get_field('partnerships_paragraph');
	$button_text = get_field('partnerships_button_one_text');
	$button_text2 = get_field('partnerships_button_two_text');
	$button_link = get_field('partnerships_button_one_link');
	$button_link2 = get_field('partnerships_button_two_link');
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
	echo '<div class="link-wrap">';
	echo '<a href="' . $button_link .'">' . $button_text . '</a>';
	echo '<a class="chev-link" href="' . $button_link2 .'">' . $button_text2 . '</a>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</section>';

	?>

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


</style>
</section>

<?php get_footer() ?>