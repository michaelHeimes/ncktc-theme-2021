<?php get_header(); ?>
<style type="text/css">
	.cafeteria-menu p { margin: 0; }
	@media screen and (max-width: 640px){
		.cafeteria-menu th, .cafeteria-menu td {
			display: block;
		}
		.cafeteria-menu p { display: inline; }
		.cafeteria-menu td:nth-child(2):before{
			content: 'Breakfast: ';
			display: inline;
		}
		.cafeteria-menu td:nth-child(3):before{
			content: 'Lunch: ';
			display: inline;
		}
		.cafeteria-menu td:nth-child(4):before{
			content: 'Dinner: ';
			display: inline;
		}
	}
</style>
<!-- Row for main content area -->
	<div id="content" class="row">
		<div class="small-12 columns" role="main">

		<?php while (have_posts()) : the_post(); ?>
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<header>
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</article>
		<?php endwhile; ?>

		<?php
			$args = array(
				'post_type' => 'food_menus',
				'posts_per_page' => 1,	
			); 
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>

			<h2>Week of: <?php the_title(); ?></h2>

			<table style="width: 100%;" class="cafeteria-menu">
				<thead class="show-for-medium-up">
					<tr>
						<td style="text-align: center;"><span class="fa fa-cutlery"></span></td>
						<td><strong>Breakfast</strong> <br><?php the_field('breakfast_hours', 439); ?></td>
						<td><strong>Lunch</strong> <br><?php the_field('lunch_hours', 439); ?></td>
						<td><strong>Dinner</strong> <br><?php the_field('dinner_hours', 439); ?></td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th>Monday</th>
						<td><?php the_field('monday_breakfast'); ?></td>
						<td><?php the_field('monday_lunch'); ?></td>
						<td><?php the_field('monday_dinner'); ?></td>
					</tr>
					<tr>
						<th>Tuesday</th>
						<td><?php the_field('tuesday_breakfast'); ?></td>
						<td><?php the_field('tuesday_lunch'); ?></td>
						<td><?php the_field('tuesday_dinner'); ?></td>
					</tr>
					<tr>
						<th>Wednesday</th>
						<td><?php the_field('wednesday_breakfast'); ?></td>
						<td><?php the_field('wednesday_lunch'); ?></td>
						<td><?php the_field('wednesday_dinner'); ?></td>
					</tr>
					<tr>
						<th>Thursday</th>
						<td><?php the_field('thursday_breakfast'); ?></td>
						<td><?php the_field('thursday_lunch'); ?></td>
						<td><?php the_field('thursday_dinner'); ?></td>
					</tr>
					<tr>
						<th>Friday</th>
						<td><?php the_field('friday_breakfast'); ?></td>
						<td><?php the_field('friday_lunch'); ?></td>
						<td><?php if ( get_field('friday_dinner') == null || '' || false ){ 
							echo '<strong>Cafeteria Closed</strong>'; } else { the_field('friday_dinner'); } ?></td>
					</tr>
				</tbody>
			</table>

		<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
		
<?php get_footer(); ?>