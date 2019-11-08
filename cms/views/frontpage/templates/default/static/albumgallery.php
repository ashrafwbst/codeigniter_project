<!--TOP IMAGE HEADER -->
      <section class="topSingleBkg topPageBkg">
         <div class="item-content-bkg">
            <div class="item-img"  style="background-image:url('<?= base_url('templates/restro/') ?>images/gallery.jpg');" ></div>
            <div class="inner-desc">
               <h1 class="post-title single-post-title"><?= $gallery[0]['album_name'] ?></h1>
            </div>
         </div>
      </section>
      <!-- /TOP IMAGE HEADER -->
      <!-- MAIN WRAP CONTENT -->
      <section id="wrap-content" class="page-content">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
               
                  <!-- GALLERY -->
                  <div class="gallery-3colgrid-content">
                     <div class="menu-holder menu-3col-grid-image gallery-holder clearfix">
                     <?php if (count($gallery)): ?>
                        <?php foreach ($gallery as $row): ?>
                           <div class="menu-post gallery-post">
                           <a href="<?= base_url('photo/plugin/gallery/').$row['file_upload'] ?>" class="lightbox"  title="<?= $gallery[0]['album_name'] ?>">
                              <div class="item-content-bkg gallery-bkg">
                                 <div class="gallery-img" style="background-image:url('<?= base_url('photo/plugin/gallery/').$row['file_upload'] ?>');"></div>
                                 <div class="menu-post-desc">
                                    <!-- <h4>Chocolate Muffins</h4> -->
                                    <div class="gallery-mglass"><i class="fa fa-search"></i></div>
                                 </div>
                              </div>
                           </a>
                        </div>
                        <?php endforeach ?>
                     <?php endif ?>
                        
                                                
                     </div>
                   </div>
                   <!-- /GALLERY -->
                   
               </div>
               <!--col-md-12-->
            </div>
            <!--row-->
         </div>
         <!--container-->
      </section>
       <!-- /MAIN WRAP CONTENT