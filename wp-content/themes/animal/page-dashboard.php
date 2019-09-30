<?php
	get_header(); 
?>
	<section id="primary">
		<main id="main" class="site-main" role="main">
			<?php 
				if($_SESSION['user_or_docter']=='user'){
					?>
					<?php  
						$response = wp_remote_post( 'http://34.247.71.103:4444/client/profile', array(
						    'method'      => 'POST',
						    'timeout'     => 45,
						    'redirection' => 5,
						    'httpversion' => '1.0',
						    'blocking'    => true,
						    'headers'     => array(
						    	'Authorization' => $_SESSION['access_token'],
						    ),
						    'body'        => array(),
						    'cookies'     => array()
						    )
						);
						if ( is_wp_error( $response ) ) {
						    $error_message = $response->get_error_message();
						    echo "Something went wrong: $error_message";
						} else {	   
						  $dashboard= $response['body'];
						  $dash =json_decode( $dashboard, false );
						}
					?>
					<div class="dashboard">
						<div class="container">
							<div class="row align-items-start justify-content-center">
								<div class="col-4">
									<div class="backgroundimg" style="background-image: url(<?php echo get_template_directory_uri()?>/inc/assets/images/user.png);"></div>
									</div>
								<div class="col-8">
									<div class="d-inline-flex mb-3">
										<div class="title">FirstName: </div>
										<div class="short_title"><?php print_r($dash->firstName); ?></div>
									</div><br>
									<div class="d-inline-flex mb-3">
										<div class="title">LastName: </div>
										<div class="short_title"><?php print_r($dash->lastName); ?></div>
									</div><br>
									<div class="d-inline-flex mb-3">
										<div class="title">PhoneNumber: </div>
										<div class="short_title"><?php print_r($dash->phoneNumber); ?></div>
									</div><br>
									<div class="d-inline-flex mb-3">
										<div class="title">Registration Date: </div>
										<div class="short_title"><?php print_r($dash->registrationDate); ?></div>
									</div><br>
									<div class="d-inline-flex mb-3">
										<div class="title">Username: </div>
										<div class="short_title"><?php print_r($dash->username); ?></div>
									</div><br>	
									<div class="d-inline-flex mb-3">
										<div class="title">Last Login Date: </div>
										<div class="short_title"><?php print_r($dash->lastLoginDate); ?></div>
									</div><br>	
								</div>
							</div>
						</div>
					</div>
					<?php  
				}elseif($_SESSION['user_or_docter']=='doctor'){
					?>
					<?php  
						$response = wp_remote_post( 'http://34.247.71.103:4444/doctor/profile', array(
						    'method'      => 'POST',
						    'timeout'     => 45,
						    'redirection' => 5,
						    'httpversion' => '1.0',
						    'blocking'    => true,
						    'headers'     => array(
						    	'Authorization' => $_SESSION['access_token'],
						    ),
						    'body'        => array(),
						    'cookies'     => array()
						    )
						);
						if ( is_wp_error( $response ) ) {
						    $error_message = $response->get_error_message();
						    echo "Something went wrong: $error_message";
						} else {	   
						  $dashboard= $response['body'];
						  $dash =json_decode( $dashboard, false );
						}
					?>
					<div class="dashboard">
						<div class="container">
							<div class="row align-items-start justify-content-center">
								<div class="col-4">
									<div class="backgroundimg" style="background-image: url(<?php echo get_template_directory_uri()?>/inc/assets/images/user.png);"></div>
									</div>
								<div class="col-8">
									<div class="d-inline-flex mb-3">
										<div class="title">FirstName: </div>
										<div class="short_title"><?php print_r($dash->firstName); ?></div>
									</div><br>
									<div class="d-inline-flex mb-3">
										<div class="title">LastName: </div>
										<div class="short_title"><?php print_r($dash->lastName); ?></div>
									</div><br>
									<div class="d-inline-flex mb-3">
										<div class="title">PhoneNumber: </div>
										<div class="short_title"><?php print_r($dash->phoneNumber); ?></div>
									</div><br>
									<div class="d-inline-flex mb-3">
										<div class="title">Registration Date: </div>
										<div class="short_title"><?php print_r($dash->registrationDate); ?></div>
									</div><br>
									<div class="d-inline-flex mb-3">
										<div class="title">Username: </div>
										<div class="short_title"><?php print_r($dash->username); ?></div>
									</div><br>	
									<div class="d-inline-flex mb-3">
										<div class="title">Last Login Date: </div>
										<div class="short_title"><?php print_r($dash->lastLoginDate); ?></div>
									</div><br>	
								</div>
							</div>
						</div>
					</div>
					<?php
				}	
			?>
		</main><!-- #main -->
	</section><!-- #primary -->
<?php
get_footer();
