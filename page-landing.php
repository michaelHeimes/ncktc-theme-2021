<?php
/*
Template Name: Landing Page
*/
get_header(); 
$headerbg = get_post_meta($post->ID,'header_bg',true);
$b1 = get_post_meta($post->ID,'blue_one_ico',true);
$b2 = get_post_meta($post->ID,'blue_two_ico',true);
$b3 = get_post_meta($post->ID,'blue_three_ico',true);
$b4 = get_post_meta($post->ID,'blue_four_ico',true);
$b5 = get_post_meta($post->ID,'blue_bottom_one_ico',true);
$b6 = get_post_meta($post->ID,'blue_bottom_two_ico',true);
$b7 = get_post_meta($post->ID,'blue_bottom_three_ico',true);
$gf = get_post_meta($post->ID,'header_gf',true);
?>
	<div id="top-header" title="Header Top" style="background:url('<?php echo $headerbg['url']; ?>') no-repeat center;">
		<div class="row">
			<div class="small-12 columns">
				<div class="head-caption">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/landinglogo.png" alt="NCK Logo" />
					<?php echo get_post_meta($post->ID,'header_txt',true); ?>
				</div>
				<div class="gf-container">
					<h4><?php echo get_post_meta($post->ID,'header_gf_txt',true); ?></h4>
					<?php echo do_shortcode($gf); ?>
				</div>
			</div>
		</div>
	</div>
	<div id="blue-bar" class="blue-bar">
		<div class="row">
			<div class="small-12 large-3 columns">
				<img src="<?php echo $b1['url']; ?>" alt="<?php echo $b1['alt']; ?>" />
				<h2><?php echo get_post_meta($post->ID,'blue_one_head',true); ?></h2>
				<p><?php echo get_post_meta($post->ID,'blue_one_txt',true); ?></p>
			</div>
			<div class="small-12 large-3 columns">
				<img src="<?php echo $b2['url']; ?>" alt="<?php echo $b2['alt']; ?>" />
				<h2><?php echo get_post_meta($post->ID,'blue_two_head',true); ?></h2>
				<p><?php echo get_post_meta($post->ID,'blue_two_txt',true); ?></p>
			</div>
			<div class="small-12 large-3 columns">
				<img src="<?php echo $b3['url']; ?>" alt="<?php echo $b3['alt']; ?>" />
				<h2><?php echo get_post_meta($post->ID,'blue_three_head',true); ?></h2>
				<p><?php echo get_post_meta($post->ID,'blue_three_txt',true); ?></p>
			</div>
			<div class="small-12 large-3 columns">
				<img src="<?php echo $b4['url']; ?>" alt="<?php echo $b4['alt']; ?>" />
				<h2><?php echo get_post_meta($post->ID,'blue_four_head',true); ?></h2>
				<p><?php echo get_post_meta($post->ID,'blue_four_txt',true); ?></p>
			</div>
		</div>
	</div>
	<div id="landing-content">
		<div class="row">
			<div class="small-12 large-5 columns" role="main">
				<h1>Career Paths</h1>
				<div class="top-program">
					<h2><?php echo get_post_meta($post->ID,'top_one_head',true); ?></h2>
					<p><?php echo get_post_meta($post->ID,'top_one_txt',true); ?></p>
					<p class="salary">Avg. Salary: <?php echo get_post_meta($post->ID,'top_one_salary',true); ?></p>
				</div>
				<div class="top-program">
					<h2><?php echo get_post_meta($post->ID,'top_two_head',true); ?></h2>
					<p><?php echo get_post_meta($post->ID,'top_two_txt',true); ?></p>
					<p class="salary">Avg. Salary: <?php echo get_post_meta($post->ID,'top_two_salary',true); ?></p>
				</div>
				<div class="top-program">
					<h2><?php echo get_post_meta($post->ID,'top_three_head',true); ?></h2>
					<p><?php echo get_post_meta($post->ID,'top_three_txt',true); ?></p>
					<p class="salary">Avg. Salary: <?php echo get_post_meta($post->ID,'top_three_salary',true); ?></p>
				</div>
				<div class="top-program">
					<h2><?php echo get_post_meta($post->ID,'top_four_head',true); ?></h2>
					<p><?php echo get_post_meta($post->ID,'top_four_txt',true); ?></p>
					<p class="salary">Avg. Salary: <?php echo get_post_meta($post->ID,'top_four_salary',true); ?></p>
				</div>
				<div class="top-program">
					<h2><?php echo get_post_meta($post->ID,'top_five_head',true); ?></h2>
					<p><?php echo get_post_meta($post->ID,'top_five_txt',true); ?></p>
					<p class="salary">Avg. Salary: <?php echo get_post_meta($post->ID,'top_five_salary',true); ?></p>
				</div>
			</div>
			<div class="small-12 large-7 columns" role="main">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
	<div id="white-action">
		<div class="row">
			<div class="small-12 columns">
				<?php echo get_post_meta($post->ID,'call_action_txt',true); ?>
			</div>
		</div>
	</div>
	<div id="blue-bottom" class="blue-bar">
		<div class="row">
			<div class="small-12 large-4 columns">
				<?php if(get_post_meta($post->ID,'blue_bottom_one_link',true) != ''){?> <a href="<?php echo get_post_meta($post->ID,'blue_bottom_one_link',true); ?>"> <?php }; ?>
					<img src="<?php echo $b5['url']; ?>" alt="<?php echo $b5['alt']; ?>" />
					<h2><?php echo get_post_meta($post->ID,'blue_bottom_one_head',true); ?></h2>
					<p><?php echo get_post_meta($post->ID,'blue_bottom_one_txt',true); ?></p>
				<?php if(get_post_meta($post->ID,'blue_bottom_one_link',true) != ''){?> </a> <?php }; ?>
			</div>
			<div class="small-12 large-4 columns">
				<?php if(get_post_meta($post->ID,'blue_bottom_two_link',true) != ''){?> <a href="<?php echo get_post_meta($post->ID,'blue_bottom_two_link',true); ?>"> <?php }; ?>
					<img src="<?php echo $b6['url']; ?>" alt="<?php echo $b6['alt']; ?>" />
					<h2><?php echo get_post_meta($post->ID,'blue_bottom_two_head',true); ?></h2>
					<p><?php echo get_post_meta($post->ID,'blue_bottom_two_txt',true); ?></p>
				<?php if(get_post_meta($post->ID,'blue_bottom_two_link',true) != ''){?> </a> <?php }; ?>
			</div>
			<div class="small-12 large-4 columns">
				<?php if(get_post_meta($post->ID,'blue_bottom_three_link',true) != ''){?> <a href="<?php echo get_post_meta($post->ID,'blue_bottom_three_link',true); ?>"> <?php }; ?>
					<img src="<?php echo $b7['url']; ?>" alt="<?php echo $b7['alt']; ?>" />
					<h2><?php echo get_post_meta($post->ID,'blue_bottom_three_head',true); ?></h2>
					<p><?php echo get_post_meta($post->ID,'blue_bottom_three_txt',true); ?></p>
				<?php if(get_post_meta($post->ID,'blue_bottom_three_link',true) != ''){?> </a> <?php }; ?>
			</div>
		</div>
	</div>
	<div id="green-footer">
		<div class="row">
			<div class="small-12 columns">
				<p class="footer-links"><?php echo get_post_meta($post->ID,'footer_links',true); ?></p>
				<p class="copyright"><?php echo get_post_meta($post->ID,'footer_copyright',true); ?></p>
			</div>
		</div>
	</div>
<?php get_footer(); ?>