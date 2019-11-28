<?php session_start(); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<?php  
	// $_SESSION['access_token']= 'Bearer 56134c38a472cc22a92c60ae8ce971c84c443630';
?>
<body <?php body_class(); ?>>
<div id="page" class="site">
	<?php
		global $array_of_user;
		if(is_page(8)){
		?>
		<div id="homepage_loader">
		    <div id="homepage_loader">
			    <div class="loading_centered_cont">
			        <div class="loading_centered_cont_inner">
	       			<?php 
	       				echo do_shortcode('[bodymovin anim_id="10" loop="true" width="200px" align="center"]'); 
	   				?>
			        </div>
			    </div>
			</div>
		</div>
		<?php  
		}
	?>
	<header class="site-header">
		<div class="row align-items-center">
			<div class="col-2 text-left">
				<a href="<?php echo get_home_url(); ?>">
					<div class="logo">
						<img class="img-fluid" src="<?php echo get_template_directory_uri()?>/inc/assets/images/logo.png">
					</div>
				</a>
			</div>
			<div class="col-10 text-right d-none d-lg-block">
				<ul class="d-inline-flex">
					<li>
						<a href="<?php echo get_page_link(15) ;?>">
							Contact Us
						</a>
					</li>
					<?php  
						if($_SESSION['access_token'] !=''){
							?>
							<li>
								<a href="<?php echo get_page_link(22) ;?>">
									Dashboard
								</a>
							</li>
							<li>
								<a href="<?php echo get_page_link(24) ;?>">
									News
								</a>
							</li>
							<li>
								<a href="<?php echo get_page_link(26) ;?>">
									Products
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
				</ul>
				<?php  
					if($_SESSION['access_token'] !=''){
						if(isset($_POST['submit'])){
							$_SESSION['access_token'] = '';
						}
						?>
						<form class="btn_web" action="" method="post">
							<button type="submit" name="submit" class="border-0" style="background-color: transparent;">Logout</button>
						</form>	
						<?php  
					}else{
						?>
						<a href="<?php echo get_page_link(13) ;?>">
							<div class="btn_web">Login</div>
						</a>
						<?php
					}	
				?>
			</div>
			<div class="col-8 d-block d-lg-none">
				<div class="position-relative" style="float: right;">
					<?php  
						if($_SESSION['access_token'] !=''){
							if(isset($_POST['submit'])){
								$_SESSION['access_token'] = '';
							}
							?>
							<form class="btn_web" action="" method="post">
								<button type="submit" name="submit" class="border-0" style="background-color: transparent;">Logout</button>
							</form>	
							<?php  
						}else{
							?>
							<a href="<?php echo get_page_link(13) ;?>">
								<div class="btn_web">Login</div>
							</a>
							<?php
						}	
					?>
				</div>
			</div>
			<div class="col-2 d-block d-lg-none">
				<button class="hamburger hamburger--spring d-block d-lg-none" type="button">
				    <span class="hamburger-box">
					   	 <span class="hamburger-inner"></span>
				    </span>
				</button>
			</div>
		</div>
	</header>
	<div class="header_on_mobile">
		<div class="ipad_size">
			<div class="container">
				<ul>
							<li>
								<a href="<?php echo get_page_link(15) ;?>">
									Contact Us
								</a>
							</li>
					<?php  
						if($_SESSION['access_token'] !=''){
							?>
							<li>
								<a href="<?php echo get_page_link(22) ;?>">
									Dashboard
								</a>
							</li>
							<li>
								<a href="<?php echo get_page_link(24) ;?>">
									News
								</a>
							</li>
							<li>
								<a href="<?php echo get_page_link(26) ;?>">
									Products
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
				</ul>
				<div class="underline"></div>
				<div class="socialmedia_icon">
					<a href="https://www.facebook.com/">
					  <i class="fab facebook fa-facebook-f"></i>
					</a>
					<a href="https://www.instagram.com/">
					 <i class="fab instagram fa-instagram"></i>
					</a>
					<a href="https://www.linkedin.com/in/">
					 <i class="fab linkedin fa-linkedin-in"></i> 
					</a>
					<a href="https://twitter.com/">
					 <i class="fab twitter fa-twitter"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
	<script>
			jQuery(document).ready(function($) {
				$('.hamburger').click(function(event) {
					$(this).toggleClass('is-active');
					$('.site-header').toggleClass('is-active');
					$('.header_on_mobile').toggleClass('active');
					$('.site-main').toggleClass('active');
				});
			});
		</script>
	<div id="content" class="site-content">
