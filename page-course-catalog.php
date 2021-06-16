<?php get_header(); ?>

<!-- Row for main content area -->
<div id="content" class="row">
<div class="small-12 large-8 columns" role="main">
<div class="entry-content">
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
	<?php the_content(); ?>
	<?php endwhile; ?>
</div>
<div class="row" style="margin: 0 auto; text-align: center;">
<h4><span class="fa fa-search"></span>Search Course Catalog</h4>
	<div class="small-12 medium-6" style="float: none; margin: 0 auto;">
		<input title="Course Filter" id="filter_input" type="text" placeholder="Type to Filter - Search by Name or Course Code" style="margin: 0 auto; float: none;" />
	</div>
</div>

<ul class="filter">

<?php $args = array( // Start Course Catalog
        'post_type' => 'courses',
        'meta_key' => 'course_code',
        'posts_per_page' => -1, 
        'orderby' => 'meta_value',
        'order' => 'ASC'		
	); 
	$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post(); ?>

<li class="panel" style="list-style-type: none;"><?php the_field('course_code'); ?>:&nbsp;<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<?php endwhile; wp_reset_postdata(); ?>

</ul>
<p>T&rtrif; - Course eligible for transfer to a state university.</p>
</div>
<?php get_sidebar(); ?>
</div>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/filter.js"></script>
<script type="text/javascript">	
jQuery(document).ready(function($){
	$(function() {
    	$('#filter_input').fastLiveFilter('.filter');
		 });
});
</script>		
<?php get_footer(); ?>