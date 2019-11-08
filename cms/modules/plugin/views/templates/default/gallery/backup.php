<div class="container-header-fluid">
	<div class="container">
		<h1><?php echo $album->album_name ?></h1>
		<h6></h6>
	</div>
</div>
<div class="container-inner-fluid">
	<div class="inner-content__main">

		<div class="row masonry-wrap">
			<div class="masonry">
				
				<?php 
        if($image !== FALSE){
            $i = 1;
            foreach ($image as $value) { ?>


				<?php if($value['gallery_type'] == 'multiimages'){ ?>
				
								<div class="masonry__brick">
					<div class="item-folio">

						<div class="item-folio__thumb">
							<a href="<?php echo ($value['file_upload']) ? base_url() .'photo/plugin/gallery/'.$value['file_upload'] : base_url() .'photo/no_image.png' ?>" class="thumb-link" title="gallery" data-size="1050x700">
                                <img src="<?php echo ($value['file_upload']) ? base_url() .'photo/plugin/gallery/'.$value['file_upload'] : base_url() .'photo/no_image.png' ?>" srcset="<?php echo ($value['file_upload']) ? base_url() .'photo/plugin/gallery/'.$value['file_upload'] : base_url() .'photo/no_image.png' ?> 1x, <?php echo ($value['file_upload']) ? base_url() .'photo/plugin/gallery/'.$value['file_upload'] : base_url() .'photo/no_image.png' ?> 2x" alt="<?php echo $value['caption'] ?>">
                            </a>
						</div>

						<div class="item-folio__text">
							<h4 class="item-folio__title">
								<?php echo $value['caption'] ?>
							</h4>
						</div>
					
					</div>
							</div>

				<?php }else if($value['gallery_type'] == 'youtubevideos'){ 
                        $youtube_script_replace = array("http://youtu.be/", "http://www.youtube.com/watch?v=", "https://youtu.be/", "https://www.youtube.com/watch?v=", "http://www.youtube.com/embed/", "https://www.youtube.com/embed/");
                        $youtube_value = str_replace($youtube_script_replace, '', $value['youtube_url']); ?>


						<div class="masonry__brick">
						<div class="item-folio">
							
						<div class="item-folio__thumb">
							<a href="<?php echo ($value['file_upload']) ? base_url() .'photo/plugin/gallery/'.$value['file_upload'] : base_url() .'photo/no_image.png' ?>" class="thumb-link hide" title="gallery" data-size="1050x700"></a>
							<iframe width="100%" height="240" src="https://www.youtube-nocookie.com/embed/<?php echo $youtube_value?>?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
						</div>
									
						<div class="item-folio__text hide">
							<a href="https://www.youtube.com/embed/<?php echo $youtube_value?>" target="_blank"><h4 class="item-folio__title">View <i class="fa fa-share-square-o"></i></h4></a>
						</div>
						
							</div>
							</div>
						
				<?php } ?>
				
				<?php if ($i % 4 == 0) { ?>

				<div class="col-lg-12">
					<?php }
            $i++; } 
        }else{ ?>
					<center>
						<h2>
							<?php echo $this->Cms_model->getLabelLang('picture_not_found')?>
						</h2>
					</center>
					<?php } ?>
				</div>
				</div>
			<!-- end masonry -->
		</div>
		<!-- end masonry-wrap -->

		    <br><br>
	</div>
</div>