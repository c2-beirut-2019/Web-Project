<?php
	get_header(); 
?>	
<div class="container">
	<div class="row">
		<?php  
			if(isset($_POST['user'])){
				echo $_POST['user']; echo '<br><br>';
				echo $_POST['pswd']; echo '<br><br>';
				echo $_SESSION['access_token']; echo  '<br><br>';
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
				  	print_r('<pre>');
				  	print_r($dash);
				  	print_r('</pre>');
				  	$access_token= $dash->access_token;
				    $_SESSION['access_token'] = $access_token;
				}
			}
			if(isset($_POST['doctor_user'])){
				echo $_POST['doctor_user']; echo '<br><br>';
				echo $_POST['doctor_pswd']; echo '<br><br>';
				echo $_SESSION['access_token']; echo  '<br><br>';
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
		<div class="col-12">
			<div class="login">
				<div class="container">
					<div class="user_or_doctor">
					<?php 
						if($_SESSION['user_or_docter']=='user'){
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
									<div class="content mt-5">
										<div class="row align-items-center justify-content-center">
											<div class="col-8">
												<input type="text" name="user" class="web_subtitle mb-4" placeholder="Username" value="">
											</div>
											<div class="col-8">
												<input type="password" name="pswd" class="web_subtitle" placeholder="Password" value="">
											</div>
											<div class="col-12 text-center">
												<input type="submit" class="app_btn mt-5" value="Sign In" />
											</div>
										</div>
									</div>
								</form>
							</div>
							<?php  
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
									<div class="content mt-5">
										<div class="row align-items-center justify-content-center">
											<div class="col-8">
												<input type="text" name="doctor_user" class="web_subtitle mb-4" placeholder="Username" value="">
											</div>
											<div class="col-8">
												<input type="password" name="doctor_pswd" class="web_subtitle" placeholder="Password" value="">
											</div>
											<div class="col-12 text-center">
												<input type="submit" class="app_btn mt-5" value="Sign In" />
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
