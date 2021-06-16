<?php
if( have_rows('story') ){
echo '<section class="story-carousel-section page-container">
<div class="story-carousel owl-carousel owl-theme">';
    while( have_rows('story') ) { the_row();

        $image = get_sub_field('image');
        $heading = get_sub_field('heading');
        $content = get_sub_field('content');
        $button_text = get_sub_field('button_text');
        $button_link = get_sub_field('button_link');
		echo '<div class="story-carousel-item">';
		echo '<div class="story-carousel-item-overlay"></div>';
		echo '<div class="story-carousel-item-inner">';
		echo '<div class="story-carousel-item-image item">';
		if ($image){ 
			$imageurl = $image['url'];
			echo '<img src="' . $imageurl . '">';
		}
		echo '</div>';
		echo '<div class="story-carousel-item-content item">';
		echo '<h3>' . $heading . '</h3>';
		echo $content;
		echo '<a href="' . $button_link .'">' . $button_text . '</a>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}

echo '</div>';
?>
<script>
jQuery(document).ready(function( $ ) {
	
	var dragbool = false;
	var items = $(".story-carousel > .story-carousel-item").length;
	if (items > 1) {
		dragbool = true;
	}
	
	$(".story-carousel").owlCarousel({
	items: 1,
	loop: true,
	autoplay: false,
	dots: true,
	nav: true,
	mouseDrag: dragbool,
	touchDrag: dragbool,
	margin: 0,
	navText: ['<i class="fas fa-chevron-left" aria-hidden="true"></i>', '<i class="fas fa-chevron-right" aria-hidden="true"></i>'],
  });

});
</script>
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

.story-carousel .owl-nav {
	background: #B9C3CE;
	margin: 0;
	position: absolute;
	top: 50%;
	left: 49%;
	display: flex;
	flex-direction: column;
}

.story-carousel .owl-nav button:hover {
	background: none !important;
}

.story-carousel .owl-dots {
	position: absolute;
	top: 50%;
	left: 52%;
	display: flex;
	flex-direction: column;
}

.story-carousel .owl-nav button, .story-carousel.owl-carousel .owl-nav button.owl-next, .story-carousel.owl-carousel .owl-nav button.owl-prev {
	padding: 0.5em !important;
	margin-bottom: 0;
}

.story-carousel.owl-carousel button.owl-dot {
	//padding: 0.5em !important;
	padding: 0.25em 0.5em !important;
	margin-bottom: 0;
}

.story-carousel .owl-nav button.owl-prev {
	border-bottom: 2px solid #002F57;
	border-radius: 0;
	padding-bottom: 0.5em !important;
}

.story-carousel.owl-theme .owl-dots .owl-dot span {
	background: transparent;
	border: 2px solid #007BFF;
}

.story-carousel.owl-theme .owl-dots .owl-dot.active span, .story-carousel.owl-theme .owl-dots .owl-dot:hover span {
	background: #007BFF;
}

.story-carousel .owl-stage {
	display: flex;
}

.story-carousel .owl-item {
	margin: auto;
}
</style>
<?php 
echo '</section>';
}

?>