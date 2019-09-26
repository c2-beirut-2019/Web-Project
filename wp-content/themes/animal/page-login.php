<?php 
session_start();
get_header();
$_SESSION['user_mail']='';
define('response', 'response');  
define('message', 'message');  
$true_false = true;

if(isset($_POST['textac'])){
	$response = wp_remote_post( 'http://34.247.71.103:4444/client/code', array(
	    'method'      => 'POST',
	    'timeout'     => 45,
	    'redirection' => 5,
	    'httpversion' => '1.0',
	    'blocking'    => true,
	    'headers'     => array(),
	    'body'        => array(
	        'accessCode' => $_POST['textac'],
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
	    	$_SESSION['access_code']=$_POST['textac'];
	    	$true_false=  false;
	    }else{
	    	$true_false=  true;
	    }
	   
	}
}
if(isset($_POST['pswd'])){
	$response = wp_remote_post( 'http://34.247.71.103:4444/client/username', array(
	    'method'      => 'POST',
	    'timeout'     => 45,
	    'redirection' => 5,
	    'httpversion' => '1.0',
	    'blocking'    => true,
	    'headers'     => array(),
	    'body'        => array(
	        'accessCode' => $_SESSION['access_code'],
	        'username'   => $_POST['username'],
	        'password'   => $_POSt['pswd']
	    ),
	    'cookies'     => array()
	    )
	);
	if ( is_wp_error( $response ) ) {
	    $error_message = $response->get_error_message();
	    echo "Something went wrong: $error_message";
	} else {	 
		print_r('<pre>');
		print_r($response);
		print_r('</pre>');  
	    // $obj = $response[response][message];
	    // if($obj=='OK'){
	    // 	$_SESSION['access_code']=$_POST['textac'];
	    // 	$true_false=  false;
	    // }else{
	    // 	$true_false=  true;
	    // }
	   
	}	
}

	if($true_false){
	?>
	<div class="code_generator">
		<form action=""  method="post">
			<input type="text" value="EEHzSv" name="textac" placeholder="code">
			<input type="submit" value="submit">
		</form>
	</div>
	<?php  
 	}else{
 	?>
 	<div class="code_generator">
 		<form action=""  method="post">
 			<?php echo $_SESSION['access_code']; ?>
 			<input type="text" value="asdsadsad" name="username" placeholder="name">
 			<input type="password" value="s@asdas123123" name="pswd" placeholder="name">
 			<input type="submit" value="submit">
 		</form>
 	</div>
 	<?php	
 	}
	?>
<?php 
get_footer();