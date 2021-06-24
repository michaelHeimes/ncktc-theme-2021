<?php get_header(); ?><!-- End Header -->

<div id="content" class="row">
<div class="programs-wrapper">
<?php if (get_field('program_video') == '' || null ) { ?>
		<?php if (get_field('program_picture') == '' || null || false ){ ?>
			<div class="flex-video" title="Video coming soon" style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/img/video-coming-soon.gif'); background-size: cover;"></div>
		<?php } else {
			$image = get_field('program_picture');
			$url = $image['sizes']['large'];
			$alt = $image['alt'];
		?>
			<img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" width="100%" style="box-shadow: 0 7px 10px -6px #4a4a4a;"/> 
		<?php } } else { ?>
		<div class="flex-video">
			<iframe width="640" height="360" src="<?php the_field('program_video'); ?>/?rel=0&wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
		</div><!-- End Flex Video -->
	<?php } ?>

	<h2 class="program-title"><?php the_title(); ?></h2>
	<div class="program-description"><?php the_field('program_description'); ?></div>

	<?php the_content();?>

	<hr>
	<div class="programs-wrapper-cols">
	<div class="programs-wrapper-col-left">
	<?php if (get_field('program_outcomes')){ ?>
		<div class="program-outcomes">
			<h3>Program Outcomes</h3>
			<?php the_field('program_outcomes'); ?>
		</div>
	<?php } ?>
	
		<?php $args = array( // Start Random Advisor
				'post_type' => 'faculty',
				'advisors' => 'program',
				'posts_per_page' => 1, 
				'orderby' => 'rand'			
			); 
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();
		?>
		<div id="counselor" class="panel clearfix" title="Counselor Image" style="background: url(<?php the_field('faculty_image'); ?>) #f2f2f2 -30px bottom no-repeat; background-size: 230px; "><!-- Start Counselor Panel -->
			<!-- <h3>Have any Questions?</h3> -->
			<div class="row">
				<div class="large-3 columnsa"></div>
					<!-- <img src="<?php the_field('faculty_image'); ?>" width="50%" style="position: relative; bottom:-21px; float:left;"/> -->
				<div class="large-9 columns">
					<h3>Have any Questions?</h3>
					<p style="margin:0;"><strong><?php the_title(); ?></strong>
						<br>
							<span>Admissions Advisor</span>
						<br>
						<br>
							<a href="<?php the_permalink(); ?>" class="button success">Contact Me</a>
						<br>
						Text me: <a href="#">785.555.5555</a>
					</p>
				</div>
			</div>
		</div><!-- End Counselor Panel -->
		<?php endwhile; wp_reset_postdata(); // End Random Advisor ?>
		<?php if ( get_field('program_tool_list') ){
			echo '<div class="small-12 columnsa tool-list"><h3>Tool List</h3>';
			the_field('program_tool_list');
			echo '</div>';
		} ?>
		<?php if (is_single(1050) ){ ?>
			<div class="small-12 columns"><h3>A.D. Nursing Additional Information</h3><?php the_field('ad_nursing_specific_info');?></div>
		<?php } ?>
		<?php if (get_field('program_specific')): ?>
			<div class="small-12 columns"><?php the_field('program_specific'); ?></div>
		<?php endif; ?>
		
		
	<div class="large-6a columns1 courses"><!-- Start container div -->

		<!-- Simple Calendar for Underground Tech Program -->
		<?php if( is_single(7705) ) : ?>
			<h3 class="cal-name-header">Training Dates 2020</h3>

			<!-- Horizontal Drilling Schedule -->
			<?php if( have_rows('drilling_calendar_section') ) : ?>
				<div id="ut-class-cal" class="schedule-calendar">
					<h5>Horizontal Directional Drilling</h5>
					<?php while( have_rows('drilling_calendar_section') ) : the_row();

					// Date Check vars
					$drill_end_date = get_sub_field('drilling_date_checker'); // for checking date against current date
					$curr_date = date('Y-m-d H:i:s'); // get current date / time
					strtotime($curr_date);
					strtotime($drill_end_date);

					// acf vars
					$drill_date = get_sub_field('drilling_class_date');
					?>
						<?php if($drill_end_date > $curr_date) : ?>
							<div class="cal-main">
								<span class="cal-date"><?php echo $drill_date; ?></span><br>
							</div>
						<?php endif; ?>

					<?php endwhile; ?>
				</div> <!-- /.[schedule-calendar] -->
			<?php endif; ?>

			<!-- Locator Ops Schedule -->
			<?php if( have_rows('locator_calendar_section') ) : ?>
				<div id="ut-class-cal" class="schedule-calendar">
					<h5>Locator Operations</h5>

					<?php while( have_rows('locator_calendar_section') ) : the_row();
					
					// Date Check vars
					$loc_end_date = get_sub_field('locator_date_checker'); // for checking date against current date
					$curr_date = date('Y-m-d H:i:s'); // get current date / time
					strtotime($curr_date);
					strtotime($loc_end_date);

					// acf vars
					$loc_date = get_sub_field('locator_class_date');
					?>
						<?php if($loc_end_date > $curr_date) : ?>
							<div class="cal-main">
								<span class="cal-date"><?php echo $loc_date; ?></span><br>
							</div>
						<?php endif; ?>

					<?php endwhile; ?>
				</div> <!-- /.[schedule-calendar] -->
			<?php endif; ?>

		<?php endif; ?>
		<!-- end of UT Calendar -->
			<?php 

			
			if( have_rows('program_first') ): ?><!-- Start Program Courses -->
				<h3>Required Courses</h3>
				<div class="accordion-container">
						<?php if(have_rows('program_pre_req')) : ?>
						
						<h3>Pre-Requisite Courses</h3>
						<div>
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
							// vars
							$course = get_sub_field('course');
							$or = get_sub_field('or');
							$or = $or[0];
							if ($or == 'or') {
								$post = $course;
								setup_postdata($post); ?>
								<tr>
									<td><?php the_field('course_code'); ?></td>
									<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span style="float:right"><strong>OR</strong></span></td>
									<td style="text-align: right;"><?php the_field('course_credits'); ?></td>
								</tr> <?php
							} else { 
							$course = get_sub_field('course');
							$post = $course;
							setup_postdata($post); ?>
							<tr>
								<td><?php the_field('course_code'); ?></td>
								<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
								<td class="pre-req-semester"><?php the_field('course_credits'); ?></td>
							</tr>
							<?php } ?>
							<?php wp_reset_postdata(); ?>
						<?php endwhile; ?>
							<tr>
								<td colspan="2"><strong>TOTAL</strong></td>
								<td><strong class="pre-req-semester-total"></strong></td>
							</tr> <!-- End Pre Req Semester -->
							</tbody>
						</table>
						 </div>
						
						<?php endif; ?>
						<h3>First Semester</h3>
						<div>
						<table>
						<thead>
							<tr>
								<th align="center">Course Code</th>
								<th align="center">Course Name</th>
								<th align="center">Credits</th>
							</tr>
						</thead>
						<tbody>
						<?php while( have_rows('program_first') ): the_row(); 
							// vars
							$course = get_sub_field('course');
							$or = get_sub_field('or');
							$or = $or[0];
							$elective = get_sub_field('elective');
								$elective = $elective[0];
								if ($or == 'or' || $elective == 'elective') {
									if ($or == 'or'){ $coursevar = 'OR'; } else { $coursevar = 'ELECTIVE'; }
									$post = $course;
									setup_postdata($post); ?>
									<tr>
										<td><?php the_field('course_code'); ?></td>
										<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span style="float:right"><strong><?php echo $coursevar; ?></strong></span></td>
										<td style="text-align: right;"><?php the_field('course_credits'); ?></td>
									</tr> <?php
								} else {
							$course = get_sub_field('course');
							$post = $course;
							setup_postdata($post); ?>
							<tr>
								<td><?php the_field('course_code'); ?></td>
								<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
								<td class="first-semester"><?php the_field('course_credits'); ?></td>
							</tr>
							<?php } ?>
							<?php wp_reset_postdata(); ?>
						<?php endwhile; ?>
							<tr>
								<td colspan="2"><strong>TOTAL</strong></td>
								<td><strong class="first-semester-total"></strong></td>
							</tr> <!-- End First Semester -->
							</tbody>
							</table>
							</div>
							
						<?php if( have_rows('program_second') ): ?><!-- Start Second Semester -->
							<h3>Second Semester</h3>
							<div>
							<table>
							<thead>
								<tr>
									<th align="center">Course Code</th>
									<th align="center">Course Name</th>
									<th align="center">Credits</th>
								</tr>
							</thead>
							<tbody>
							<?php while( have_rows('program_second') ): the_row(); 
								// vars
								$course = get_sub_field('course');
								$or = get_sub_field('or');
								$or = $or[0];
								$elective = get_sub_field('elective');
								$elective = $elective[0];
								if ($or == 'or' || $elective == 'elective') {
									if ($or == 'or'){ $coursevar = 'OR'; } else { $coursevar = 'ELECTIVE'; }
									$post = $course;
									setup_postdata($post); ?>
									<tr>
										<td><?php the_field('course_code'); ?></td>
										<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span style="float:right"><strong><?php echo $coursevar; ?></strong></span></td>
										<td style="text-align: right;"><?php the_field('course_credits'); ?></td>
									</tr> <?php
								} else { 
								$course = get_sub_field('course');
								$post = $course;
								setup_postdata($post); ?>
								<tr>
									<td><?php the_field('course_code'); ?></td>
									<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
									<td class="second-semester"><?php the_field('course_credits'); ?></td>
								</tr>
								<?php } ?>
								<?php wp_reset_postdata(); ?>
							<?php endwhile; ?>
							<tr>
								<td colspan="2"><strong>TOTAL</strong></td>
								<td><strong class="second-semester-total"></strong></td>
							</tr> <!-- End Second Semester -->
							</tbody>
							</table>
							</div>
							<?php if( have_rows('program_summer') ): ?><!-- Start Summer Semester -->
								<h3>Summer Semester</h3>
								<div>
								<table>
							<thead>
								<tr>
									<th align="center">Course Code</th>
									<th align="center">Course Name</th>
									<th align="center">Credits</th>
								</tr>
							</thead>
							<tbody>
								<?php while( have_rows('program_summer') ): the_row(); 
									// vars
									$course = get_sub_field('course');
									$or = get_sub_field('or');
									$or = $or[0];
									$elective = get_sub_field('elective');
									$elective = $elective[0];
									if ($or == 'or' || $elective == 'elective') {
										if ($or == 'or'){ $coursevar = 'OR'; } else { $coursevar = 'ELECTIVE'; }
										$post = $course;
										setup_postdata($post); ?>
										<tr>
											<td><?php the_field('course_code'); ?></td>
											<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span style="float:right"><strong><?php echo $coursevar; ?></strong></span></td>
											<td style="text-align: right;"><?php the_field('course_credits'); ?></td>
										</tr> <?php
									} else { 
									$course = get_sub_field('course');
									$post = $course;
									setup_postdata($post); ?>
									<tr>
										<td><?php the_field('course_code'); ?></td>
										<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
										<td class="summer-semester"><?php the_field('course_credits'); ?></td>
									</tr>
									<?php } ?>
									<?php wp_reset_postdata(); ?>
								<?php endwhile; ?>
								<tr>
									<td colspan="2"><strong>TOTAL</strong></td>
									<td><strong class="summer-semester-total"></strong></td>
								</tr> 
								</tbody>
							</table>
								</div>
							<?php endif; ?><!-- End Summer Semester -->

						<?php if( have_rows('program_third') ): ?><!-- Start Third Semester -->
							<h3>Third Semester</h3>
							<div>
							<table>
							<thead>
								<tr>
									<th align="center">Course Code</th>
									<th align="center">Course Name</th>
									<th align="center">Credits</th>
								</tr>
							</thead>
							<tbody>
							
								<th align="center" colspan="3"></th>
							<?php while( have_rows('program_third') ): the_row(); 
								// vars
								$course = get_sub_field('course');
								$or = get_sub_field('or');
								$or = $or[0];
								$elective = get_sub_field('elective');
								$elective = $elective[0];
								if ($or == 'or' || $elective == 'elective') {
									if ($or == 'or'){ $coursevar = 'OR'; } else { $coursevar = 'ELECTIVE'; }
									$post = $course;
									setup_postdata($post); ?>
									<tr>
										<td><?php the_field('course_code'); ?></td>
										<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span style="float:right"><strong><?php echo $coursevar; ?></strong></span></td>
										<td style="text-align: right;"><?php the_field('course_credits'); ?></td>
									</tr> <?php
								} else { 
								$course = get_sub_field('course');
								$post = $course;
								setup_postdata($post); ?>
								<tr>
									<td><?php the_field('course_code'); ?></td>
									<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
									<td class="third-semester"><?php the_field('course_credits'); ?></td>
								</tr>
								<?php } ?>
								<?php wp_reset_postdata(); ?>
							<?php endwhile; ?>
							<tr>
								<td colspan="2"><strong>TOTAL</strong></td>
								<td><strong class="third-semester-total"></strong></td>
							</tr><!-- End Third Semester -->
							</tbody>
							</table>
						</div>
						<?php if( have_rows('program_fourth') ): ?><!-- Start Fourth Semester -->
							<h3>Fourth Semester</h3>
							<div>
							<table>
							<thead>
								<tr>
									<th align="center">Course Code</th>
									<th align="center">Course Name</th>
									<th align="center">Credits</th>
								</tr>
							</thead>
							<tbody>
							<?php while( have_rows('program_fourth') ): the_row(); 
								// vars
								$course = get_sub_field('course');
								$or = get_sub_field('or');
								$or = $or[0];
								$elective = get_sub_field('elective');
								$elective = $elective[0];
								if ($or == 'or' || $elective == 'elective') {
									if ($or == 'or'){ $coursevar = 'OR'; } else { $coursevar = 'ELECTIVE'; }
									$post = $course;
									setup_postdata($post); ?>
									<tr>
										<td><?php the_field('course_code'); ?></td>
										<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span style="float:right"><strong><?php echo $coursevar; ?></strong></span></td>
										<td style="text-align: right;"><?php the_field('course_credits'); ?></td>
									</tr> <?php
								} else { 
								$course = get_sub_field('course');
								$post = $course;
								setup_postdata($post); ?>
								<tr>
									<td><?php the_field('course_code'); ?></td>
									<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td> 
									<td class="fourth-semester"><?php the_field('course_credits'); ?></td>
								</tr>
								<?php } ?>
								<?php wp_reset_postdata(); ?>
							<?php endwhile; ?>
							<tr>
								<td colspan="2"><strong>TOTAL</strong></td>
								<td><strong class="fourth-semester-total"></strong></td>
							</tr> <!-- End Fourth Semester -->
							</tbody>
							</table>
							</div>
							<?php endif; endif; ?>
						<?php endif; ?> <!-- Endif for Previous Semesters -->

						<?php if( have_rows('program_general') ): ?><!-- Start General Ed -->
							<h3>General Education Course Requirements</h3>
							<div>
							<table>
							<thead>
								<tr>
									<th align="center">Course Code</th>
									<th align="center">Course Name</th>
									<th align="center">Credits</th>
								</tr>
							</thead>
							<tbody>
							<?php while( have_rows('program_general') ): the_row(); 
								// vars
								$course = get_sub_field('course');
								$or = get_sub_field('or');
								$or = $or[0];
								$elective = get_sub_field('elective');
								$elective = $elective[0];
								if ($or == 'or' || $elective == 'elective') {
									if ($or == 'or'){ $coursevar = 'OR'; } else { $coursevar = 'ELECTIVE'; }
									$post = $course;
									setup_postdata($post); ?>
									<tr>
										<td><?php the_field('course_code'); ?></td>
										<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span style="float:right"><strong><?php echo $coursevar; ?></strong></span></td>
										<td style="text-align: right;"><?php the_field('course_credits'); ?></td>
									</tr> <?php
								} else { 
								$post = $course;
								setup_postdata($post); ?>
								<tr>
									<td><?php the_field('course_code'); ?></td>
									<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
									<td class="general-semester"><?php the_field('course_credits'); ?></td>
								</tr> 
								<?php } ?>
								<?php wp_reset_postdata(); ?>
							<?php endwhile; ?>
							<tr>
								<td colspan="2"><strong>TOTAL</strong></td>
								<td><strong class="general-semester-total"></strong></td>
							</tr>
							</tbody>
							</table>
							</div>
						<?php endif; ?><!-- End General Ed -->
						</div>
						<div class="required-wrap">
							<div>Total Required Hours</div>
							<div class="course-total"></div>
		 				</div>
					
				
				
			<?php else: ?>
				<?php if( have_rows('program_general') ): ?><!-- Start General Ed Alone -->
					<h3>Required Courses</h3>
					<table>
						<thead>
							<tr>
								<th align="center">Course Code</th>
								<th align="center">Course Name</th>
								<th align="center">Credits</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th align="center" colspan="3">General Course Requirements</th>
							</tr>
							<?php while( have_rows('program_general') ): the_row(); 
								// vars
								$course = get_sub_field('course');
								$or = get_sub_field('or');
								$or = $or[0];
								if ($or == 'or') {
									$post = $course;
									setup_postdata($post); ?>
									<tr>
										<td><?php the_field('course_code'); ?></td>
										<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span style="float:right"><strong>OR</strong></span></td>
										<td style="text-align: right;"><?php the_field('course_credits'); ?></td>
									</tr> <?php
								} else { 
								$post = $course;
								setup_postdata($post); ?>
								<tr>
									<td><?php the_field('course_code'); ?></td>
									<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
									<td class="general-semester"><?php the_field('course_credits'); ?></td>
								</tr> 
								<?php } ?>
								<?php wp_reset_postdata(); ?>
							<?php endwhile; ?>
							<tr>
								<td colspan="2"><strong>Total Required Hours</strong></td>
								<td><strong class="general-semester-total"></strong></td>
							</tr>
						</tbody>
					</table>
				<?php endif; ?><!-- End General Ed Alone -->
			<?php endif; ?><!-- END COURSES LISTING -->
			<p class="eligibility">T&rtrif; - Course eligible for transfer to a state university.</p>
			<div class="program-notes">
				<?php if ( get_field('program_notes') != '' || null || false ) {
					echo '<h4>Additional Notes:</h4>';
					the_field('program_notes');
					} ?>
			</div>
		</div><!-- End Container div -->
		
		<?php if( have_rows('program_jobs') ): ?><!-- Start Post Grad Jobs -->
			<h3>Post Graduate Jobs</h3>
			<table class="post-graduate-jobs">
				<thead>
					<tr>
						<th>Job Title</th>
						<th>Annual Salary</th>
					</tr>
				</thead>
				<tbody>
					<?php while( have_rows('program_jobs') ): the_row(); 
						// vars
						$job = get_sub_field('job_title');
						$salary = get_sub_field('annual_salary'); ?>
						<tr>
							<td><?php echo $job; ?></td>
							<td class="green">$<?php echo number_format($salary); ?></td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
			<p>View More Jobs on <a href="http://indeed.com" rel="nofollow">Indeed.com</a></p>
		<?php endif; ?><!-- End Post Grad Jobs -->
		<div id="program-contact" class="small-12 columns">

			<!-- QFC: 1119294440322 -->
			<?php if( have_rows('articulation_agreement_degrees') ): ?>
				<div class="articulation-block">
				<h3>Transfer Options</h3>
					<div>This program offers a seamless transition to Fort Hays State University for the following degrees:</div>
					<?php while( have_rows('articulation_agreement_degrees') ): the_row();

					//vars
					$artText = get_sub_field('articulation_agreement_text');
					$artLink = get_sub_field('articulation_agreement_link');
					?>
					<a href="<?php echo $artLink ?>" class="learn-more graylink"><?php echo $artText; ?></a><br>
					<?php endwhile; ?>
				</div> <!-- /.articulation-block -->
			<?php endif; ?>

		</div>
	
	
	</div>
	
	<div class="programs-wrapper-col-right">
	
		<h3>Department Chair</h3>
		<?php if( in_array('Beloit', get_field('program_locations') ) ) : 
			$post_object = get_field('program_head_beloit');
			$post_object = $post_object[0];
			if( $post_object ): 
			// override $post
			$post = $post_object;
			setup_postdata( $post ); ?>
			<p>Beloit: <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
		<?php wp_reset_postdata(); endif; endif; // End Program Head ?>
		<?php if( in_array('Hays', get_field('program_locations') ) ) :
			$post_object = get_field('program_head_hays');
			$post_object = $post_object[0];
			if( $post_object ):
			// override $post
			$post = $post_object;
			setup_postdata( $post ); ?>
			<p>Hays: <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
		<?php wp_reset_postdata(); endif; endif; // End Program Head ?>
		
		<h3>
		This Program is available in 
		<?php // print_r(get_field('program_locations')[0] ); ?>
		
		<?php if( in_array('Beloit', get_field('program_locations') ) ) :  ?>
			<a href="<?php echo get_permalink(172);?>">Beloit</a><br>
		<?php endif; ?>
		<?php if( in_array('Hays', get_field('program_locations') ) ) : ?>
			<a href="<?php echo get_permalink(174);?>">Hays</a>
		<?php endif; ?>
		</h3>
	
		<?php $posts = get_field('program_instructors');

			if( $posts ): ?>
				<h3>Program Instructors</h3>
				<p>
				<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
					<?php setup_postdata($post); ?>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br/>        
				<?php endforeach; ?>
				</p>
				<?php wp_reset_postdata(); ?>
		<?php endif; ?>
		
		<div class="button-group">
			<a href="/apply/" class="green-shadow-button" id="apply-button">Apply Now!</a>
			<a href="/request-information/" class="green-shadow-button" id="apply-button">Request Info</a>
		</div>
		
		<h3>Program Accreditation</h3>
		<?php
		
		if( have_rows('program_accreditation_logos') ) {
		echo '<div class="program-accreditation-logos">';
			while( have_rows('program_accreditation_logos') ) { the_row();
				$image = get_sub_field('image');
				$imageurl = $image['url'];
				echo '<img src="' . $imageurl  . '"/>';
			
			}
		echo '</div>';
		}
		
		?>
		
	
	</div>
	
	</div>
