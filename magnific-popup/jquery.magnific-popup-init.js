jQuery(document).ready(function($) {
    $('a[href*=".jpg"], a[href*=".jpeg"], a[href*=".png"], a[href*=".gif"]').each(function(){
        if ($(this).parents('.gallery').length == 0) {
            $(this).magnificPopup({
                type:'image',
                closeOnContentClick: true,
                });
            }
        });
    $('.gallery').each(function() {
        $(this).magnificPopup({
            delegate: 'a',
            type: 'image',
            gallery: {enabled: true}
            });
        });
		
		$('.wp-block-gallery a').magnificPopup({
	  type: 'image',
	  gallery:{
		enabled:true
	  },
	  image: {
            titleSrc: function(item) {
          return item.el.next('figcaption').text();
       }
        },
	  callbacks: {
    buildControls: function() {
		if (this.arrowLeft && this.arrowRight) {
        this.arrowLeft.appendTo(this.contentContainer);
        this.arrowRight.appendTo(this.contentContainer);
		}
    }
}
	});
	
    });