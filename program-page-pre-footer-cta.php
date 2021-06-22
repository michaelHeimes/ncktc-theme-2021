<section class="program-page-pre-footer-cta">
<h2 class="pre-footer-heading">Interested in AGRICULTURAL EQUIPMENT TECHNOLOGY?</h2>
<?php
$pre_footer_heading = get_field('pre-footer_heading' , 'option');
$image = get_field('image' , 'option');
$imageurl = $image['url'];
$button_text = get_field('button_text' , 'option');
$button_link = get_field('button_link' , 'option');

echo '<div class="program-page-pre-footer-cta-inner">';

echo '<div class="program-page-pre-footer-cta-imageside">';
echo '<h3>' . $pre_footer_heading . '</h3>';
echo '<img class="program-page-pre-footer-image" src="' . $imageurl . '"/>';
echo '<a href="' . $button_link . '">' . $button_text . '</a>';
echo '</div>';

echo '<div class="program-page-pre-footer-cta-blocks">';
echo '<div class="program-page-pre-footer-cta-blocks-inner">';
if( have_rows('program_cta_block', 'option') ){
	while( have_rows('program_cta_block', 'option') ) { the_row();
		echo '<div class="cta_block-item">';
		$heading = get_sub_field('heading');
		$button_text = get_sub_field('button_text');
		$button_link = get_sub_field('button_link');
		echo '<h3>' . $heading . '</h3>';
		echo '<a href="' . $button_link . '">' . $button_text . '</a>';
		echo '</div>';
	}
}
echo '</div>';
echo '</div>';

echo '</div>';

?>
<style>
.program-page-pre-footer-cta {
	//background-color: lightblue;
	background-image: url('/wp-content/uploads/2021/06/Rectangle-3-Copy-4.jpg');
	padding-top: 52px;
	padding-bottom: 91px;
}
	
.program-page-pre-footer-cta-inner {
	max-width: 1000px;
	margin: 0 auto;
	display: flex;
	justify-content: center;
}

.program-page-pre-footer-cta .cta_block-item {
	width: 386px;
	padding: 24px;
	text-align: center;
	background: white;
	margin-bottom: 20px;
}

.program-page-pre-footer-cta .cta_block-item:last-of-type {
	margin-bottom: 0;
}

.program-page-pre-footer-cta-blocks {
	width: 386px;
}

.program-page-pre-footer-cta-blocks-inner {
	//border-right: 1px solid #B9C3CE;
}

.program-page-pre-footer-cta h2 {
	margin-bottom: 37px;
	text-align: center;
	//font-size: 45px;
	font-family: Good Headline Pro, sans-serif;
	font-style: italic;
	font-size: 36px;
	color: #104C7F;
	max-width: 1000px;
	margin-left: auto;
	margin-right: auto;
}
.program-page-pre-footer-cta-imageside {
	width: 386px;
	text-align: center;
	margin-right: 20px;
	background: white;
}

.program-page-pre-footer-image {
	width: 352px;
	height: 179px;
	margin: auto;
	display: block;
}

.program-page-pre-footer-cta-imageside a {
	position: relative;
	bottom: 10px;
}

.program-page-pre-footer-cta-imageside h3 {
	font-size: 30px;
	margin-bottom: 13px;
	margin-top: 27px;
}

</style>
</section>