</div>

</div>
<?php get_template_part( 'program-page-pre-footer-cta' ); ?>
<style>
.programs-wrapper-cols {
	display: flex;
	justify-content: space-between;
}

.programs-wrapper-col-left {
	width: 65%;
}

.programs-wrapper-col-right {
	width: 30%;
}

.program-accreditation-logos {
	display: flex;
	justify-content: space-between;
}

.program-accreditation-logos img {
	width: 67px;
	height: 67px;
	object-fit: contain;
}

.single-programs .programs-wrapper {
	width: 100%;
	max-width: 800px;
	margin: 0 auto;
}

.single-programs .program-title {
	color: #104C7F;
}

.single-programs .button-group {
	display: flex;
}

.accordion-container.ui-accordion .ui-accordion-content {
	padding: 20px;
	background: #ECF1F6;
	color: #323232;
}

.accordion-container table {
	border: none;
	margin: 0;
}

.accordion-container table, .accordion-container table thead, .accordion-container table tfoot, .accordion-container table tr.even, .accordion-container table tr.alt, .accordion-container table tr:nth-of-type(2n) {
	background: transparent;
}

.single-programs .first-semester, .single-programs .first-semester-total, .single-programs .second-semester, .single-programs .second-semester-total, .single-programs .summer-semester, .single-programs .summer-semester-total, .single-programs .third-semester, .single-programs .third-semester-total, .single-programs .fourth-semester, .single-programs .fourth-semester-total, .single-programs .general-semester, .single-programs .general-semester-total, .single-programs .course-total, .single-programs .pre-req-semester, .single-programs .pre-req-semester-total {
	float: none;
}

