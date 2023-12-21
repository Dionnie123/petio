<?php 
	get_header(); 
	$petio_settings = petio_global_settings();
?>
<div class="page-404">
	<div class="content-page-404">
		<div class="title-error">
			<?php if(isset($petio_settings['title-error']) && $petio_settings['title-error']){
				echo esc_html($petio_settings['title-error']);
			}else{
				echo esc_html__('404', 'petio');
			}?>
		</div>
		<div class="sub-title">
			<?php if(isset($petio_settings['sub-title']) && $petio_settings['sub-title']){
				echo esc_html($petio_settings['sub-title']);
			}else{
				echo esc_html__("Oops! That page can't be found.", "petio");
			}?>
		</div>
		<div class="sub-error">
			<?php if(isset($petio_settings['sub-error']) && $petio_settings['sub-error']){
				echo esc_html($petio_settings['sub-error']);
			}else{
				echo esc_html__("We're really sorry but we can't seem to find the page you were looking for.", 'petio');
			}?>
		</div>
		<a class="btn" href="<?php echo esc_url( home_url('/') ); ?>">
			<?php if(isset($petio_settings['btn-error']) && $petio_settings['btn-error']){
				echo esc_html($petio_settings['btn-error']);}
			else{
				echo esc_html__('Back The Homepage', 'petio');
			}?>
		</a>
	</div>
</div>
<?php
get_footer();