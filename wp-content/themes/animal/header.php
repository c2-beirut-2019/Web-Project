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
		<div class="row align-items-center justify-content-center">
			<div class="col-2 text-left">
				<a href="<?php echo get_home_url(); ?>">
					<div class="logo">
						<img class="img-fluid" src="<?php echo get_template_directory_uri()?>/inc/assets/images/logo.png">
					</div>
				</a>
			</div>
			<div class="col-10 text-right">
				<ul class="d-inline-flex">
					<li>
						<a href="<?php echo get_page_link(17); ?>">
							About Us
						</a>
					</li>
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
				<a href="<?php echo get_page_link(13) ;?>">
					<div class="btn_web">Login</div>
				</a>
			</div>
		</div>
	</header>
	<div id="content" class="site-content">
