<section id="strongfutures">
	<div class="sf-background" style="background-image: url('<?php $background_image = get_field('background_image'); echo $background_image['url'];?>'); ">
		<div class="sf-container">
			<div class="item content"><?php the_field('content');?></div>
			<div class="item buttonlinks">
				<?php
					if( have_rows('button_links') ) {
					
					    while( have_rows('button_links') ) { the_row();
					
					        $icon = get_sub_field('icon');
					        $heading = get_sub_field('heading');
					        $link = get_sub_field('link');
							echo '<div class="buttonlinks-item">';
					        echo '<img src="' . $icon['url'] . '" />';
							echo '<a href="' . $link . '">' . $heading . '</a>';
							echo '</div>';
						}
						
					}
					    ?>
			</div>
		</div>
	</div>
<style>
.sf-background {
	padding: 80px;
	background-position: left center;
	background-position: -200px;
	background-repeat: no-repeat;
}

.sf-container {
	display: flex;
}

.sf-container > .item {
	width: 50%;
}

.buttonlinks {
	display: flex;
	justify-content: space-around;
	align-items: center;
}

.buttonlinks-item {
	display: flex;
	flex-direction: column;
	width: 50%;
	justify-content: center;
	align-items: center;
	height: 100%;
}

.sf-container h2 {
	font-size: 45px;
}

.buttonlinks-item:first-of-type {
	border-right: 1.5px solid #002F57;
}
</style>
</section>