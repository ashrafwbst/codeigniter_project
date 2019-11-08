
<main class="pb-0 mb-2 galleryHead">
      <div class="container text-center">
        <h1><?php echo $this->Cms_model->getLabelLang('gallery_header') ?></h1>
      </div>
    </main>
    <div class="content">
      <div class="projects">
        <div class="container">
          <div class="col-md-12">

     <?php if($gallery === FALSE){ 
          echo '<center><h2>' . $this->Cms_model->getLabelLang('gallery_not_found') . '</h2></center>'; 
        }else{ ?>
        <?php 
            $i = 1;
            foreach ($gallery as $value) { ?>

            <div class="col-md-4">
              <div class="project-item item-shadow">
               <?php $f_img = $this->Gallery_model->getFirstImgs($value['gallery_db_id']); ?>
                <img alt="<?php echo $value['album_name'] ?>" class="img-responsive" src="<?php echo $f_img?>">
                <div class="project-hover">
                  <div class="project-hover-content">
                    <h3 class="project-title"><?php echo $value['album_name'] ?></h3>
                  </div>
                </div>
                <a href="<?php echo $this->Cms_model->base_link().'/plugin/gallery/view/'.$value['gallery_db_id'].'/'.$value['url_rewrite'] ?>" title="<?php echo $value['album_name'] ?>" class="link-arrow"><?php echo $this->Cms_model->getLabelLang('see_gallery_pages') ?> <i class="icon ion-ios-arrow-right"></i></a> </div>
            </div>
         <?php    } ?>


          </div>
        </div>

        <?php echo $this->pagination->create_links(); ?>
    <?php } ?>
      </div>
    </div>
    