<!-- TOP IMAGE HEADER -->
      <section class="topSingleBkg topPageBkg">
         <div class="item-content-bkg">
            <div class="item-img"  style="background-image:url('<?php echo base_url('templates/restro/') ?>images/blog.jpg');" ></div>
            <div class="inner-desc">
               <h1 class="post-title single-post-title">Blog</h1>
               <span class="post-subtitle"> View the latest articles</span>
            </div>
         </div>
      </section>
      <?php $blogarticle=$this->Cms_model->getarticle();

                             
                      ?>

<!-- MAIN WRAP CONTENT -->
      <section id="wrap-content" class="blog-1col-list-left">
         
         <div class="container">
            <div class="row">
               <div class="col-md-12 posts-holder">
               
                        <div class="row">
                           <?php 

                        if(!empty($blogarticle)){


                        

                           foreach($blogarticle as $blogart)
                             
                             {

                              ?>
                       
                            <div class="col-md-4" style="margin-top: 20px;">
                              <article class="blog-item blog-item-2col-grid" >
                                 <div class="post-image">
                                    <a href="<?php echo base_url('myblogD/'.$blogart['article_db_id']); ?>">
                                    
                                    <img alt='' src='<?php echo base_url('/photo/plugin/article/'.$blogart['main_picture']);?>' class='img-fluid' />
                                    </a>
                                 </div>
                                
                                 <div class="post-content content-grid">
                                   <?php echo $blogart['title']; ?> 
                                 </div>
                                
                                 <div class="more-btn">
                                  
                                 </div>
                              </article>

                      
                            </div>
                             <?php } 
                           }
                           ?>
                            <!--col-md-4-->
                       
                        </div>
                          
                     
                     
                  
               </div>
               <!--col-md-12-->
            </div>
            <!--row-->
         </div>
         <!--container-->
         
      </section>
      <!-- /MAIN WRAP CONTENT -->
<!-- <div class="col-md-4" style="margin-top: 20px;">
                              <article class="blog-item blog-item-2col-grid" >
                                 <div class="post-image">
                                    <a href="<?php //echo base_url('myblogD/'.$blogart['article_db_id']); ?>">
                                    
                                    <img alt='' src='<?php //echo base_url('/photo/plugin/article/'.$blogart['main_picture']);?>' class='img-fluid' /> -->
                                 <!--    </a>
                                 </div> -->
                                 <!--post-image-->
                                 <!-- <div class="post-content content-grid"> -->
                                    <!--ELEGANT FLOWER ARRANGEMENTS WITH CHRISTOFLE-->
                                    <!-- <?php //echo $blogart['title']; ?>  -->
                                <!--  </div> -->
                                 <!--post-content-->
                                 <!-- <div class="more-btn"> -->
                                   <!--  <a class="view-more" href="<?php //echo base_url('blogD').'/'.$blogart['article_db_id']; ?>">Read More </a> -->
                                    <!-- ."elegant-flower-arrangements-with-christofle" -->
                                <!--  </div>
                              </article>

                      
                            </div> -->