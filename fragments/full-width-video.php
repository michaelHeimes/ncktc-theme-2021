<section class="fwvideo">
<?php 
$screenshot = get_field('screenshot');
$screenshot_url = $screenshot['url'];
$video_url = get_field('video_url');
$video_id = explode("vimeo.com/", $video_url);
$video_key = $video_id[1];
/*
	<div class="screenshot item">
		<img src="<?php echo $screenshot_url; ?>" />
	</div>
	*/
?>
<div class="fwvideo-overlay" style="background-image: url(<?php echo $screenshot_url; ?>);">

<div class="playbtn item">
		<p><i class="fas fa-play"></i> PLAY</p>
	</div>
</div>
	<div class="fwvideo-container" style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/<?php echo $video_key; ?>" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>
	
<script>
jQuery(document).ready(function( $ ) {
	
	$('.fwvideo-overlay').on('click',function(){
	$(this).hide();
	var vid1=new Vimeo.Player($('.fwvideo-container'));
	vid1.play();
	
	});
	
});
</script>
<style>
.fwvideo {
	position: relative;
}

.fwvideo-overlay {
	position: absolute;
	z-index: 1;
	height: 100%;
	width: 100%;
	left: 0;
	right: 0;
	top: 0;
	bottom: 0;
	background-size: cover;
	display: flex;
	justify-content: center;
	align-items: center;
	color: white;
	cursor: pointer;
}
</style>
</section>