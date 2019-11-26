<?php 
	get_header();
	define('response', 'response');  
	define('message', 'message');  
	$true_false = true; 
	$error = '';

	// print_r('<pre>');
	// print_r($array_of_user);
	// print_r('</pre>');

?>
<div class="login">
<?php
	if(isset($_POST['user_type'])){
		$_SESSION['user_or_docter']= $_POST['user_type'];
	}


	if(isset($_POST['access_code'])){
		$response = wp_remote_post( 'http://34.247.71.103:4444/client/code', array(
		    'method'      => 'POST',
		    'timeout'     => 45,
		    'redirection' => 5,
		    'httpversion' => '1.0',
		    'blocking'    => true,
		    'headers'     => array(),
		    'body'        => array(
		        'accessCode' => $_POST['access_code'],
		    ),
		    'cookies'     => array()
		    )
		);
		if ( is_wp_error( $response ) ) {
		    $error_message = $response->get_error_message();
		    echo "Something went wrong: $error_message";
		} else {	   
		    $obj = $response[response][message];
		   	$error = 'Wrong Access Code';
		    if($obj=='OK'){
		    	$_SESSION['access_code_user']=$_POST['access_code'];
		    	$true_false=  false;
		    }else{
		    	$true_false=  true;
		    }
		   
		}
	}



	if(isset($_POST['access_code_docter'])){
		$response = wp_remote_post( 'http://34.247.71.103:4444/doctor/code', array(
		    'method'      => 'POST',
		    'timeout'     => 45,
		    'redirection' => 5,
		    'httpversion' => '1.0',
		    'blocking'    => true,
		    'headers'     => array(),
		    'body'        => array(
		        'accessCode' => $_POST['access_code_docter'],
		    ),
		    'cookies'     => array()
		    )
		);
		if ( is_wp_error( $response ) ) {
		    $error_message = $response->get_error_message();
		    echo "Something went wrong: $error_message";
		} else {	   
		    $obj = $response[response][message];
		    if($obj=='OK'){
		    	$_SESSION['access_code_user']=$_POST['access_code_docter'];
		    	$true_false=  false;
		    }else{
		    	$true_false=  true;
		    }
		   
		}
	}



	if(isset($_POST['user_usrname'])){
		$usrname  = $_POST['user_usrname'];
		$pswdname = $_POST['pswd_usrname'];
		$acc_code = $_SESSION['access_code_user'];
		if(in_array($usrname, $array_of_user)){
			$error_message= "username already in used";
		}else{
			$response = wp_remote_post( 'http://34.247.71.103:4444/client/username', array(
			    'method'      => 'POST',
			    'timeout'     => 45,
			    'redirection' => 5,
			    'httpversion' => '1.0',
			    'blocking'    => true,
			    'headers'     => array(),
			    'body'        => array(
			        'accessCode' => $acc_code,
			        'username'   => $usrname,
			        'password'   => $pswdname,
			    ),
			    'cookies'     => array()
			    )
			);
			if ( is_wp_error( $response ) ) {
			    $error_message = $response->get_error_message();
			    echo "Something went wrong: $error_message";
			} else {	   
			   $_SESSION['user_and_pswd_done']= 'done';
			}
		}
	}
	if(isset($_POST['user_usrname_doctor'])){
		$usrname  = $_POST['user_usrname_doctor'];
		$pswdname = $_POST['pswd_usrname_doctor'];
		$acc_code = $_SESSION['access_code_user'];
		$response = wp_remote_post( 'http://34.247.71.103:4444/doctor/username', array(
		    'method'      => 'POST',
		    'timeout'     => 45,
		    'redirection' => 5,
		    'httpversion' => '1.0',
		    'blocking'    => true,
		    'headers'     => array(),
		    'body'        => array(
		        'accessCode' => $acc_code,
		        'username'   => $usrname,
		        'password'   => $pswdname,
		    ),
		    'cookies'     => array()
		    )
		);
		if ( is_wp_error( $response ) ) {
		    $error_message = $response->get_error_message();
		    echo "Something went wrong: $error_message";
		} else {	   
		   $_SESSION['user_and_pswd_done']= 'done';
		}
	}
	?>	
	<div class="container">
		<div class="user_or_doctor">
			<?php 
				if($_SESSION['user_or_docter']!='user' && $_SESSION['user_or_docter']!='doctor'){ 
					?>
					<div>
						<div class="row align-items-center">
							<div class="col-3"><div class="line"></div></div>
							<div class="col-6 text-center">
								<div class="web_title">User Or Doctor</div>
							</div>
							<div class="col-3"><div class="line"></div></div>
						</div>
						<form action="" method="post">
							<div class="content mt-5">
								<div class="row align-items-center justify-content-center">
									<div class="col-5 text-center">
										<div class="custom-control custom-radio">
										  <input type="radio" value="user" class="custom-control-input" id="33" name="user_type">
										  <label class="custom-control-label web_subtitle" for="33">User</label>
										</div>
									</div>
									<div class="col-5 text-center">
										<div class="custom-control custom-radio">
										  <input type="radio" class="custom-control-input" value="doctor" id="22" name="user_type">
										  <label class="custom-control-label web_subtitle" for="22">Doctor</label>
										</div>
									</div>
									<div class="col-12 text-center">
										<input type="submit" class="app_btn mt-5" value="Continue" />
									</div>
								</div>
							</div>
						</form>
					</div>
					<?php  
				}else 
				if($_SESSION['access_code_user']=='' && $_SESSION['user_or_docter']=='user'){
					?>
					<div class="access_code">
						<div class="row align-items-center">
							<div class="col-3"><div class="line"></div></div>
							<div class="col-6 text-center">
								<div class="web_title">Access Code</div>
							</div>
							<div class="col-3"><div class="line"></div></div>
						</div>
						<form action="" method="post">
							<div class="content mt-5">
								<div class="row align-items-center justify-content-center">
									<div class="col-8">
										<input type="text" name="access_code" class="web_subtitle" placeholder="Access Code" value="">
									</div>
									<div class="col-8">
									<?php 
										if($error !=''){
											print_r($error);
										}
									?>
									</div>
									<div class="col-12 text-center">
										<input type="submit" class="app_btn mt-5" value="Validate Code" />
									</div>
								</div>
							</div>
						</form>
						<div class="sign_in text-center mt-4">
							Already Have an account ?
							<a href="<?php echo get_page_link(20); ?>">
								Sign In
							</a>
						</div>
					</div>
					<?php
				}else
				if($_SESSION['access_code_user']=='' && $_SESSION['user_or_docter']=='doctor'){
					?>
					<div class="access_code">
						<div class="row align-items-center">
							<div class="col-3"><div class="line"></div></div>
							<div class="col-6 text-center">
								<div class="web_title">Access Code</div>
							</div>
							<div class="col-3"><div class="line"></div></div>
						</div>
						<form action="" method="post">
							<div class="content mt-5">
								<div class="row align-items-center justify-content-center">
									<div class="col-8">
										<input type="text" name="access_code_docter" class="web_subtitle" placeholder="Access Code" value="">
									</div>
									<div class="col-12 text-center">
										<input type="submit" class="app_btn mt-5" value="Validate Code" />
									</div>
								</div>
							</div>
						</form>
						<div class="sign_in text-center mt-4">
							Already Have an account ?
							<a href="<?php echo get_page_link(20); ?>">
								Sign In
							</a>
						</div>
					</div>
					<?php
				}else
				if($_SESSION['access_code_user']!='' && $_SESSION['user_or_docter']=='user' && $_SESSION['user_and_pswd_done']==''){
					?>
					<div class="access_code">
						<div class="row align-items-center">
							<div class="col-3"><div class="line"></div></div>
							<div class="col-6 text-center">
								<div class="web_title">Create Account</div>
							</div>
							<div class="col-3"><div class="line"></div></div>
						</div>
						<form action="" method="post">
							<div class="content mt-5">
								<div class="row align-items-center justify-content-center">
									<div class="col-8">
										<div class="mb-4">
											<input type="text" name="user_usrname" class="web_subtitle mb-0" placeholder="Username" value="">
											<?php echo $error_message; ?>
										</div>
									</div>
									<div class="col-8">
										<input type="text" name="pswd_usrname" class="web_subtitle" placeholder="Password" value="">
									</div>
									<div class="col-12 text-center">
										<input type="submit" class="app_btn mt-5" value="Create Account" />
									</div>
								</div>
							</div>
						</form>
					</div>
					<?php
				}else
				if($_SESSION['access_code_user']!='' && $_SESSION['user_or_docter']=='doctor' && $_SESSION['user_and_pswd_done']==''){
					?>
					<div class="access_code">
						<div class="row align-items-center">
							<div class="col-3"><div class="line"></div></div>
							<div class="col-6 text-center">
								<div class="web_title">Create Account</div>
							</div>
							<div class="col-3"><div class="line"></div></div>
						</div>
						<form action="" method="post">
							<div class="content mt-5">
								<div class="row align-items-center justify-content-center">
									<div class="col-8">
										<input type="text" name="user_usrname_doctor" class="web_subtitle mb-4" placeholder="Username" value="">
									</div>
									<div class="col-8">
										<input type="text" name="pswd_usrname_doctor" class="web_subtitle" placeholder="Password" value="">
									</div>
									<div class="col-12 text-center">
										<input type="submit" class="app_btn mt-5" value="Create Account" />
									</div>
								</div>
							</div>
						</form>
					</div>
					<?php
				}else
				if($_SESSION['user_and_pswd_done']=='done'){
					?>
					<div class="access_code">
						<div class="row align-items-center">
							<div class="col-3"><div class="line"></div></div>
							<div class="col-6 text-center">
								<div class="web_title">Account Created</div>
							</div>
							<div class="col-3"><div class="line"></div></div>
						</div>
						<form action="" method="post">
							<div class="content mt-5">
								<div class="row align-items-center justify-content-center">
									<div class="col-8">
										<div class="web_subtitle border-0" style="color: red;">
											You can sign in now with username and password
											already created
											<br>
											<?php echo $_SESSION['user_or_docter']; ?>
										</div>
									</div>
									<div class="col-12 text-center">
										<a href="<?php echo get_page_link(20); ?>">
											<div class="app_btn mt-5">
												Sign In Now
											</div>
										</a>
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
<?php  
get_footer();