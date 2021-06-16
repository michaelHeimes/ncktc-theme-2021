<div class="row"><!-- Start row -->
	<div class="medium-6 columns">
		<div class="program-description"><?php the_field('program_description'); ?></div>
		<div class="courses"><!-- Start container div -->
			<?php if( have_rows('program_pre_req') ): ?><!-- Start Program Courses -->
				<h3>Available Courses</h3>
				<table>
					<thead>
						<tr>
							<th align="center">Course Code</th>
							<th align="center">Course Name</th>
							<th align="center">Credits</th>
						</tr>
					</thead>
					<tbody>
							<?php while( have_rows('program_pre_req') ): the_row(); 
							$course = get_sub_field('course');
							$post = $course;
							setup_postdata($post); ?>
							<tr>
								<td><?php the_field('course_code'); ?></td>
								<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
								<td class="pre-req-semester"><?php the_field('course_credits'); ?></td>
							</tr>
							<?php wp_reset_postdata(); ?>
						<?php endwhile; ?>
					</tbody>
				</table>
			<?php endif; ?>
		</div>
	</div>
	<div class="medium-6 columns">
		<div class="row">
			<div class="small-12 center">
				<a href="/apply/" class="button success large" id="apply-button">Apply Now!</a>
				<a href="/request-information/" class="button success large" id="apply-button">Request Information</a>
			</div>
		</div>
	</div>
</div><!-- End Row -->