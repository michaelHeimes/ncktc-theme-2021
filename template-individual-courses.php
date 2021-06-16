<?php/*
	Template Name: Individual Courses Pages
*/
	?>
<?php get_header(); ?>

<?php include 'interior-page-header-template.php'; ?>

<!-- Row for main content area -->
<div id="content-interior">
	<div class="interior-main" role="main">

		<aside class="interior-menu">
			<?php wp_nav_menu( array(
				'theme_location'=> 'individual-courses',
				'container_id'	=> 'individual-courses-menu',
				'fallback_cb'	=> false,
				) );
			?>
		</aside>

		<div class="interior-main__content">
			<?php while (have_posts()) : the_post(); ?>
				<div class="entry-content">
					<?php the_content(); ?>

					<?php if (have_rows('course_list_sections') ): ?>
						<div class="course-list">
							<?php while ( have_rows('course_list_sections') ) : the_row(); ?>

								<h3><?php the_sub_field('heading'); ?></h3>
								<table>
									<?php if (have_rows('courses') ) : while ( have_rows('courses') ): the_row(); ?>
										<?php 
											$online = get_sub_field('online');
											$individual = get_sub_field('individual');
											$course = false; 
											if ( $online != false ){
												$course = $online;
											} elseif ( $individual != false){
												$course = $individual;
											}
											$course_id = $course->ID;	?>
										<tr>
											<th><?php the_field('course_code', $course_id) ?></th>
											<th><a href="<?php echo get_post_permalink($course_id) ?>"><?php echo $course->post_title ?></a></th>
											<th>Credits:&nbsp;<?php the_field('course_credits', $course_id) ?></th>
										</tr>
										<tr>
											<td colspan="3"><?php the_field('course_description', $course_id); ?></td>
										</tr>
									<?php endwhile; endif; ?>
								</table>

							<?php endwhile; ?>
						</div> <!-- /.course-list -->
					<?php endif; ?>
				</div> <!-- /.entry-content -->
			<?php endwhile; ?>
		</div> <!-- /.interior-main__content -->
	</div> <!-- /.interior-main -->
</div> <!-- /#content-interior -->
<?php get_footer(); ?>