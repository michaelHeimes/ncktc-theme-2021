jQuery(function($) {
	// Get the height of the content area for each one, and then hide it. (prevents the "jump" from slideToggle() not getting the right height)
	$('.accordion-content').each(function() {
		$(this).hide();
	});

	// dynamically open and close the faq boxes / rotate the chevron
	$('.accordion-label').click( function() {
		$(this).toggleClass('acc-toggled');
		$(this).next('.accordion-content').slideToggle(700);
	});

	// slick slider
	$('.homepage-vertical-slider').slick({
		dots: true,
		arrows: false,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 3000
	});

	// homepage search bar open/close toggle
	if( $(window).width() < 1200) {
		$('.searchbar-mobile form#searchform').hide(); // hide the form
		$('#search-click-handler').click(function() {
			$('form#searchform').slideToggle(400).addClass('search-padding');
			$('.notification-bar-sticky').hide(); // hide covid banner when search is open
		});
	}

	/*  below is for the 360 video tour page [360-tour.php]  */

	// Remove the playlist highlight after animation is done.
	// Animation lasts 1 second and iterates 4 times (4 seconds)
	setTimeout(function() {
		$('#highlighter').remove();
		$('#highlighter-info').fadeOut(400, 'linear');
	}, 4000);

	// initial "light" state
	$("#shadow").fadeOut();

	// Toggle to change state
	$(".lightbulb").click(function() {
		$('#vt-player').toggleClass('zindex');
		$('#shadow').toggle();
		$('.lightbulb svg g path').toggleClass('lightsoff');
	});

	/* below is for the Women In Tech Page [women-landing.php] */
	// Video Modal v2
	$(".play-button").click(function() {
		$("#wit-video-container").fadeIn(1000);
		$(".wit-header__overlay").fadeOut(700);
		$(".wit-bg-video").fadeOut(700);
		$(".close-video").fadeIn();
		$(".intro-paragraph-wrapper").css('visibility', 'hidden');
	});

	$(".close-video").click(function() {
		$(".close-video").fadeOut(700);
		$("#wit-video-container").fadeOut(700);
		$("#wit-video-inner").get(0).pause();
		$(".wit-header__overlay").fadeIn(900);
		$(".wit-bg-video").fadeIn(1000);
		$(".intro-paragraph-wrapper").css('visibility', 'visible');
	});

	// Function to close the notification-bar
	$('.notification-close-button').click(function() {
		$('.notification-bar-sticky').hide();
	});
});