<?php get_header(); ?>
<div id="content" class="row">
	<div class="row">
		<div class="small-12 column">
			<!-- <h1>Faculty Member</h1> -->
			<h1 style="text-align: center;"><br/><?php the_title(); ?></h1>
			<h3 style="text-align: center;"><?php the_terms( 0 , 'advisors', '', '&nbsp;-&nbsp;', ''); ?></h3>
		</div>
	</div>

	<div class="row">
		<div class="medium-6 columns" style="text-align: center;">
			<?php $image = get_field('staff_image'); ?>
			<img class="single-staff-image" src="<?php echo $image['url']; ?>" alt="<?php $image['alt']; ?>">
		</div>

		<div class="medium-6 columns">
			<p>
				<?php the_field('staff_title'); ?><br>
				<?php the_field('staff_degrees'); ?>
			</p>

			<h4>Contact <?php the_title(); ?></h4>
			<p>Office: <a href="tel:<?php the_field('faculty_phone'); ?>"><?php the_field('faculty_phone'); ?></a><br/>
			Email: <a href="mailto:<?php the_field('faculty_email'); ?>"><?php the_field('faculty_email'); ?></a></p>
		</div>
	</div> <!-- /.row -->

	<div class="row clearfix">
		<br/>
	</div>
</div>
<?php get_footer(); ?>