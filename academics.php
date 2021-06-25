<?php
/* Template Name: Academics */
?>

<?php get_header() ?>

<section class="academics-header">
	<div class="ribbon-container"> <!-- in [_globals.scss] -->
		<div class="ribbon-container__blue-ribbon">
		</div>
		<h1>Academics</h1>
	</div>
</section>

<section class="academics-main">

	<div class="academics-main__cta-cards">
		<?php if( have_rows('academics_cta_cards') ):
			  while( have_rows('academics_cta_cards') ): the_row();

			  // vars
			  $image = get_sub_field('header_image');
			  $header = get_sub_field('header_text');
			  ?>

				<div class="academics-main__cta-cards--card">
					<div class="card-header" style="background-image: url('<?php echo $image['url']; ?>');">
						<span class="h3-heading"><?php echo $header; ?></span>
					</div>

					<div class="link-group">
						<?php if( have_rows('card_links_group') ):
							while( have_rows('card_links_group') ): the_row();

							// vars
							$link = get_sub_field('card_links');
							$linkText = get_sub_field('card_links_text');
							?>
								<a href="<?php echo $link; ?>">&rsaquo; <?php echo $linkText; ?></a><br>
							<?php endwhile; ?>
						<?php endif; ?>
					</div> <!-- /.link-group -->
				</div> <!-- /.academic-main__cta-cards--card -->
			<?php endwhile; ?>
		<?php endif; ?>
	</div>

	<div class="cta-icons">
		<a href="/individual-courses/courses/" class="cta-icons__icon-box-small">
			<div class="icon-image"><img src="/wp-content/uploads/2021/06/Group-26.png"/></div>
			<span class="h5-heading">View Courses</span>
		</a>

		<a href="/individual-courses/fees-costs/" class="cta-icons__icon-box-small">
			<div class="icon-image"><img src="/wp-content/uploads/2021/06/FeesCosts.png"/></div>
			<span class="h5-heading">Estimated Costs</span>
		</a>

		<a href="/individual-courses/faq/" class="cta-icons__icon-box-small">
			<div class="icon-image"><img src="/wp-content/uploads/2021/06/Group-2.png"/></div>
			<span class="h5-heading">FAQ</span>
		</a>

		<a href="/events/" class="cta-icons__icon-box-small">
			<div class="icon-image"><img src="/wp-content/uploads/2021/06/calendar.png"/></div>
			<span class="h5-heading">Academic Calendar</span>
		</a>
	</div>
</section>
<style>
.academics-main {
	background: none;
}

.academics-main__cta-cards--card, .academics-main__cta-cards--card .link-group {
	background: #ECF1F6;
}

.cta-icons__icon-box-small {
	display: flex;
	flex-direction: column;
}

.cta-icons__icon-box-small .icon-image {
	margin-bottom: auto;
}

.cta-icons__icon-box-small .h5-heading {
	margin-top: 40px;
}

</style>

<?php include 'alt-top-footer.php'; ?>
<?php get_footer() ?>