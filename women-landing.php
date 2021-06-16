<?php
/*
 * Template Name: Women In Tech Landing
 * Description: For the Women In Tech Initiative by NCK
 * NOTE: For occurences of "wit" = (Women In Tech) 
*/
?>

<?php get_header() ?>

<!-- Event snippet for Women In Tech Conversions conversion page -->
<script>
	gtag('event', 'conversion', {'send_to': 'AW-865246463/NCfyCK-mlJYBEP-5ypwD'});
</script>

<!-- this section holds the container for the video modal and header text as well as linked-forms -->
<section class="wit-header">
	<video id="wit-bg-video" class="wit-video" preload="none" autoplay muted loop>
		<source src="https://ncktc.edu/wp-content/uploads/2019/02/header.mp4" type="video/mp4">
	</video>

	<div id="wit-video-container" class="wit-fade-container">
		<div class="rel-container">
			<video id="wit-video-inner" class="wit-fade-video" controls="controls" preload="none" poster="<?= get_field('video_poster')['url']; ?>">
				<source src="<?= get_field('header_video'); ?>" type="video/mp4">
			</video>
			<a class="close-video" href="javascript: void(0);">X</a>
		</div>
	</div>

	<div class="wit-header__overlay">
		<h1><?php the_field('header_title') ?></h1>
		<p><?php the_field('header_tag_line'); ?></p>
		<a class="play-button" href="javascript: void(0);">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/play-icon.png" alt="Click to play video">
			<span style="padding-left: 5px;">Play Video</span>
		</a>
	</div> <!-- /.[wit-header__overlay] -->
</section>

<img class="header-bottom-bar" src="<?php echo get_stylesheet_directory_uri(); ?>/img/bottom-header-bar.png" alt="Grey divider bar">

<section class="wit-wrapper">

	<div class="intro-paragraph-wrapper">
		<p class="intro-paragraph"><?= get_field('intro_para'); ?></p>
	</div>

	<div class="intro-header">
		<h1>Choose Your Career</h1>
	</div>

	<div class="wit-cta-snippets">
		<?php if( have_rows('cta_snippets') ) :
			while( have_rows('cta_snippets') ) : the_row(); ?>
				<div class="cta-snippets">
					<h3><?= get_sub_field('cta_title'); ?></h3>
					<p><?= get_sub_field('cta_sentence'); ?></p>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>

	<div class="program-video-cards">
		<div class="program-video-cards__container">

			<?php $rows = get_field('program_videos');
				  $links = get_field('helpful_links');
				  $rowCount = count($rows);
				  $i = 1;

			if( $rows ) :
				foreach( $rows as $row ) : the_row(); ?>
					<div class="row-container">
						<iframe src="https://youtube.com/embed/<?= $row['video_source']; ?>?autoplay=0&origin=https://ncktc.edu/" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						<div class="program-video-cards__container--below">
							<h3><?= $row['video_box_header']; ?></h3>
							<p class="program-statistic"><?= $row['program_statistic']; ?></p>
							<p class="program-statistic-two"><?= $row['program_statistic_two']; ?></p>
							<p class="program-paragraph"><?= $row['video_box_paragraph']; ?></p>
							<a class="learn-more-green-button" href="<?= $row['video_box_button_one_link']; ?>"><?= $row['video_box_button_one_text']; ?></a>
						</div>
					</div> <!-- /.[row_container] -->

					<?php if( $i == $rowCount ) : ?>
						<div class="info-menu">
							<h3>Additional Resources</h3>
							<ul class="info-menu__menu">
								<?php foreach( $links as $link ) : the_row(); ?>
								<li class="info-menu--item">
									<a class="learn-more" href="<?= $link['link_destination'] ?>"><?= $link['link_title']; ?></a>
								</li>
								<?php endforeach; ?>
							</ul>
						</div> <!-- /.[info-menu] -->
					<?php endif; $i++; ?>

				<?php endforeach; ?>
			<?php endif; ?>
		</div> <!-- /.[__container] -->
	</div> <!-- /.[program-video-cards] -->

	<div class="info-boxes">
		<div class="info-boxes__box">
			<h2>Tour a <br>Campus!</h2>
			<?php gravity_form( 79, false, false, false, '', false ); ?>
			<!-- Form Name: Schedule A Visit / ID: 79 -->
			<!-- This form populates the Main Form on the "*/visit/" Page -->
		</div> <!-- /.[__left] -->

		<div class="info-boxes__box">
			<h2>Apply <br>Today!</h2>
			<?php gravity_form( 80, false, false, false, '', false ); ?>
			<!-- Form Name: Apply Today / ID: 80 -->
			<!-- This form populates the Main Form on the "*/apply/" Page -->
		</div> <!-- /.[__right] -->
	</div> <!-- /.info-boxes -->

</section>

<?php get_footer() ?>