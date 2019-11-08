<!-- TOP IMAGE HEADER -->
      <section class="topSingleBkg topPageBkg">
         <div class="item-content-bkg">
           <!--  <div class="item-img"  style="background-image:url('<?php //echo base_url().'/photo/plugin/article/'."2019/1563258392_1-org.jpg" ; ?>');" ></div> -->

           <div class="item-img"  style="background-image:url('<?php echo base_url().'/photo/plugin/article/'.$artdetail['main_picture'] ; ?>');" ></div>
            <div class="inner-desc">
               <!-- <div class="post-category"><a href="#" rel="category tag">Food</a></div> -->
               <!--post-category--> 
               <h1 class="post-title single-post-title"><?php echo $artdetail['title']; ?> <!--ELEGANT FLOWER ARRANGEMENTS WITH CHRISTOFLE--> </h1>
               <ul class="post-meta">
                  <li class="meta-date"><?php 
                                         
                               // $createDate = new DateTime($blog->timestamp_create);
                               // $blogdate = $createDate->format('F j Y');
                               // echo $blogdate;?></li>
                  <!-- <li class="post-author"><a href="#"> <i class="fa fa-user"></i> <?=$blog_creator->name?> </a></li> -->
                  <!-- <li class="meta-comm"> 2 Comments</li> -->
               </ul>
            </div>
         </div>
      </section>



<!-- MAIN WRAP CONTENT -->
      <section id="wrap-content" class="blog-post-single">
         <div class="container">
            <div class="row">
              
               <div class="col-md-9 posts-holder m-auto">
                  <article class="blog-item-1col single-post-holder" >
                     <div class="post-content single-post-content">
                     
                       <!--  <?=$blog->content;?> -->
                        <h5><?php echo $artdetail['title']; ?></h5><?php echo $artdetail['content']; ?>
                           
                        <!-- Flower arrangements are crucial in sprucing up the ambience of any occasion. The beauty of any floral arrangement can be enhanced with the right use of vases and flowers. So what makes a good flower arrangement? The balance brought about by the usage of teh flowers as well as having a focal point in the arrangement, shows emphasis to the arrangement.

                        Partnering with Christofle and A Better Florist, Divine Palate co-organised a flower arrangement workshop held at the Christofle boutique for invited guests only. Attended by affluent women who enjoy the finer things in life, the guests were able to showcase their creativity through their various art forms. Further complementing their work was the exquisite and intricately designed Christofle vases. Quality flowers were specially sourced from all over the world to ensure only the very best were used.

                        The theme of the workshop was "Simplicity". Going by "more is less", each arrangement was limited to a maximum of 3 different flowers, making it simple for the guests to follow. The ladies were able to exhibit their imaginativeness, and the versatility of the Christofle vases was also showcased throughout the session. The workshop taught the ladies how effortless flower arrangements can be and how easily the ambience of any occasion can be lifted through flower arrangements. The ladies provided a delicate touch to the work and certainly looked best when they were focused! -->
                     </div>
                     <!-- /post-content-->
                     
                     <!--tags-single-page-->
                    <!--  <div class="tags-single-page">
                        <a href="#" rel="tag">egg</a> <a href="#" rel="tag">salad</a>
                     </div> -->
                     <!-- /tags-single-page-->
                     
               </div>
               <!--col-md-9-->
             
               
            </div>
            <!--row-->


            <div class="row">
               <div class="col-md-12">
               <center>
                  <div class="more">
                    <!--  <a href="#" class="but-st" data-toggle="modal" data-target="#myModal">BOOK NOW</a> -->
                      <a data-toggle="modal"  href="#myModal"  data-id="<?php echo $artdetail['title']; ?>" class="open-AddBookDialog but-st">Book</a> 
                  </div>
               </center>
               </div>
            </div>

         </div>
         <!--container-->
      </section>
     <!-- /MAIN WRAP CONTENT -->



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
          <form action="<?php echo base_url('eventEmail'); ?>" method="post">

            <div class="row">
              <div class="col-md-6">
                 <div class="form-group">                
                  <input type="text" class="form-control" required name="name" placeholder="Name">
                </div>
              </div>

               <div class="col-md-6">
                  <div class="form-group">
                    <input type="email" class="form-control" required name="email" placeholder="Email">
                  </div>
                </div>

               <div class="col-md-6">
                  <div class="form-group">
                    <input type="number" class="form-control" required name="number" placeholder="Mobile Number">
                  </div>
                </div>

              <div class="col-md-12">
                <div class="form-group">                
                  <input type="text" class="form-control" required style="height:80px;" name="event" id="event" placeholder="Event Details">
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">                
                  <input class="form-control" id="datepicker" required name="datepicker" placeholder="Select Date">
                </div>
              </div>


               <div class="col-md-12">
                <div class="form-group">
                  <textarea name="message"  class="form-control" required rows="3" style="resize: none;" placeholder="Message..."></textarea>
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

<link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script type="text/javascript">
$(function() {
$( "#datepicker" ).datepicker();
});
</script>

<script type="text/javascript">

  $(document).on("click", ".open-AddBookDialog", function () {
     var myBookId = $(this).data('id');
     $(".modal-body #event").val( myBookId );
     // $('#myModel').modal('show');
});
  
  
</script>