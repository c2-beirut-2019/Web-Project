<?php

get_header(); ?>
<div class="pets">
	<div class="container">
		<div class="petsadopt">
			<?php  
				$id=''; $name=''; $image=''; $color=''; $dateOfBirth='';
				$registrationDate=''; $category_name=''; $category_id='';
				$specie_name=''; $specie='';
				$json = file_get_contents('http://34.247.71.103:4444/pet/toAdopt?page=1&limit=3213');
				$pets_to_adopt = json_decode($json);
			?>
			<div class="container">
				<div class="web_title mb-3">Pets To Adopt</div>
				<div class="web_subtitle mb-5" style="max-width: 500px;">
					It is my hope that this new print will give people a way to advocate for these animals and show their support for pet adoption.
				</div>
				<div class="row align-items-start">
				<?php  
					$i = 0;
					for($i = 0; $i<=2; $i++) {	
						$image = $pets_to_adopt->data[$i]->image ;
						$name  =  $pets_to_adopt->data[$i]->name ;
						$specie_name= $pets_to_adopt->data[$i]->specie_name ;
							$specie= $pets_to_adopt->data[$i]->specie ;
						?>
						<div class="col-4 text-center">
							<img class="img-fluid w-100 d-block image_pets" src="<?php echo $image; ?>">
							<div class="title"><?php echo $name; ?></div>
							<div class="short_name">
								<?php echo $specie_name; ?>
							</div>
						</div>
						<?php  
					}
				?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
