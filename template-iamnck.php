<?php
/**
 * Template Name: I AM NCK Template
 */ ?>
<html>
<head>
<?php wp_head(); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<?php $bg_image = get_field('iamnck_bg', $post->ID); 
      $bg_alt = $bg_image['alt'];
?>

<style type="text/css">
	
body {
	padding: 4em;
	background-color: #444;
	color: #FEE;
	background-image: url(<?php echo $bg_image['url']; ?>);
	background-size: cover;
	background-position: center center;
	font-weight: 300;
}

#shiftnav-toggle-main {
	display: none !important;
}

p {
	font-weight: 400;
}

.iamnck-wrapper {
	max-width: 30em;
	position: relative;
	z-index: 10;
}

.iamnck-logo {
	margin-bottom: 2em;
}

.iamnck-icons {
	margin: 2em 0;
	display: -webkit-box;
	display: -webkit-flex;
	display: -ms-flexbox;
	display: flex;
	-webkit-flex-wrap: wrap;
	    -ms-flex-wrap: wrap;
	        flex-wrap: wrap;
	-webkit-box-pack: justify;
	-webkit-justify-content: space-between;
	    -ms-flex-pack: justify;
	        justify-content: space-between;
}
.iamnck-icon {
	display: block;
	max-width: 30%;
	-webkit-box-flex: 1;
	-webkit-flex: 1 1 30%;
	    -ms-flex: 1 1 30%;
	        flex: 1 1 30%;
}

.iamnck-icon img {
	display: block;
	height: auto;
	max-width: 100%;
}

.deadline {
	font-size: 1em;
	color: inherit;
	margin-bottom: 1em;
	font-weight: 300;
}

.iamnck--button {
	display: inline-block;
	border: 3px solid #FEE;
	color: #FEE;
	padding: .5em 1em;
	margin: 1em 2em 1em 0;
}

.iamnck--button:hover {
	border-color: #0095da;
}

.black-bar {
	position: fixed;
	z-index: -1;
	height: 100vh;
	max-width: 45em;
	width: 100%;
	top: 0;
	left: 0;
	background: rgba(0,0,0,0.75);
}
	


@media screen and (min-width: 40em){
	.iamnck-wrapper {
		margin-left: 2em;
	}

	.black-bar {
		background: -webkit-linear-gradient(left, rgba(0,0,0,0.35) 50%, transparent );
		background: linear-gradient(to right, rgba(0,0,0,0.35) 50%, transparent );
	}
}


</style>
<title><?php wp_title(); ?></title>
</head>

<!-- title attr adds alt text for images obtained via css ('AA' compliance) -->
<body <?php body_class(); ?> title="<?php echo $bg_alt; ?>">

	<div class="black-bar"></div>

	<div class="iamnck-wrapper">

	<img class="iamnck-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/iamncklogo.png" alt="I am NCK Logo" />

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<div class="intro"><?php the_field('iamnck_intro'); ?></div>

		<div class="iamnck-icons">
			<div class="iamnck-icon"><img src='<?php echo get_stylesheet_directory_uri(); ?>/img/iamnckicons/degree.png' alt="Degree Icon" /></div>
			<div class="iamnck-icon"><img src='<?php echo get_stylesheet_directory_uri(); ?>/img/iamnckicons/outofstate.png' alt="Out of State Icon" /></div>
			<div class="iamnck-icon"><img src='<?php echo get_stylesheet_directory_uri(); ?>/img/iamnckicons/smallclass.png' alt="Class Icon" /></div>
			<div class="iamnck-icon"><img src='<?php echo get_stylesheet_directory_uri(); ?>/img/iamnckicons/transferable.png' alt="Transferable Icon" /></div>
			<div class="iamnck-icon"><img src='<?php echo get_stylesheet_directory_uri(); ?>/img/iamnckicons/lowdebt.png' alt="Debt Icon" /></div>
			<div class="iamnck-icon"><img src='<?php echo get_stylesheet_directory_uri(); ?>/img/iamnckicons/indemand.png' alt="In Demand Icon"/></div>
			<div class="iamnck-icon"><img src='<?php echo get_stylesheet_directory_uri(); ?>/img/iamnckicons/financialaid.png' alt="Financial Aid Icon" /></div>
			<div class="iamnck-icon"><img src='<?php echo get_stylesheet_directory_uri(); ?>/img/iamnckicons/jobplacement.png' alt="Job Placement Icon" /></div>
			<div class="iamnck-icon"><img src='<?php echo get_stylesheet_directory_uri(); ?>/img/iamnckicons/handson.png' alt="Hands-on Icon" /></div>
		</div>

		<h3 class="deadline"><?php the_field('iamnck_deadline'); ?></h3>

		<div class="buttons">

			<a href="<?php the_field('iamnck_programs_link'); ?>" class="iamnck--button">View All Programs</a>

			<a href="<?php the_field('iamnck_apply_link'); ?>" class="iamnck--button">Apply Now</a>

		</div>

		<p>North Central Kansas Technical College | Beloit &amp; Hays</p>

	<?php endwhile; endif; ?>

	</div>
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','//connect.facebook.net/en_US/fbevents.js');

fbq('init', '292146644306199');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=292146644306199&ev=PageView&noscript=1" alt="Facebook"
/></noscript>
<!-- End Facebook Pixel Code -->
<?php wp_footer(); ?>
</body>