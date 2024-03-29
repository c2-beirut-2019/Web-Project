<?php
	get_header(); 
?>

<div class="product">
	<div class="container">
		<div class="row">
			<?php  
				$id='';
				$products = file_get_contents('http://34.247.71.103:4444/product');
				$product = json_decode($products);
				$total= count($product);
				$i = 0;
				for($i = 0; $i<=$total; $i++) {	
					$asd =$i +1;
					$images_1 = $product[0]->images[$i];
					$images_2 = $product[0]->images[$asd];
					$title = $product[$i]->title;
					$id = $product[$i]->_id ;
					$description =$product[$i]->description;
					$price= $description[$i]->price;
					$quantityAvailable= $description[$i]->quantityAvailable;
					?>
					<div class="col-sm-6 col-md-4">
						<div class="background_product mt-2 mb-2" style="background-image: url('<?php echo $images_1; ?>'); "></div>
						<div class="title"><?php echo $title; ?></div>
						<div class="short_name mb-2 mb-md-5">
							<?php echo wp_trim_words( $description, $num_words = 22, ' [..]' ) ?>
						</div>
					</div>
					<?php  
				}	
			?>
		</div>
	</div>
</div>

<?php
get_footer();
