<?php
if( have_rows('testimonial') ){
echo '<section class="testimonial-carousel-section page-container1">';
echo '<div class="testimonial-carousel-heading-item desktop">';
$heading = get_field('heading');
echo '<h2>' . $heading . '</h2>';
echo '<div class="testimonial-carousel-heading-item-bottom">';
echo '<div class="testimonial-carousel-nav owl-nav desktop"></div><span class="testimonial-carousel-dots owl-dots"></span>';
echo '</div></div>';
echo '<h2 class="mobile">' . $heading . '</h2>';
echo '<div class="testimonial-carousel-container">';
echo '<div class="testimonial-carousel owl-carousel owl-theme">';
    while( have_rows('testimonial') ) { the_row();

        $image = get_sub_field('image');
        $name = get_sub_field('name');
        $program = get_sub_field('program');
        $video_link = get_sub_field('video_link');
		$imageurl = $image['url'];
		echo '<div class="testimonial-carousel-item" style="background-image: url(' . $imageurl . ')">';
		if ($video_link){
			echo '<a class="video-link" href="' . $video_link . '"><img src="/wp-content/uploads/2021/06/arrow.png"/></a>';
		}
		echo '<div class="testimonial-carousel-item-name">' . $name . '</div>';
		echo '<div class="testimonial-carousel-item-program">' . $program . '</div>';
		echo '</div>';

	}
	
echo '</div></div>';
echo '<div class="testimonial-carousel-nav owl-nav mobile"></div><span class="testimonial-carousel-dots owl-dots"></span>';
?>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/magnific-popup/jquery.magnific-popup.min.js"></script>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/magnific-popup/magnific-popup.css">
<script>
jQuery(document).ready(function( $ ) {
	
	var dragbool = false;
	var items = $(".testimonial-carousel > .testimonial-carousel-item").length;
	if (items > 1) {
		dragbool = true;
	}
	
	$(".testimonial-carousel").owlCarousel({
	items: 3,
	loop: true,
	autoplay: false,
	dots: true,
	nav: true,
	mouseDrag: dragbool,
	touchDrag: dragbool,
	autoWidth: true,
	margin: 30,
	navContainer: '.testimonial-carousel-nav',
	dotsContainer: '.testimonial-carousel-dots',
	navText: ['<i class="fas fa-chevron-left" aria-hidden="true"></i>', '<i class="fas fa-chevron-right" aria-hidden="true"></i>'],
  });

$('.video-link').magnificPopup({
  type: 'iframe'
  
});

});
</script>
<style>

.testimonial-carousel-item {
	width: 300px;
	height: 467px;
	background-size: cover;
	background-repeat: no-repeat;
	color: white;
	display: flex;
	flex-direction: column;
	justify-content: flex-end;
	padding: 0 54px 49px 46px;
	position: relative;
}

.testimonial-carousel-heading-item {
	//width: 300px;
	height: 467px;
	margin-right: 30px;
	display: flex;
	flex-direction: column;
}

.testimonial-carousel-section {
	display: flex;
	max-width: 1220px;
	margin: 80px auto;
}

.testimonial-carousel-heading-item h2 {
	margin-top: 100px;
	font-size: 45px;
}

.testimonial-carousel-nav.owl-nav button, .testimonial-carousel-dots button.owl-dot button {
	background: #B9C3CE;
	color: #222;	
}

.testimonial-carousel-dots {
	display: flex;
	margin-left: 20px;
}

.testimonial-carousel-dots button.owl-dot {
	background: none;
	margin: auto;
}

.testimonial-carousel-dots button.owl-dot span {
	width: 10px;
	height: 10px;
	margin: 5px 7px;
	//background: #D6D6D6;
	display: block;
	-webkit-backface-visibility: visible;
	transition: opacity .2s ease;
	border-radius: 30px;
	background: transparent;
	border: 2px solid #007BFF;
}

.testimonial-carousel-dots button.owl-dot.active span, .testimonial-carousel-dots button.owl-dot:hover span {
	background: #007BFF;
}

.testimonial-carousel-nav.owl-nav button.owl-next, .testimonial-carousel-nav.owl-nav button.owl-prev, .testimonial-carousel-dots button.owl-dot {
	//color: inherit;
	border: none;
	padding: 0 !important;
	font: inherit;
}

.testimonial-carousel-nav.owl-nav button, .testimonial-carousel-nav.owl-nav button.owl-next, .testimonial-carousel-nav.owl-nav button.owl-prev {
	//padding: 0.5em !important;
	margin-bottom: 0;
}

.testimonial-carousel-nav.owl-nav button.owl-prev {
	border-right: 2px solid #002F57;
	border-radius: 0;
	//padding-bottom: 0.5em !important;
	margin-right: 13px;
	padding-right: 13px !important;
}

.testimonial-carousel-heading-item-bottom {
	display: flex;
	margin: auto 0;
}

.testimonial-carousel-nav {
	background: #B9C3CE;
	padding: 7px 13px;
}

.video-link {
	position: absolute;
	top: 40%;
	left: 40%;
}

.video-link img {
	width: auto;
	height: auto;
}

</style>
<?php 
echo '</section>';
}

?>