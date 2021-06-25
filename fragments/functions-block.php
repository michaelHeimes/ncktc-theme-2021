<?php
function register_acf_block_types() {
	
    acf_register_block_type(array(
        'name'              => 'strongfutures',
        'title'             => __('Strong Futures'),
        'description'       => __('Strong Futures'),
        'render_template'   => 'fragments/strong-futures.php',
        'category'          => 'formatting',
    ));
    acf_register_block_type(array(
        'name'              => 'fullwidthvideo',
        'title'             => __('Full Width Video'),
        'description'       => __('Full Width Video'),
        'render_template'   => 'fragments/full-width-video.php',
        'category'          => 'formatting',
    ));
    acf_register_block_type(array(
        'name'              => 'large_feature_image_l_r',
        'title'             => __('Large Feature Image (L/R)'),
        'description'       => __('Large Feature Image (L/R)'),
        'render_template'   => 'fragments/large-feature-image-l-r.php',
        'category'          => 'formatting',
    ));
    acf_register_block_type(array(
        'name'              => 'story_carousel',
        'title'             => __('Story Carousel'),
        'description'       => __('Story Carousel'),
        'render_template'   => 'fragments/story-carousel.php',
        'category'          => 'formatting',
    ));
    acf_register_block_type(array(
        'name'              => 'testimony_carousel',
        'title'             => __('Testimony Carousel'),
        'description'       => __('Testimony Carousel'),
        'render_template'   => 'fragments/testimony-carousel.php',
        'category'          => 'formatting',
    ));
	
    acf_register_block_type(array(
        'name'              => 'events_block',
        'title'             => __('Events Block'),
        'description'       => __('Events Block'),
        'render_template'   => 'fragments/events-block.php',
        'category'          => 'formatting',
    ));
	
	acf_register_block_type(array(
        'name'              => 'accordion_block',
        'title'             => __('Accordion Block'),
        'description'       => __('Accordion Block'),
        'render_template'   => 'fragments/accordion-block.php',
        'category'          => 'formatting',
    ));

    
}


if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_types');
}
?>    