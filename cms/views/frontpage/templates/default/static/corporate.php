<!-- Breadcrumb Area -->
<!-- TOP IMAGE HEADER -->
 <?php $contentOne = $this->Cms_admin_model->getContentFrontend(3); ?>

<section class="topSingleBkg topPageBkg">
   <div class="item-content-bkg">
      <div class="item-img"  style="background-image:url('<?php echo base_url('photo/content/').$contentOne['banner_image'] ?>');" ></div>
      <div class="inner-desc">
         <h1 class="post-title single-post-title"><?php echo $contentOne['image_heading']; ?></h1>
         <span class="post-subtitle"><?php echo $contentOne['sub_heading']; ?></span>
      </div>
   </div>
</section>

<section class="fp-editor " id="largescale">
   <div class="container fp-content fp-cols">
      <div class="fp-col">
         <div class="section-title">
            <div class="main-title">
               <h2>Introduction</h2>
            </div>
         </div>
         <div class="content-left">
            <p id="myp"><?php echo $contentOne['content']; ?></p>
            <!-- <p><a class="btn-mast" href="#">Find Out More</a></p> -->
         </div>
      </div>
   </div>
</section>

<section class="padding40">
   <div class="container">
      <div class="row ">
         <div class="main-title">
            <h2> Events Gallery</h2>
         </div>
      </div>
       <?php $getAlbumOne = $this->Cms_admin_model->getAlbums(3); ?>
       
       <?php if(!empty($getAlbumOne))
       {
          foreach ($getAlbumOne as $albumValue) {  

           $isSubImageExist =  $this->Cms_admin_model->getAllSubAlbums($albumValue['id']); ?>


        <div class="row" style="margin-bottom: 100px;">
         <div class="col-sm-5 col-xs-12">
            <section class="slider">
               <div id="" class="slider_alb flexslider">
                  <ul class="slides">

                           <?php  if(!empty($isSubImageExist))
                             {
                                foreach ($isSubImageExist as $values) { ?>

                                      <li>
                                        <img src="<?php echo base_url('photo/album/').$values['sub_image']; ?>" />
                                     </li>
                                    
                             <?php   }
                             } ?>
                  </ul>
               </div>

               <div id="" class="carousel_alb flexslider">
                  <ul class="slides">
                    <?php
                      if(!empty($isSubImageExist))
                             {
                                foreach ($isSubImageExist as $value) { ?>

                                      <li>
                                        <img src="<?php echo base_url('photo/album/').$value['sub_image']; ?>" />
                                     </li>
                                    
                             <?php   }
                             }

                             ?>
                  </ul>
               </div>
            </section>
         </div>
         <div class="col-sm-7 col-xs-12  pull-right ">
            <div class="content-left">
               <h3 class=""><?php echo $albumValue['heading']; ?></h3>
               <p><?php echo $albumValue['content']; ?></p>
            </div>
             <div class="buttons-pdf">
              <a href="<?php echo base_url('photo/album/one/').$albumValue['pdf_one'] ?>" class="pdf-btn">PDF 1</a>
              <a href="<?php echo base_url('photo/album/two/').$albumValue['pdf_two'] ?>" class="pdf-btn">PDF 2</a>
            <!--   <a data-toggle="modal"  href="#myModal"  data-id="<?php echo $albumValue['heading']; ?>" class="open-AddBookDialog pdf-btn">BooK</a>  -->
             <a  href="<?= base_url('contact'); ?>"  class="pdf-btn">Book</a>
            
              <!-- data-target="#myModal"    -->
            </div>
         </div>
      </div>


            
    <?php      }
       }
       ?>

    
   </div>
</section>


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
       <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><img src="<?php echo base_url('templates/restro/') ?>images/close-icon.png"></button>
        </div>
        <div class="modal-body book-form">
          <center>
            <h4>Book Events</h4>
           <!--  <p>The theme of the workshop was "Simplicity". Going by "more is less", each arrangement was limited to a maximum of 3 different flowers.</p> -->
          </center>
          <form action="#">

            <div class="row">
              <div class="col-md-6">
                 <div class="form-group">                
                  <input type="text" class="form-control" id="name" placeholder="Name">
                </div>
              </div>

               <div class="col-md-6">
                  <div class="form-group">
                    <input type="email" class="form-control" id="email" placeholder="Email">
                  </div>
                </div>

               <div class="col-md-6">
                  <div class="form-group">
                    <input type="number" class="form-control" id="number" placeholder="Mobile Number">
                  </div>
                </div>

              <div class="col-md-6">
                <div class="form-group">                
                  <input type="text" class="form-control" id="event" placeholder="Event Details">
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">                
                  <input class="form-control" id="datepicker" placeholder="Select Date">
                </div>
              </div>


               <div class="col-md-12">
                <div class="form-group">
                  <textarea name="message"  class="form-control" rows="3" style="resize: none;" placeholder="Message..."></textarea>
                </div>
              </div>
              

              <div class="col-md-12">
                <div class="form-group">
                  <center><button type="submit" class="but-pop">Confirm</button></center>
                </div>
              </div>



            </div>

            </form>
        </div>


      </div>
      
    </div>
  </div>


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.0/flexslider.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.0/jquery.flexslider.min.js"></script>
<style type="text/css">
  .flex-direction-nav a:before {
    font-size: 20px;
    content: '\f001';
    color: rgba(255, 255, 255, 0.8);
  }
</style>
<script type="text/javascript">
   $(window).load(function() {
     $('.carousel_alb').flexslider({
       animation: "slide",
       controlNav: false,
       animationLoop: false,
       slideshow: false,
       itemWidth: 80,
       itemMargin: 5,
       asNavFor: '.slider_alb'
     });
    
     $('.slider_alb').flexslider({
       animation: "slide",
       controlNav: false,
       animationLoop: false,
       slideshow: false,
       sync: ".carousel_alb"
     });
   });
</script>
<script type="text/javascript">
   $(window).load(function() {
     $('#carousel1').flexslider({
       animation: "slide",
       controlNav: false,
       animationLoop: false,
       slideshow: false,
       itemWidth: 80,
       itemMargin: 5,
       asNavFor: '#slider'
     });
    
     $('#slider1').flexslider({
       animation: "slide",
       controlNav: false,
       animationLoop: false,
       slideshow: false,
       sync: "#carousel"
     });
   });
</script>
<script type="text/javascript">
   $(window).load(function() {
     $('#carousel2').flexslider({
       animation: "slide",
       controlNav: false,
       animationLoop: false,
       slideshow: false,
       itemWidth: 80,
       itemMargin: 5,
       asNavFor: '#slider'
     });
    
     $('#slider2').flexslider({
       animation: "slide",
       controlNav: false,
       animationLoop: false,
       slideshow: false,
       sync: "#carousel"
     });
   });
</script>
<script type="text/javascript">

  $(document).on("click", ".open-AddBookDialog", function () {
     var myBookId = $(this).data('id');
     $(".modal-body #event").val( myBookId );
     // $('#myModel').modal('show');
});
  
  
</script>