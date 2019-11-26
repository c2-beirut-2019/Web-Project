</div><!-- #content -->
	<footer class="site-footer">
		<div class="container">
			<div class="row align-items-start">
				<div class="col-3">
					<a href="<?php echo get_home_url(); ?>">
						<div class="logo">
							<img class="img-fluid" src="<?php echo get_template_directory_uri()?>/inc/assets/images/logo.png">
						</div>
					</a>
				</div>
				<div class="col-3">
					<div class="head">COMPANY</div>
					<ul>
						<li><a href="<?php echo get_page_link(17) ;?>">About Us</a></li>
						<li><a href="<?php echo get_page_link(15) ;?>">Contact Us</a></li>
						<li><a href="<?php echo get_page_link(13) ;?>">Login</a></li>
					</ul>
				</div>
				<div class="col-6">
					<div class="head">SIGN UP TO THE NEWSLETTER</div>
					<form action="" method="post">
						<div class="d-inline-flex">
							<input class="email" type="email" name="email" placeholder="Enter Your Email" required>
							<button type="submit" class="blue_btn">
								Subscribe
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>