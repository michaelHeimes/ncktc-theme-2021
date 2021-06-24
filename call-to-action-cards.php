<?php 
/* Call To Action Cards 
   On Pages: Current Students / Partnerships / Foundation / Events / About Us
   Current Students Page has a second set of cards (coded in the template)
*/
?>

<div class="cta-cards">
	<?php if( have_rows('tall_call_to_action_cards') ):
		while( have_rows('tall_call_to_action_cards') ): the_row();
		
			//vars
			$ctaImage = get_sub_field('cta_image');
			$ctaHeader = get_sub_field('cta_header');
			$ctaPara = get_sub_field('cta_paragraph');
			$ctaButtonTxt = get_sub_field('cta_button_text');
			$ctaButtonLink = get_sub_field('cta_button_link');
			?>
			<div class="cta-cards__card">
				<img src="<?php echo $ctaImage['url']; ?>" alt="<?php echo $ctaImage['alt']; ?>">

				<div class="top">
					<h3><?php echo $ctaHeader; ?></h3>
					<p><?php echo $ctaPara; ?></p>
				</div>
				<div class="bottom">
					<a class="green-shadow-button-wide" href="<?php echo $ctaButtonLink; ?>"><?php echo $ctaButtonTxt; ?></a>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
</div>