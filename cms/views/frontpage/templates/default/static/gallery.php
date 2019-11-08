<!-- Breadcrumb Area -->
        <!-- TOP IMAGE HEADER -->
      <section class="topSingleBkg topPageBkg">
         <div class="item-content-bkg">
            <div class="item-img"  style="background-image:url('<?= base_url('templates/restro/') ?>images/gallery.jpg');" ></div>
            <div class="inner-desc">
               <h1 class="post-title single-post-title">Gallery</h1>
               <span class="post-subtitle"> We love what we do</span>
            </div>
         </div>
      </section>
      <!-- /TOP IMAGE HEADER -->
        <!--// Breadcrumb Area -->

        <!-- Main Content -->

          <!-- MAIN WRAP CONTENT -->
      <section id="wrap-content" class="page-content">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
               
                  <!-- GALLERY -->
                  <div class="gallery-3colgrid-content">
                     <div class="menu-holder menu-3col-grid-image gallery-holder clearfix">
                      <?php foreach ($album as $row): ?>
                        <?php if ($row['lang_iso'] == 'en'): ?>
                          <div class="menu-post">
                           <a href="<?= base_url('gallery/').$row['url_rewrite'] ?>">
                              
                                 <div class="gallery-img" style="background-image:url('<?= base_url('photo/plugin/gallery/').$row['file_upload'] ?>');"></div>
                                 <div class="menu-post-desc">
                                    <h4><?= $row['album_name'] ?></h4>
                                 </div>
                           </a>
                        </div>
                        <?php endif ?>
                      <?php endforeach ?>
                        
                        
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
       <!-- /MAIN WRAP CONTENT -->

        <!--// Main Content -->

