<?php

get_header(); 
?>

<div class="ctc_us_page">
	<div class="container">
		<div class="web_title text-center mb-5">Contact Us</div>
		<div id="location_form_1">
			<?php echo do_shortcode('[contact-form-7 id="39" title="Contact Us"]'); ?>
		</div>
	</div>
</div>


<script>
	jQuery(document).ready(function($) {
		var wpcf7Elm_parr1 = document.getElementById('location_form_1');			
		var wpcf7Elmm1 = wpcf7Elm_parr1.querySelector('.wpcf7');
		if (wpcf7Elmm1) {
			wpcf7Elmm1.addEventListener( 'wpcf7submit', function( event ) {
			});
		}
	});
</script>
<?php
get_footer();
