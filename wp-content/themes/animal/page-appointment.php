<?php get_header(); ?>
<div class="appointment">
	<div class="container">
		<!-- <select name="" id="">
			<option value="asd">sad</option>
		</select> -->
		<?php  
			$response = wp_remote_get( 'http://34.247.71.103:4444/pet/client', array(
			    'method'      => 'GET',
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
			  $print_r($response);
			  $dash =json_decode( $dashboard, false );
			}
		?>
	</div>
</div>
<?php get_footer();