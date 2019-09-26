<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<?php  
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
						About Us
					</li>
					<li>
						Contact Us
					</li>
				</ul>
				<a href="<?php echo get_page_link(13) ;?>">
					<div class="btn_web">Login</div>
				</a>
			</div>
		</div>
	</header>
	<div id="content" class="site-content">
