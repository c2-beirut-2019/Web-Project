<?php session_start();   get_header(); ?>
<!-- http://34.247.71.103:4444/pet/toAdopt?page=1&limit=10 -->
<!-- http://34.247.71.103:4444/client -->
<div class="site-page">
	<main>
		<section class="homepage">
			<div class="banner_section">
				<div class="backgroundimg" style="background-image: url(<?php echo get_template_directory_uri()?>/inc/assets/images/pets.jpg);">
					<div class="table_cell">
						<div class="container">
							<div class="title">
								Animals
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
</div>

<script>
	jQuery(document).ready(function($) {
		
		$("body").queryLoader2({
			barColor: "#d8d8d8",
			backgroundColor: "#ffffff",
			percentage: false,
			barHeight: 0,
			minimumTime: 0,
			maxTime: 100000,
			fadeOutTime: 100,
			onComplete: function() {
				setTimeout(function(){
					$('#homepage_loader').fadeOut(500, function() {
						$('#homepage_loader').remove();
					});
				}, 500);
			}
		});
	});
</script>
<?php get_footer();

