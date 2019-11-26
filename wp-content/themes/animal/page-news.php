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
								$json = file_get_contents('http://34.247.71.103:4444/news');
								$news = json_decode($json);
								$counter = count($news);
								?>
							<div class="row align-items-start">
							<?php  
								$i = 0;
								for($i = 0; $i<=$counter; $i++) {	
									$image = $news[$i]->image ;
									$id = $news[$i]->_id ;
									$title = $news[$i]->title ;
									$content = $news[$i]->content ;
									$creationDate = $news[$i]->creationDate ;
									?>
									<div class="col-4">
										<div class="background_product mt-2 mb-2" style="background-image: url('<?php echo $image; ?>'); "></div>
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
