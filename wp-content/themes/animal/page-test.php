<?php get_header(); ?>
<?php 
	$array_of_user= array(); 
	$json = file_get_contents('http://34.247.71.103:4444/client');
	$user_name = json_decode($json);
	for ($i=0; $i <23 ; $i++) { 
		$username= $user_name[0]->username;
		array_push($array_of_user, $username);
	}
?>
<?php get_footer();