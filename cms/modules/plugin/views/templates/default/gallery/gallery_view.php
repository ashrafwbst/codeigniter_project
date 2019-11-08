
    <main class="galleryHead pb-0 mb-2">
      <div class="container text-center">
        <h1><?php echo $album->album_name ?></h1>
      </div>
    </main>
    <div class="content">
      <div class="projects">
        <div class="container">
          <ul class="galleryView">
            <?php 
        if($image !== FALSE){
            $i = 1;
            foreach ($image as $value) { ?>


        <?php if($value['gallery_type'] == 'multiimages'){ ?>
            <li class="col-md-4">
              <div class="project-item item-shadow"> <img alt="<?php echo $value['caption'] ?>" class="img-responsive" src="<?php echo ($value['file_upload']) ? base_url() .'photo/plugin/gallery/'.$value['file_upload'] : base_url() .'photo/no_image.png' ?>">
                <div class="project-hover">
                  <div class="project-hover-content">
                    <h3 class="project-title"><?php echo $value['caption'] ?></h3>
                  </div>
                </div>
              </div>
            </li>

          <?php  }}}  ?>
          </ul>
          
        <!-- <div class="scrollbar">
          <div class="handle"></div>
        </div> -->
      </div>
    </div>
   