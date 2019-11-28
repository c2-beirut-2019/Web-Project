</div><!-- #content -->
	<footer class="site-footer">
		<div class="container">
			<div class="row align-items-start">
				<div class="col-3 col-sm-2 col-md-2 col-lg-3 order-2 order-md-1">
					<a href="<?php echo get_home_url(); ?>">
						<div class="logo text-md-left text-sm-right">
							<img class="img-fluid" src="<?php echo get_template_directory_uri()?>/inc/assets/images/logo.png">
						</div>
					</a>
				</div>
				<div class="col-9 col-sm-10 col-md-3 col-lg-3 order-1 order-md-2">
					<div class="head mt-0">COMPANY</div>
					<ul>
						<li><a href="<?php echo get_page_link(15) ;?>">Contact Us</a></li>
						<?php  
							if($_SESSION['access_token'] !=''){
								?>
								<li>
									<a href="<?php echo get_page_link(22) ;?>">
										Dashboard
									</a>
								</li>
								<li>
									<a href="<?php echo get_page_link(28) ;?>">
										Pets
									</a>
								</li>
								<li>
									<a href="<?php echo get_page_link(30) ;?>">
										Appointment
									</a>
								</li>
								<?php
							}
						?>
						<li>
							<?php  
								if($_SESSION['access_token'] !=''){
									if(isset($_POST['submit'])){
										$_SESSION['access_token'] = '';
									}
									?>
									<form action="" method="post">
										<button type="submit" name="submit" class="border-0 text-white" style="background-color: transparent;">Logout</button>
									</form>	
									<?php  
								}else{
									?>
									<a href="<?php echo get_page_link(13) ;?>">
										Login
									</a>
									<?php
								}	
							?>
						</li>
					</ul>
				</div>
				<div class="col-md-7 col-lg-6 order-3 order-md-3">
					<div class="head mt-md-0 mt-sm-5">SIGN UP TO THE NEWSLETTER</div>
					<div id="subs2">
						<div id="form_to_sbmt">
							<?php echo do_shortcode('[contact-form-7 id="37" title="Subscribe"]'); ?>
						</div>
						<div class="d-none succes_message field mt-2 text-white">
						  Thank You For Subscribing!
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<script>
  jQuery(document).ready(function($) {
    var wpcf7Elm_parr1 = document.getElementById('subs2');      
    var wpcf7Elmm1 = wpcf7Elm_parr1.querySelector('.wpcf7');
    if (wpcf7Elmm1) {
      wpcf7Elmm1.addEventListener( 'wpcf7submit', function( event ) {
        $('.form_to_sbmt').css({
          height: '0px',
          opacity: '0'
        });
        $('.succes_message').removeClass('d-none');    
      });
    }
  });
</script>
<?php wp_footer(); ?>
</body>
</html>