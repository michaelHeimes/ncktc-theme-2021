<?php
/* Template Name: 360 Video */
?>
<?php get_header() ?>

<div id="shadow"></div>
<section class="vp-wrapper">
	<h3><?php the_title(); ?></h3>
	<div class="vp-container">
		<div class="vp-player">

			<div id="highlighter" class="vp-playlist-highlight"></div>
			<span id="highlighter-info" class="info-box-sticky">
				<span class="fa fa-sort-down"></span> 
				Use the playlist button to show other sections of campus.
			</span>

			<iframe id="vt-player" src="https://www.youtube.com/embed/TEGucFPZS8E?list=PLgXWcWEtrAn61NJbaP0Z_CaR5E_1XX2SZ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

			<div class="vp-description">
				<p><?php the_field('video_description'); ?></p>
				<p>Want to see more of campus? <a href="/visit/">Schedule a tour</a></p>

				<p>
					<a class="light-switch">
						<span class="lightbulb"> <?php include 'img/lightbulb.svg'; ?> </span>
					</a>
					<span>Click to turn off the lights for a more immersive experience.</span>
				</p>

			</div>
		</div> <!-- /.[vp_player] -->
	</div> <!-- /.[vp-container] -->
</section>

<?php get_footer() ?>