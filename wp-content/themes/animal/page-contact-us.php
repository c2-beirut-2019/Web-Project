<?php

get_header(); 
?>

<div class="ctc_us_page">
	<div class="container">
		<div class="web_title text-center mb-5">Contact Us</div>
		<div class="contact_form">
			
			<div class="row">
				<div class="col-6">
					<input type="text" placeholder="Firstname" name="firstname" >
				</div>
				<div class="col-6">
					<input type="text" placeholder="Lastname" name="lastname" >
				</div>
				<div class="col-6">
					<input type="text" placeholder="Email" name="email" >
				</div>
				<div class="col-6">
					<input type="number" placeholder="Number" name="number">
				</div>
				<div class="col-12">
					<textarea name="message" id="" cols="30" rows="10" placeholder="Enter Your Message">
					
					</textarea>
				</div>
				<div class="col-12 text-center">
					<div class="app_btn mt-5">Submit</div>
				</div>	
			</div>
		</div>
	</div>
</div>


<?php
get_footer();
