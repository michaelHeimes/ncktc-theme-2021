<?php get_header(); ?>
<div id="content" class="row">
<div class="row">
<div class="small-12 column post-title">
	<h2><?php the_title(); ?></h2>
</div>
</div>

<div class="row">
	
	<div class="medium-6 columns">

	<h3>Course Information</h3>

		<p><strong><?php the_field('course_code'); ?></strong></p>
		<p>Credit Hours: <strong><?php the_field('course_credits'); ?></strong></p>
		<p class="requisite">Course Pre-Requisites: 
		<?php if( have_rows('course_pre_requisites') ): ?><!-- Start Course Pre Reqs -->


			<?php while( have_rows('course_pre_requisites') ): the_row(); 
							// vars
							$course = get_sub_field('pre_requisite');
							$post = $course;
							setup_postdata($post); ?>
							<a href="<?php the_permalink(); ?>" ><?php the_field('course_code'); ?></a><span class="comma">,&nbsp;</span>

				<?php wp_reset_postdata();
			
			endwhile; else: ?>

				<strong>None</strong>

		<?php endif; ?>


		</p>
		<p class="requisite">Course Co-Requisites: 
		<?php if( have_rows('course_co_requisites') ): ?><!-- Start Course Co Reqs -->

			<?php while( have_rows('course_co_requisites') ): the_row(); 
							// vars
							$course = get_sub_field('co_requisite');
							$post = $course;
							setup_postdata($post); ?>
							<a href="<?php the_permalink(); ?>" ><?php the_field('course_code'); ?></a><span class="comma">,&nbsp;</span>

				<?php wp_reset_postdata(); 

			endwhile; else: ?>
			
				<strong>None</strong>

		<?php endif; ?>
		</p>	
	</div>

	<div class="medium-6 columns">
		<h3>Course Description</h3>
		<div><?php the_field('course_description'); ?></div>		
	</div>
</div>

<div class="row clearfix">
<br/>
	<span style="float:left; padding:1rem 0 1rem 1rem;"> <?php previous_post_link_plus( array('meta_key' => 'course_code', 'order_by' => 'custom', 'link' => 'Previous Course: %meta') ); ?> </span>
	<span style="float:right; padding:1rem 1rem 1rem 0;"> <?php next_post_link_plus( array('meta_key' => 'course_code', 'order_by' => 'custom', 'link' => 'Next Course: %meta') ); ?> </span>
</div>

</div>
<script type="text/javascript">
	jQuery( document ).ready(function( $ ) {
		$('.requisite .comma:last-child').remove();
	});
</script>
<?php get_footer(); ?>