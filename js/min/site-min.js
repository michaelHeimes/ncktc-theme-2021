jQuery((function(i){i(".accordion-content").each((function(){i(this).hide()})),i(".accordion-label").click((function(){i(this).toggleClass("acc-toggled"),i(this).next(".accordion-content").slideToggle(700)})),i(".homepage-vertical-slider").slick({dots:!0,arrows:!1,slidesToShow:1,slidesToScroll:1,autoplay:!0,autoplaySpeed:3e3}),i(window).width()<1200&&(i(".searchbar-mobile form#searchform").hide(),i("#search-click-handler").click((function(){i("form#searchform").slideToggle(400).addClass("search-padding"),i(".notification-bar-sticky").hide()}))),setTimeout((function(){i("#highlighter").remove(),i("#highlighter-info").fadeOut(400,"linear")}),4e3),i("#shadow").fadeOut(),i(".lightbulb").click((function(){i("#vt-player").toggleClass("zindex"),i("#shadow").toggle(),i(".lightbulb svg g path").toggleClass("lightsoff")})),i(".play-button").click((function(){i("#wit-video-container").fadeIn(1e3),i(".wit-header__overlay").fadeOut(700),i(".wit-bg-video").fadeOut(700),i(".close-video").fadeIn(),i(".intro-paragraph-wrapper").css("visibility","hidden")})),i(".close-video").click((function(){i(".close-video").fadeOut(700),i("#wit-video-container").fadeOut(700),i("#wit-video-inner").get(0).pause(),i(".wit-header__overlay").fadeIn(900),i(".wit-bg-video").fadeIn(1e3),i(".intro-paragraph-wrapper").css("visibility","visible")})),i(".notification-close-button").click((function(){i(".notification-bar-sticky").hide()}))}));