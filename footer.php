<?php if(!is_page_template("page-landing.php")){ ?>
	</div><!-- Container End -->
<div class="footerbackground">
	<div class="footer-boxes">
		<div class="footer-boxes__box">
		<a class="" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png" alt="NCK Tech College Logo" /></a>
		</div>
		<div class="footer-boxes__box">
			<div class="footer-boxes__box--column">
				<h5>Beloit Campus</h5>
				<p>3033 US HWY 24<br>Beloit, Kansas 67420</p>
			</div>
			<div class="footer-boxes__box--column">
				<a class="map-link" href="https://ncktc.edu/beloit-campus">View In Map &rsaquo;</a>
				<a href="tel:1-800-658-4655">1-800-658-4655</a><br><a href="tel:785-738-2276">785-738-2276</a>
			</div>
		</div>

		<div class="footer-boxes__box">
			<div class="footer-boxes__box--column">
				<h5>Hays Campus</h5>
				<p>2205 Wheatland Ave.<br>Hays, Kansas 67601</p>
			</div>
			<div class="footer-boxes__box--column">
				<a class="map-link" href="https://ncktc.edu/hays-campus">View In Map &rsaquo;</a>
				<a href="tel:1-888-567-4297">1-888-567-4297</a><br><a href="tel:785-625-2437">785-625-2437</a>
			</div>
		</div>

		<div class="footer-boxes__box">
			<div class="footer-boxes__box--menu">
				<h5>Quick Links</h5>
				<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
			</div>
		</div>
		
		<div class="footer-boxes__box">
			<div class="footer-boxes__box--column">
				<iframe frameborder="0" scrolling="no" allowtransparency="true" width="150" height="126" src="https://cdn.yoshki.com/iframe/54732.html" 0="style=&quot;border:0px;" 1="margin:0px;" 2="padding:0px;" 3="backgroundColor:transparent;&quot;>" class="iframe-class"></iframe>
			</div>
		</div>
		
		<div class="footer-boxes__box">
			<div class="footer-boxes__box--social">
				<a href="https://www.facebook.com/ncktc" title="Facebook Icon"><span class="fab fa-facebook fa-lg"></span></a>
				<a href="https://twitter.com/NCKTC" title="Twitter Icon"><span class="fab fa-twitter fa-lg"></span></a>
				<a href="https://www.youtube.com/channel/UCWakMegcE-kSrqVTCuOkkyQ" title="YouTube Icon"><span class="fab fa-youtube fa-lg"></span></a>
				<a href="https://www.instagram.com/ncktech/" title="Instagram Icon"><span class="fab fa-instagram fa-lg"></span></a>
			</div>
		</div>
	</div> <!-- /.footer-boxes -->


	<footer class="footer-main" role="contentinfo">
		<div class="footer-main__box">

			<div class="footer-main__box--left">
				<div class="link-columns__top">
					<?php wp_nav_menu( array( 'theme_location' => 'utility' ) ); ?>
				</div>

				<div class="copyright-box">
					<p style="float: left;">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved. <a href="<?php echo get_page_link(344); ?>">Privacy Policy</a></p>
					<a href="https://ksdegreestats.org/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/KSDegreeStats@2x.png" alt="KS Degree Stats Link"></a>
				</div>
			</div>

			<div class="footer-main__box--right">
				<p><?= get_field( 'footer_disclaimer', 'options' );  ?><a href="/non-discrimination-statement/"> Full Non-Discrimination Statement</a></p>
			</div>
		</div> <!-- /.footer-main__box -->
		</div> <!-- /.footer-background -->
	</footer>
<?php }; ?>
<?php wp_footer(); ?>

<script type="text/javascript">
	//Initialize Foundation
	(function($) {
		//$(document).foundation();
	})(jQuery);

	// Remove Break Tags in Accordion Plugin
	jQuery(document).ready(function(){
		jQuery('.accordion br').remove();
	});

	//Clip shadow from #content area
	jQuery(window).load(function(){
		//init variable
		$content = jQuery('#content');
		//print initial style tag to be modified
		jQuery('<style class="idcontent" type="text/css">#content:before{ clip: rect(0,3000px,'+$content.outerHeight()+'px, -60px);}</style>').appendTo(jQuery('head'));
		//on window resize, replace rule with updated variable
		jQuery(window).resize(function(){
			jQuery('.idcontent').html('#content:before{ clip: rect(0,3000px,'+$content.outerHeight()+'px, -60px);}');
		});
		jQuery('.accordion-title').click(function(){
			function redrawShadow(){
				jQuery('.idcontent').html('#content:before{ clip: rect(0,3000px,'+jQuery('#content').outerHeight()+'px, -60px);}');
			}
			window.setTimeout(redrawShadow, 1000);
			//console.log('accordion-title clicked');
		});

		jQuery('#print-button').attr("href", "javascript:window.print()");
	});
</script>
<script>
 (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
 (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
 m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
 })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

 ga('create', 'UA-9944557-41', 'auto');
 ga('require', 'displayfeatures');
 ga('send', 'pageview');

</script>
<script>(function() {
 var _fbq = window._fbq || (window._fbq = []);
 if (!_fbq.loaded) {
   var fbds = document.createElement('script');
   fbds.async = true;
   fbds.src = '//connect.facebook.net/en_US/fbds.js';
   var s = document.getElementsByTagName('script')[0];
   s.parentNode.insertBefore(fbds, s);
   _fbq.loaded = true;
 }
 _fbq.push(['addPixelId', '292146644306199']);
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', 'PixelInitialized', {}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=292146644306199&amp;ev=PixelInitialized" /></noscript>
<script type="text/javascript">
  (function() {
    window._pa = window._pa || {};
    // _pa.orderId = "myOrderId"; // OPTIONAL: attach unique conversion identifier to conversions
    // _pa.revenue = "19.99"; // OPTIONAL: attach dynamic purchase values to conversions
    // _pa.productId = "myProductId"; // OPTIONAL: Include product ID for use with dynamic ads
    var pa = document.createElement('script'); pa.type = 'text/javascript'; pa.async = true;
    pa.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + "//tag.perfectaudience.com/serve/5429dc77564f88ccfe00002d.js";
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(pa, s);
  })();
</script>

<!-- Hotjar Tracking Code for https://www.ncktc.edu -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:615384,hjsv:5};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
</script>

<!-- Global site tag (gtag.js) - Google Ads: 865246463 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-865246463"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
	gtag('config', 'AW-865246463');
</script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KNX9FPZ');</script>
<!-- End Google Tag Manager -->

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KNX9FPZ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!-- Snap Pixel Code --> <script type='text/javascript'> (function(e,t,n){if(e.snaptr)return;var a=e.snaptr=function(){a.handleRequest?a.handleRequest.apply(a,arguments):a.queue.push(arguments)}; a.queue=[];var s='script';r=t.createElement(s);r.async=!0; r.src=n;var u=t.getElementsByTagName(s)[0]; u.parentNode.insertBefore(r,u);})(window,document, 'https://sc-static.net/scevent.min.js'); snaptr('init', '58693237-9c89-4e2c-bc4c-c1a3696e5860', { 'user_email': '__INSERT_USER_EMAIL__' }); snaptr('track', 'PAGE_VIEW'); </script> <!-- End Snap Pixel Code -->

</body>
</html>