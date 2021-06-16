jQuery( document ).ready(function( $ ) {
	// vars
	var $main = $('[role=main]');
	var $leftMenu = $('#left-sidebar-menu');

	// Set leftMenu init height
	$(window).load(function(){
		if ( $(window).width() > 640 ){
			$main.css('min-height', $leftMenu.height() + 20);
			$leftMenu.css('height', $main.height());
		}
	});

	// Set leftMenu height on Resize
	$(window).resize(function(){
		if ( $(window).width() > 640 && $main.css('min-height') > 0 ){
			$leftMenu.css('height', $main.height());
		} else if ( $(window).width() > 640 ){
			$main.css('min-height', 800 );
			$leftMenu.css('height', $main.height());
		}
		else {
			$leftMenu.css('height', 'auto');
			$main.css('min-height', 'none');
		}
	});
	
});