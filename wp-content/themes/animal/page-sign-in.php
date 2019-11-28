<?php
	get_header(); 
?>	
<?php 
	if(isset($_POST['user'])){
		$user= '';
		$response = wp_remote_post( 'http://34.247.71.103:4444/client/authenticate	', array
			(
				'method' => 'POST',
				'headers' => array(
					'Content-Type' => 'application/x-www-form-urlencoded',
				),
				'body' => array(
					'grant_type' => 'password',
					'username'   => $_POST['user'],
					'password'   => $_POST['pswd'],
				),
				'cookies' => array(),
			)
		);
		if ( is_wp_error( $response ) ) {
			echo 'error';
		}else{
			$dashboard= $response['body'];
		  	$dash =json_decode( $dashboard, false );
		  	$access_token= $dash->access_token;
			$_SESSION['user_name']= $dash->firstName;
			$asdsa= $_SESSION['user_name'];
		    $_SESSION['access_token'] = $access_token;
		}
	}
	if(isset($_POST['doctor_user'])){
		$response = wp_remote_post( 'http://34.247.71.103:4444/doctor/authenticate	', array
			(
				'method' => 'POST',
				'headers' => array(
					'Content-Type' => 'application/x-www-form-urlencoded',
				),
				'body' => array(
					'grant_type' => 'password',
					'username'   => $_POST['doctor_user'],
					'password'   => $_POST['doctor_pswd'],
				),
				'cookies' => array(),
			)
		);
		if ( is_wp_error( $response ) ) {
			echo 'error';
		}else{
			$dashboard= $response['body'];
		  	$dash =json_decode( $dashboard, false );
		  	$access_token= $dash->access_token;
		    $_SESSION['access_token'] = $access_token;
		}
	}
?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="login">
				<div class="container">
					<div class="user_or_doctor">
					<?php 
						if($_SESSION['user_or_docter']=='user'){
							if($asdsa==''){
								?>
								<div class="access_code">
									<div class="row align-items-center">
										<div class="col-3"><div class="line"></div></div>
										<div class="col-6 text-center">
											<div class="web_title">Sign In</div>
										</div>
										<div class="col-3"><div class="line"></div></div>
									</div>
									<form action="" method="post">
										<div class="content mt-3 mt-md-5">
											<div class="row align-items-center justify-content-center">
												<div class="col-md-8">
													<input type="text" name="user" class="web_subtitle mb-4" placeholder="Username" value="">
												</div>
												<div class="col-md-8">
													<input type="password" name="pswd" class="web_subtitle" placeholder="Password" value="">
												</div>
												<div class="col-12 text-center">
													<input type="submit" class="app_btn mt-3 mt-md-5" value="Sign In" />
												</div>
											</div>
										</div>
									</form>
								</div>
								<?php							
							}else{
								?>
								<div class="access_code">
									<div class="row align-items-center">
										<div class="col-3"><div class="line"></div></div>
										<div class="col-6 text-center">
											<div class="web_title">Welcome <?php echo $asdsa; ?></div>
										</div>
										<div class="col-3"><div class="line"></div></div>
									</div>
									<form action="" method="post">
										<div class="content mt-5">
											<div class="row align-items-center justify-content-center">
												Welcome to our website
												<div class="col-12 text-center">
													<a href="<?php echo get_home_url(); ?>">
														<div class="blue_btn mt-3">Go to Homepage</div>
													</a>
												</div>
											</div>
										</div>
									</form>
								</div>
								<?php
							}
						}elseif($_SESSION['user_or_docter']=='doctor'){
							?>
							<div class="access_code">
								<div class="row align-items-center">
									<div class="col-3"><div class="line"></div></div>
									<div class="col-6 text-center">
										<div class="web_title">Sign In</div>
									</div>
									<div class="col-3"><div class="line"></div></div>
								</div>
								<form action="" method="post">
									<div class="content mt-3 mt-md-5">
										<div class="row align-items-center justify-content-center">
											<div class="col-md-8">
												<input type="text" name="doctor_user" class="web_subtitle mb-4" placeholder="Username" value="">
											</div>
											<div class="col-md-8">
												<input type="password" name="doctor_pswd" class="web_subtitle" placeholder="Password" value="">
											</div>
											<div class="col-12 text-center">
												<input type="submit" class="app_btn mt-3 mt-md-5" value="Sign In" />
											</div>
										</div>
									</div>
								</form>
							</div>
							<?php
						}	
					?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
