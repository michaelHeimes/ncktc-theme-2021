<?php
/*
Template Name: Home Page
*/
get_header();

the_content();

get_template_part( 'home-page-pre-footer-cta' );
/*
function custom_excerpt_length( $length ) {
        return 25;
    }
    add_filter( 'excerpt_length', 'custom_excerpt_length', 10 );
?>

<!-- main content area -->
<section class="home-container">
	<div class="home-container__first">
		<div class="home-container__first--left">
			<h3><?php echo get_field('left_header'); ?></h3>
			<p><?php echo get_field('left_header_paragraph'); ?></p>
			<a class="green-shadow-button" href="/academics/">Explore Programs</a>
		</div>
		<?php $rightImage = get_field('right_header_image');
		if( !empty($rightImage) ) : ?>
			<img src="<?php echo $rightImage['url']; ?>" alt="<?php echo $rightImage['alt']; ?>">
		<?php endif; ?>
	</div>

	<!-- slider styles are at the top of the "_home-page.scss" file -->
	<div id="homepage-vertical-slider" class="homepage-vertical-slider">
		<?php
			if( have_rows('home_slider') ):
			while( have_rows('home_slider') ): the_row();

			//vars
			$slideImage = get_sub_field('slide_image');
			$slideHeader = get_sub_field('slide_header_text');
			$slidePara = get_sub_field('slide_paragraph_text');
			$slideButtonTxt = get_sub_field('slide_button_text');
			$slideLink = get_sub_field('slide_button_link');
			?>

			<div class="homepage-vertical-slider__slide">
				<img src="<?php echo $slideImage['url']; ?>" alt="<?php $slideImage['alt']; ?>">
				<div class="homepage-vertical-slider__slide-content">
					<div class="slick-dots"></div>
					<h3><?php echo $slideHeader; ?></h3>
					<p><?php echo $slidePara; ?></p>
					<a class="green-shadow-button" href="<?php echo $slideLink; ?>"><?php echo $slideButtonTxt; ?></a>
				</div>
			</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
	<!-- end main slider container -->

	<div class="home-container__split">
		<div class="home-container__split--events">			
			<h3>Upcoming Events</h3>
			<?php
				$i = 0;
				$EM_Events = EM_Events::get( array(
					'scope'=>'future',
					'orderby'=>'event_start_date',
					) );

				$index = 0;
				foreach ( $EM_Events as $event ){
					if ( $event->event_attributes['display_on_homepage'] == 0 ){
						unset($EM_Events[$index]);
					}
					$index++;
				}

				foreach ( $EM_Events as $EM_Event ) :
					$i++;
			?>

			<div class="event-link">
				<div class="event-link__left">
					<span><?php echo $EM_Event->output('#F'); ?></span>
					<span><?php echo $EM_Event->output('#d'); ?></span>
					<span><?php echo $EM_Event->output('#_EVENTTIMES'); ?></span>
				</div>
				<div class="event-link__right">
					<a class="event-url" href="<?php echo $EM_Event->output('#_EVENTURL'); ?>"><?php echo $EM_Event->output('#_EVENTNAME'); ?></a><br>
				</div>
			</div>
			<span class="last"><?php echo $EM_Event->output('#_LOCATIONTOWN'); ?></span>
			<a class="learn-more" href="<?php echo $EM_Event->output('#_EVENTURL'); ?>">Learn More ></a>
			<hr>
			<?php if ( $i === 3 ) {	break 1; } ?>
			<?php endforeach; wp_reset_postdata(); // End Featured Event ?>
			
			<a class="green-shadow-button" href="/events-main/">See All Events</a>	
		</div> <!-- /.home-container__split--events -->

		<div class="divider"></div>

		<div class="home-container__split--news">
			<h3>Recent News</h3>
			<?php $args = array(
			      'post_type' => 'post',
				  'posts_per_page' => 2,
				  'ignore_sticky_posts' => true,
				  'cat' => -12
				);
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<span class="news-title"><?php the_title(); ?></span>
				<p><?php the_excerpt(); ?></p>
				<a class="learn-more" href="<?php the_permalink(); ?>">Read More ></a><br>
				<hr>
			<?php endwhile; wp_reset_postdata(); ?>

			<a class="green-shadow-button" href="/news/">Read More Stories</a>
		</div> <!-- home-container__split--news -->
	</div> <!-- /.home-container__split -->

</section>
*/ ?>
<?php get_footer(); ?>