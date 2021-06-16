<h1>HELLO WORLD</h1>

<?php wp_head(); // error_reporting(E_ALL); ini_set('display_errors', 1);


					// $args = array( // Start Featured Event
			  //       'post_type' => 'event',
			  //       'meta_key' => 'display_on_homepage',
			  //       'meta_value' => true,
					// 'posts_per_page' => 5,	
	    // 			); 
	    // 			$i = 0;
	    // 			$loop = new WP_Query( $args );

	    // 			//print_r($loop->posts);

	    // 			foreach ($loop->posts as $empost) {
	    // 				$EM_Event = em_get_event($empost->ID, 'post_id');	
	    // 				$empost->event_end_date = strtotime($EM_Event->event_end_date);
	    // 				// print_r($empost);
	    // 			}
					//print_r($loop->posts);
					//
					//
					

					$i = 0;
					$EM_Events = EM_Events::get( array(
						'scope'=>'future', 
						'orderby'=>'event_start_date', 
						) );	

					$index = 0;
					foreach ( $EM_Events as $event ){
						if ( $event->event_attributes['display_on_homepage'] == 0){
							unset($EM_Events[$index]);
						}
						$index++;
					}


	   				foreach ( $EM_Events as $EM_Event) :  	
						$i++;		
				?>
				
				
				<hr style="margin: 1rem 0;"/>
				<div style="margin-bottom: 1rem; overflow: hidden;">
					<div href="<?php the_permalink(); ?>" class="event-link" style="display: block; color: #333;">
						<time class="icon">
							<em><?php echo $EM_Event->output('#l'); ?></em>
							<strong><?php echo $EM_Event->output('#F'); ?></strong>
							<span><?php echo $EM_Event->output('#d'); ?></span>
						</time>
					
						<h5><?php echo $EM_Event->output('#_EVENTNAME'); ?><br><small><?php echo $EM_Event->output('#_EVENTTIMES'); ?></small></h5>
						<?php // the_excerpt(); ?><a href="<?php the_permalink(); ?>" class="left">More Info...</a><a href="/events" class="right">More Events</a>
					</div>
				</div>
				<?php if ( $i === 4 ) {	break 1; } ?>
				<?php endforeach; //wp_reset_postdata(); // End Featured Event ?>



<?php 

	//var_dump(getimagesize('https://www.ncktc.edu/wp-content/themes/ncktech/img/iandraemel.png'));


 ?>



<?php wp_footer(); ?>