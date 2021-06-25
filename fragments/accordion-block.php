<?php 
if( have_rows('accordions') ) {
$is_wide = get_field('is_wide');
if ($is_wide) {
	echo '<div class="accordion-block-container wide">';
}
else {
	echo '<div class="accordion-block-container">';
}
while( have_rows('accordions') ) { the_row();
	$title = get_sub_field('title');
	$content = get_sub_field('content');
	echo '<h3>' . $title . '</h3>';
	echo '<div>' . $content . '</div>';
}
echo '</div>';


?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
jQuery(document).ready(function( $ ) {

$( ".accordion-block-container" ).accordion({
  collapsible: true,
   active: false,
   heightStyle: "content",
   icons: false,
});
});
</script>
<style>
.accordion-block-container {
	width: 50%;
}

.accordion-block-container.wide {
	width: 100%;
}

.accordion-block-container.ui-accordion .ui-accordion-content {
	padding: 20px;
	background: #ECF1F6;
	color: #323232;
}

.accordion-block-container.ui-accordion .ui-accordion-header {
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


.accordion-block-container.ui-accordion .ui-accordion-header::after {
	content: "\f077";
	font-family: "FontAwesome";
	//font-weight: 900;
	float: right;
	padding-right: 10px;
	font-size: 21px;
}

.accordion-block-container.ui-accordion .ui-accordion-header.ui-state-active::after {
	content: "\f078";
}
</style>
<?php }?>