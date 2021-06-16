<section class="home-page-pre-footer-cta">
<?php
$pre_footer_heading_one = get_field('pre-footer_heading_one' , 'option');
$pre_footer_heading_two = get_field('pre-footer_heading_two' , 'option');
$pre_footer_form = get_field('pre-footer-form' , 'option');

echo '<div class="home-page-pre-footer-cta-inner">';
echo '<div class="home-page-pre-footer-cta-left">';
echo '<h2>' . $pre_footer_heading_one . '</h2>';
echo '<div class="home-page-pre-footer-cta-left-inner">';
if( have_rows('cta_block', 'option') ){
	while( have_rows('cta_block', 'option') ) { the_row();
		echo '<div class="cta_block-item">';
		$heading = get_sub_field('heading');
		$button_text = get_sub_field('button_text');
		$button_link = get_sub_field('button_link');
		echo '<h3>' . $heading . '</h3>';
		echo '<a href="' . $button_link .'">' . $button_text . '</a>';
		echo '</div>';
	}
}
echo '</div>';
echo '</div>';
echo '<div class="home-page-pre-footer-cta-right">';
echo '<h2>' . $pre_footer_heading_two . '</h2>';
echo $pre_footer_form;
echo '</div>';
echo '</div>';

?>
<style>
.home-page-pre-footer-cta {
	//background-color: lightblue;
	background-image: url('/wp-content/uploads/2021/06/Rectangle-3-Copy-4.jpg');
}
	
.home-page-pre-footer-cta-inner {
	max-width: 1000px;
	margin: 0 auto;
	display: flex;
	padding-top: 52px;
	padding-bottom: 91px;
}

.home-page-pre-footer-cta .cta_block-item {
	width: 386px;
	padding: 24px;
	text-align: center;
	background: white;
	margin-bottom: 19px;
}

.home-page-pre-footer-cta-left {
	padding-right: 40px;
	width: 50%;
}

.home-page-pre-footer-cta-left-inner {
	border-right: 1px solid #B9C3CE;
}

.home-page-pre-footer-cta h2 {
	margin-bottom: 37px;
	text-align: center;
	//font-size: 45px;
	font-family: Good Headline Pro, sans-serif;
	font-style: italic;
	font-size: 36px;
}
.home-page-pre-footer-cta-right {
	width: 50%;
}

</style>
</section>