.accordion-container.ui-accordion .ui-accordion-header {
	background: #ECF1F6;
	margin: 0;
	margin-top: 20px;
	padding: 20px;
	color: #323232;
	font-family: 'Good Headline Pro', sans-serif;
	font-size: 22px;
	font-weight: 400;
	border: 0;
	border-radius: 0;
}

a.graylink {
	background: #ECF1F6;
	padding: 20px;
	color: #323232;
	margin-bottom: 20px;
	font-family: 'Good Headline Pro', sans-serif;
	font-size: 22px;
	font-weight: 400;
}

.tool-list a {
	display: block;
	background: #ECF1F6;
	padding: 20px;
	color: #323232;
	margin-bottom: 20px;
	font-family: 'Good Headline Pro', sans-serif;
	font-size: 22px;
	font-weight: 400;
}

.accordion-container.ui-accordion .ui-accordion-header::after {
	content: "\f077";
	font-family: "FontAwesome";
	//font-weight: 900;
	float: right;
	padding-right: 10px;
	font-size: 21px;
}

.accordion-container.ui-accordion .ui-accordion-header.ui-state-active::after {
	content: "\f078";
}

.articulation-block {
	border: 0;
}

</style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript">/* Start Program Page Scripts */
		jQuery( document ).ready(function( $ ) {
			// Animate #counselor widget
	  //       var el=$('#counselor');
	  //       var el2=$('.footer-widget');
			// var elpos=el.offset().top;
			// $(window).scroll(function () {
			// 	var y=$(this).scrollTop();
			// 	if(y<elpos || y>el2.offset().top-el.height()-140){
			// 		el.stop().animate({'top':40},500);
			// 	} else{
			// 		el.stop().animate({'top':y-elpos+20},500);
			// 	}
			// }); // End Animate Counselor Widget
			//
			// Register SemesterAdd() function
			// vars = 
			// $semesterElementClass = class of element to be looped and added
			// $semesterElementClass = class of container to hold result
			//
			function semesterAdd($semesterElementClass, $semesterTotalClass){
				var values = [];
				$('.'+$semesterElementClass).each(function(){
					var item = $(this).html();
					values.push(item);
				});
				intValues = values.map(function(e) { return parseInt(e) });
				total = 0;
				$.each(intValues,function() {
    				total += this;
				});
				$('.'+$semesterTotalClass).html(total);
				return total;
			}

			// Add per Hour to salaries under $1000
			$('.green').each(function(){
				var $this = this;
				var g = $(this).html().replace('$', '');
				g = g.replace(',', '');
				if ( parseInt(g, 10) < 1000 ){
					//console.log(g);
					$($this).append(' / hr');
				} else { 
					//console.log(g); 
				}
			});
			

			// Register Vars for Totals
			var courseTotal = 0;
			var total = 0;
			// Check for elements then run functions
			if ($('.pre-req-semester')){
				var total = semesterAdd('pre-req-semester', 'pre-req-semester-total');
				courseTotal = courseTotal + total;
				//console.log(courseTotal);
			}
			if ($('.first-semester')){
				var total = semesterAdd('first-semester', 'first-semester-total');
				courseTotal = courseTotal + total;
				//console.log(courseTotal);
			}
			if ($('.second-semester')){
				var total = semesterAdd('second-semester', 'second-semester-total');
				courseTotal = courseTotal + total;
				//console.log(courseTotal);
			}
			if ($('.summer-semester')){
				var total = semesterAdd('summer-semester', 'summer-semester-total');
				courseTotal = courseTotal + total;
				//console.log(courseTotal);
			}
			if ($('.third-semester')){
				var total = semesterAdd('third-semester', 'third-semester-total');
				courseTotal = courseTotal + total;
				//console.log(courseTotal);
			}
			if ($('.fourth-semester')){
				var total = semesterAdd('fourth-semester', 'fourth-semester-total');
				courseTotal = courseTotal + total;
				//console.log(courseTotal);
			}
			if ($('.general-semester')){
				var total = semesterAdd('general-semester', 'general-semester-total');
				courseTotal = courseTotal + total;
				//console.log(courseTotal);
			}
			// Add Program Total to selected element
			$('.course-total').html(courseTotal);
			
		$( ".accordion-container" ).accordion({
      collapsible: true,
       active: false,
	   heightStyle: "content",
	   icons: false,
    });
		}); // End anonymous function on document.ready
	</script><!-- End Program Page Scripts -->
	

<?php get_footer(); ?>