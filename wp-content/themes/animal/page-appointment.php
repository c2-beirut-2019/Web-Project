<?php 
	get_header(); 

	$response = wp_remote_post( 'http://34.247.71.103:4444/pet/client', array(
	    'method'      => 'GET',
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
	  $pets_to_adopt =json_decode( $dashboard, false );
	  $pet_number= count($pets_to_adopt);
	}

	$json = file_get_contents('http://34.247.71.103:4444/doctor/list');
	$docteur_list = json_decode($json);
	$doctor_number = count($docteur_list);

	$json = file_get_contents('http://34.247.71.103:4444/appointmentType');
	$appointment_list = json_decode($json);
	$app_number = count($appointment_list);
?>
<?php  
	if(isset($_POST['doctor'])){
		$response = wp_remote_post( 'http://34.247.71.103:4444/appointment', array(
		    'method'      => 'POST',
		    'timeout'     => 45,
		    'redirection' => 5,
		    'httpversion' => '1.0',
		    'blocking'    => true,
		    'headers'     => array(
		    	'Authorization' => $_SESSION['access_token'],
		    ),
		    'body' => array(
		        'pet'               => $_POST['pet'],
		        'doctor'            => $_POST['doctor'],
		        'appointmentType'   => $_POST['appointment'],
		        'startDate'         => $_POST['date'] ,  
		    ),
		    'cookies'     => array()
		    )
		);
		if ( is_wp_error( $response ) ) {
		    $error_message = $response->get_error_message();
		    echo "Something went wrong: $error_message";
		} else {	   
		  $dashboard= $response['body'];
		  $dash =json_decode( $dashboard, false );
		  print_r('<pre>');
		  print_r($dash);
		  print_r('</pre>');
		}
	}
?>
<div class="appointment">
	<div class="container">
		<form action="" method="post">
			<div class="row align-items-start">
				<div class="col-6">
					<select name="pet" id="pet" required>
						<option value="Pet Name" selected disabled>Pet Name</option>
					<?php
					 	for ($i=0; $i<$pet_number ; $i++) { 
							?>
							<option value="<?php print_r($pets_to_adopt[$i]->_id); ?>"><?php print_r($pets_to_adopt[$i]->name); ?></option>
							<?php
						} 
					?>
					</select>
				</div>
				<div class="col-6">
					<select name="doctor" id="doctor" required>
						<option value="Doctor Name" selected disabled>Doctor Name</option>
					<?php 
						for ($i=0; $i<$doctor_number ; $i++) { 
							?>
							<option value="<?php print_r($docteur_list[$i]->_id); ?>"><?php print_r($docteur_list[$i]->_id); ?></option>
							<?php
						}
					?>
					</select>
				</div>	
				<div class="col-6">
					<select name="appointment" id="appointment" required>
						<option value="Appointment" selected disabled>Appointment</option>
					<?php 
						for ($i=0; $i<$app_number ; $i++) { 
							?>
							<option value="<?php print_r($appointment_list[$i]->_id); ?>"><?php print_r($appointment_list[$i]->name); ?></option>
							<?php
						}
					?>
					</select>
				</div>
				<div class="col-6">
					<input type="datetime-local" name="date" value="<?php echo get_the_date(); ?>">
				</div>
				<div class="col-12">
					<input type="submit" value="submit">
				</div>
			</div>
		</form>
	</div>
	<?php  
		$response = file_get_contents( 'http://34.247.71.103:4444/doctor/schedule?id=5d49cbb9983cb12744f90d27');
		// $product = json_decode($response);
		// print_r('<pre>');
		// print_r($product);
		// print_r('</pre>');
		// $total= count($product);
	?>
</div>
<?php get_footer();