<?php
/* Interior Page Header and banner - include for all interior templates
*  Template this applies to: all templates with [template-*.php]
*/
?>

<?php
// Check to see if there is an image, otherwise, set a default and store it in 'options'
add_option( 'default-image', get_stylesheet_directory_uri() . '/img/interior-default-header.jpg', '', 'yes' );

if( has_post_thumbnail( $post->post_parent ) ) {
	$def_image = wp_get_attachment_url( get_post_thumbnail_id( $post->post_parent ), 'full' );
} else {
	$def_image = get_option( 'default-image' );
}
?>
<!-- get parent pages featured image and set it to the header image for all child pages -->
<section class="interior-header" style="background-image: url('<?php echo $def_image; ?>');">
<div class="ribbon-container"> <!-- in [_globals.scss] -->
		<div class="ribbon-container__blue-ribbon">
		</div>
		<h1><?php echo get_the_title($post); ?></h1>
	</div>
</section>
<img class="interior-header__bottom-bar" src="<?php echo get_stylesheet_directory_uri(); ?>/img/bottom-header-bar.png" alt="Grey Bar at bottom of header">