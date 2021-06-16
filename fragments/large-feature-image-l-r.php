<?php
$image_location = get_field('image_location');
if ($image_location == "Right") {
	$image_location_class = "right";
}
else {
	$image_location_class = "left";
}
$image = get_field('image');
$subheading = get_field('subheading');
$heading = get_field('heading');
$content = get_field('content');
$button_text = get_field('button_text');
$button_link = get_field('button_link');

?>

<div class="large-feature-image-l-r large-feature-image-l-r-<?php echo $image_location_class; ?>">
	<div class="page-container">
		<div class="inner">
			
			<div class="item featureimage">
			<?php if ($image) {
				$imageurl = $image['url'];
			?>
				<img class="block-img" src="<?php echo $imageurl; ?>">
			<?php } else { echo 'image here';} ?>
			</div>
			<div class="item">
				<div class="lines">
				<div class="block">
					<div class="block-subheading"><h4><?php echo $subheading; ?></h4></div>
					<div class="block-heading"><h3><?php echo $heading; ?></h3></div>
					<div class="block-content"><?php echo $content; ?></div>
					<?php if ($button_text && $button_link ) { ?>
					<a href="<?php echo $button_link['url']; ?>" class="block-link"><?php echo $button_text; ?></a>
					<?php } ?>
				</div>
				</div>
			</div>
		
		</div>
	</div>
</div>
<style>
.large-feature-image-l-r {
	margin: 80px 0;
}

.large-feature-image-l-r .inner {
	display: flex;
	flex-direction: row;
	align-items: center;
}

.large-feature-image-l-r.large-feature-image-l-r-right .inner {
	display: flex;
	flex-direction: row-reverse;
}

.large-feature-image-l-r .inner .item {
	width: 50%;
}
</style>

