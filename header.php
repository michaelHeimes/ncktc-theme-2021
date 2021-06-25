<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?> > <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes(); ?> > <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes(); ?> "> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?> > <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">

	<title><?php wp_title('|', true, 'right'); ?></title>

	<!-- Mobile viewport optimized: j.mp/bplateviewport -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- Favicon and Feed -->
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo home_url(); ?>/favicon.ico">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">
	<link rel="stylesheet" href="https://use.typekit.net/xdq1unx.css">
	
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
	
	<style>
		.issuuembed { width: 100% !important; height: 90vh !important; max-height: 40rem; } #wp-toolbar.quicklinks { float: none; }
	</style>
<?php wp_head(); ?>

<!-- SiteScout Retargeting -->
<script type="text/javascript">var ssaUrl = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'pixel.sitescout.com/iap/41f86be8f9b56000';new Image().src = ssaUrl;</script>
<script src="https://kit.fontawesome.com/a1844c68d5.js" crossorigin="anonymous"></script>
</head>

<body <?php body_class('antialiased'); ?> >

<?php if( get_field('show_notification_bar', 'options') == 'No' ) : ?>
	<div class="notification-bar-sticky">
		<div class="notification-close-button" aria-role="button" title="Close Button">&times;</div>
		<div class="notification-bar-sticky__content">
			<p><?= get_field('notification_text', 'options'); ?></p>
		</div>
	</div>
<?php endif; ?>

<?php if(!is_page_template("page-landing.php")){ ?>
	<?php do_action( 'tha_body_top' ); ?>
	
	<header id="main-header" class="row" role="navigation">
		<nav id="qlinks" class="quicklinks">
			<div class="link-wrapper">
				<div><!-- push right --></div>
				<div class="quicklinks__right">
					<?php get_search_form(); ?>
					<a href="/covid-19/">COVID-19 Information</a>
					<a href="https://ncktc.ethinksites.com/">Moodle Rooms</a>
					<a href="https://outlook.office.com">Email</a>
					<a href="/cams/">TechKNOW</a>
					<a href="<?php echo get_permalink(375); ?>">Contact Us</a>
					
				</div>
			</div>
		</nav>

		<div class="main-navigation">
			<a class="hide-mobile" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png" alt="NCK Tech College Logo" /></a>
			<?php uberMenu_easyIntegrate(); ?>
			<span id="search-click-handler" class="fa fa-search"></span>
			<span class="searchbar-mobile"><?php get_search_form(); ?></span>
		</div>
	</header>

	<!-- Start the main container -->
	<div class="container" role="document"> <!-- tag closed in footer.php -->
		<div class="wrapper1">
			<?php if( is_front_page() ){ ?>

				<section class="wit-header">
				<?php /* ?>
				
					<video id="wit-bg-video" class="wit-video" preload="none" autoplay="true" muted="true" loop="true">
						<source src="<?php echo get_stylesheet_directory_uri(); ?>/img/header-bg-video.mp4" type="video/mp4" alt="Header Background Image">
					</video>
					<img class="home-mobile-header" src="<?= get_stylesheet_directory_uri(); ?>/img/header-image.png" alt="Header Background Image">
				*/ 
					$rows = get_field('hp_image_library' );
					$rand_row = $rows[ array_rand( $rows ) ];
					$rand_row_image = $rand_row['image' ];
					$randimageurl = $rand_row_image['url'];
					$rand_row_image_text = $rand_row['image_text' ];
					$rand_row_link_text = $rand_row['link_text' ];
					$rand_row_link = $rand_row['link' ];
					//echo '<img class="wit-bg-image" src="' . $randimageurl . '" alt="Header Background Image">';
					?>
 
					<div class="wit-header__bgimage" style="background-image: url(<?php echo $randimageurl; ?>)">
					<?php
					echo '<div class="wit-header__link">';
					echo '<a href="' . $rand_row_link . '"><i class="fas fa-eye"></i> ' . $rand_row_link_text . '</a>';
					echo '</div>';
					?>
					<div class="wit-header__overlay-text">
						<h1 class="home-h1"><?php echo $rand_row_image_text; ?></h1>
						<!--
						<p id="home-sub-header"><?= get_field('sub_header_text'); ?></p>
						<a class="play-button" href="javascript: void(0);">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/play-icon.png" alt="Click to play video">
							<span style="padding-left: 5px;">Play Video</span>
						</a>
						
						<div class="wit-header__bottom-nav">
							<span class="wit-header__bottom-nav--box">
								<a href="/visit/">
									<?php //include 'img/map-marker.svg'; ?>
									<span class="h5-heading">Schedule a Tour</span>
								</a>
							</span>

							<span class="skew-bar"></span>

							<span class="wit-header__bottom-nav--box">
								<a href="/events-main/">
									<?php //include 'img/calendar-icon.svg'; ?>
									<span class="h5-heading">View Upcoming<br>Events</span>
								</a>
							</span>

							<span class="skew-bar"></span>
							
							<span class="wit-header__bottom-nav--box">
								<a class="last-tag" href="/contact/">
									<?php //include 'img/phone-icon.svg'; ?>
									<span class=" h5-heading last-tag--text">Contact Us</span>
								</a>
							</span>
						</div> <!-- /.wrapper1__bottom-nav -->

					</div> <!-- /.[wit-header__overlay] -->
					<div class="wit-header__update_nav">
					<?php
					
					echo '<div class="featured-update-box">';
					$featured_update_image = get_field('featured_update_image');
					$featured_update_title = get_field('featured_update_title');
					$featured_update_link_text = get_field('featured_update_link_text');
					$featured_update_link = get_field('featured_update_link');
					echo '<div class="featured-update-box-scroll">';
					echo '<a href="#">Scroll <i class="fas fa-arrow-right"></i></a>';
					echo '</div>';
					
					if ($featured_update_image) {
						$featured_update_imge_url = $featured_update_image['url'];
						echo '<img class="update_nav_image" src="' . $featured_update_imge_url . '">';
					}
					echo '<div class="update_nav-box-info">';
					echo '<h4 class="update_nav_title">' . $featured_update_title . '</h4>';
					echo '<a href="' . $featured_update_link . '">' . $featured_update_link_text . '</a>';
					echo '</div>';
					echo '</div>';
					
					if( have_rows('hp_update_nav') ) {
					while ( have_rows('hp_update_nav')) { the_row();
					$update_nav_imge = get_sub_field('update_nav_imge');
					$update_nav_title = get_sub_field('update_nav_title');
					$update_nav_link_text = get_sub_field('update_nav_link_text');
					$update_nav_link = get_sub_field('update_nav_link');
					
					if (get_row_index() === 1) {
						
						echo '<div class="update_nav-box left">';
					} else {
						echo '<div class="update_nav-box">';
					}
					
					if ($update_nav_imge) {
						$update_nav_imge_url = $update_nav_imge['url'];
						echo '<img class="update_nav_image" src="' . $update_nav_imge_url . '">';
					}
					echo '<div class="update_nav-box-info">';
					echo '<h4 class="update_nav_title">' . $update_nav_title . '</h4>';
					echo '<a href="' . $update_nav_link . '">' . $update_nav_link_text . ' <i class="fas fa-arrow-right" aria-hidden="true"></i></a>';
					echo '</div>';
					echo '</div>';
					}
					
					}
					?>
					</div>
					</div>
				</section>
				
			<?php } ?>
		</div>
<?php }; ?>