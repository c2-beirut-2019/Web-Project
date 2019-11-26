<?php session_start();   get_header(); ?>
<!-- http://34.247.71.103:4444/pet/toAdopt?page=1&limit=10 -->
<!-- http://34.247.71.103:4444/client -->
<div class="site-page">
	<main>
		<section class="homepage">
			<div class="banner_section">
				<div class="backgroundimg" style="background-image: url(<?php echo get_template_directory_uri()?>/inc/assets/images/pets.jpg);">
					<div class="table_cell">
						<div class="container">
							<div id="page-sub-header" class="d-inline-block" style="background-color: transparent;">
								<div class="swiper_reveal skin_dark_color swiper_text_bar_wrapper">
									<div class="swiper_reveal_inner white_bar_text">
										<div class="title">Animals</div>
									</div>
								</div>
								<div class="swiper_reveal skin_dark_color swiper_text_bar_wrapper">
									<div class="swiper_reveal_inner white_bar_text">
										<div class="banner_subtitle">
											“Until one has loved an animal, a part of one’s soul remains unawakened.”
										</div>
									</div>
								</div>
								<div class="swiper_reveal skin_dark_color swiper_text_bar_wrapper">
									<div class="swiper_reveal_inner white_bar_text">
										<div class="banner_subtitle blue author mt-3">–Anatole France</div>
									</div>
								</div>
								<div class="swiper_reveal skin_dark_color swiper_text_bar_wrapper">
									<div class="swiper_reveal_inner white_bar_text">
										<div class="btn_web">About Us</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="home_body">
				<div class="petsadopt">
					<?php  
						$id=''; $name=''; $image=''; $color=''; $dateOfBirth='';
						$registrationDate=''; $category_name=''; $category_id='';
						$specie_name=''; $specie='';
						$json = file_get_contents('http://34.247.71.103:4444/pet/toAdopt?page=1&limit=3');
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
				<div class="news_section">
					<div class="container">
						<?php  
							$id='';
							$json = file_get_contents('http://34.247.71.103:4444/news?page=1&limit=3');
							$news = json_decode($json);
							
						?>
						<div class="web_title mb-3">Latest News</div>
						<div class="web_subtitle mb-5" style="max-width: 500px;">
							News is something somebody doesn't want printed; all else is advertising.
						</div>
						<div class="row align-items-start">
						<?php  
							$i = 0;
							for($i = 0; $i<=2; $i++) {	
								$image = $news->data[$i]->image ;
								$id = $news->data[$i]->_id ;
								$title = $news->data[$i]->title ;
								$content = $news->data[$i]->content ;
								$creationDate = $news->data[$i]->creationDate ;
								?>
								<div class="col-4 text-left">
									<div class="background_product" style="background-image: url('<?php echo $image; ?>'); "></div>
									<div class="title mt-2 mb-2"><?php echo $title; ?></div>
									<div class="short_name">
										<?php echo wp_trim_words( $content, $num_words = 22, ' [..]' ) ?>
									</div>
								</div>
								<?php  
							}
						?>
						</div>
					</div>
				</div>
				<div class="product">
					<div class="container">
						<div class="web_title mb-5">Product</div>
						<?php  
							$id='';
							$products = file_get_contents('http://34.247.71.103:4444/product');
							$product = json_decode($products);
							$total= count($product);
						?>
						<div class="swiper-container" id="swiper-product">
							<div class="swiper-wrapper">
							<?php  
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
									<div class="swiper-slide">
										<div class="background_product" style="background-image: url('<?php echo $images_1; ?>'); "></div>
										<!-- <img class="img-fluid w-100 d-block mb-2" src="<?php echo $images_1; ?>"> -->
										<div class="title"><?php echo $title; ?></div>
										<div class="short_name">
											<?php echo wp_trim_words( $description, $num_words = 22, ' [..]' ) ?>
										</div>
									</div>
									<?php  
								}	
							?>
							</div>
						</div>
					</div>
				</div>
				<div class="appointment">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-6">
								<div class="backgroundimg" style="background-image: url(<?php echo get_template_directory_uri()?>/inc/assets/images/cat.jpg);"></div>
							</div>
							<div class="col-6">
								<div class="left">
									<div class="big_title mb-2">
										Vaccination
									</div>
									<div class="text_app mb-5">
										Vaccination has long been an effective way to reduce disease burden in pets and farm animals, and is a key tool in maintaining animal health and welfare. Vaccines continue to play an increasingly vital role in preventative health and disease control programmes in animals. Innovative research and the development of safe, effective and quality vaccines means that our pets and farm animals continue to benefit from vital medicines that prevent or alleviate clinical signs of disease.
									</div>
									<div class="app_btn">
										Appointment
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
</div>

<script>
	jQuery(document).ready(function($) {
		
		$("body").queryLoader2({
			barColor: "#d8d8d8",
			backgroundColor: "#ffffff",
			percentage: false,
			barHeight: 0,
			minimumTime: 0,
			maxTime: 100000,
			fadeOutTime: 100,
			onComplete: function() {
				setTimeout(function(){
					$('#homepage_loader').fadeOut(500, function() {
						$('#homepage_loader').remove();
					});
				}, 500);
				setTimeout(function(){
					animateSwiperText("#page-sub-header", 100);
				}, 500);	
			}
		});
		function animateSwiperText(parentElement, waitingTime){
		    var timer = waitingTime;
		    var timeOut;
		    var btn_timer;
		    jQuery(parentElement).find('.swiper_text_bar_wrapper').each(function(index, el) {
		        timeOut = setTimeout(function(){
		            jQuery(el).addClass('is-active');
		        }, timer += 300);
		    });
		}

		var swiper = new Swiper('#swiper-product', {
		    spaceBetween: 15,
		    slidesPerView: 3,
		});
	});
</script>
<?php get_footer();

