<?php
get_header(); 
?>

	
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="news_page">
				<div class="container">
					<div class="news_section">
						<div class="container">
							<?php  
								$id='';
								$json = file_get_contents('http://34.247.71.103:4444/news?page=1&limit=6');
								$news = json_decode($json);
								?>
							<div class="row align-items-start">
							<?php  
								$i = 0;
								for($i = 0; $i<=5; $i++) {	
									$image = $news->data[$i]->image ;
									$id = $news->data[$i]->_id ;
									$title = $news->data[$i]->title ;
									$content = $news->data[$i]->content ;
									$creationDate = $news->data[$i]->creationDate ;
									?>
									<div class="col-4">
										<img class="img-fluid w-100 d-block image_news" src="<?php echo $image; ?>">
										<div class="title"><?php echo $title; ?></div>
										<div class="short_name mb-5">
											<?php echo wp_trim_words( $content, $num_words = 22, ' [..]' ) ?>
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
		</div>
	</div>
</div>
			

<?php
get_footer();
