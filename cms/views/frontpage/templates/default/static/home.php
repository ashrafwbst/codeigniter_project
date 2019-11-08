<!--       <div class="slider-container">
        <div class="owl-carousel owl-theme home-slider">


            <?php if($slider){
                $count = 0;
                    foreach($slider as $row){ ?>
                        <?php if($row['file_upload']){
                        $img=base_url().'photo/upload/'. $row['file_upload'];
                    }else{
                        $img=base_url().'templates/default/assets/images/heroslider-image-1.jpg';
                    }

                    ?>
                <div class="slider-post <?php echo ($count == 0) ? 'slider-item-box-bkg' : ''; ?>">
                    <div class="slider-img" style="background-image:url('<?= $img ?>');"></div>
                
                    <div class="slider-caption">
                        <div class="slider-text">
                            <h1><?php echo $row['maintext']; ?></h1>
                            <p><?php echo $row['subtext']; ?></p>
                            <p> <a href="<?php echo $row['btn_link']; ?>" class="view-more more-white"><?php echo $row['btn_text']; ?></a></p>
                        </div>
                    </div>

                </div>
            <?php $count++; } }?>

            
   
        </div>
    </div>




 -->
 <style type="text/css">
     
     #flexslider1 li {
        position: relative;
     }
     
#flexslider1 {
background: none;
border: none;
box-shadow: none;
margin: 0px;
overflow: hidden;
}#flexslider1 .slider-caption {
z-index: 9;
top: 40%;
}
#flexslider1 ul.slides:before {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    height: 100%;
    width: 100%;
    opacity: 1;
    background-color: #0000009c;
    content: "";
    z-index: 9;
}
ul.flex-direction-nav {
    position: absolute;
    top: 50%;
    width: 100%;
}
div#flexslider1 .flex-viewport {
    max-height: 750px;
}
#flexslider1 .slider-text {
text-align: center;
}
 </style>

<section class="about-section">
    <!-- Place somewhere in the <body> of your page -->
    <div class="slider-container">
        <div class="flexslider" id="flexslider1">
          <ul class="slides">
            <?php foreach($slider as $row){ ?>
                <li>
                  <img src="<?=base_url().'photo/upload/'. $row['file_upload'] ?>" />
                  <div class="slider-caption">
                        <div class="slider-text">
                            <h1><?php echo $row['maintext']; ?></h1>
                            <p><?php echo $row['subtext']; ?></p>
                            <p> <a href="<?php echo $row['btn_link']; ?>" class="view-more more-white"><?php echo $row['btn_text']; ?></a></p>
                        </div>
                    </div>
                </li>
            <?php } ?>
          </ul>
        </div>
    </div>
</section>

 <?php $getAlbumOne = $this->Cms_admin_model->getAlbums(1); ?>

 <?php if(!empty($getAlbumOne))
       {
          foreach ($getAlbumOne as $albumValue) {  

           $isSubImageExist =  $this->Cms_admin_model->getAllSubAlbums($albumValue['id']); ?>
<section class="home-widget about-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="about-text">
                        <h2 class="home-title margin-b24">“<?php echo $albumValue['heading']; ?>”</h2>
                        <p><?php echo $albumValue['content']; ?></p>
                        <!-- <a href="#" class="book-btn margin-t32">About Us</a> -->
                    </div>
                </div>
                <div class="col-md-6">
                    <section class="slider">
                       <div id="" class="slider_alb flexslider">
                          <ul class="slides">
                            <?php $isSubImageExist =  $this->Cms_admin_model->getAllSubAlbums($albumValue['id']); 

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
                       <div id="" class="carousel_alb flexslider">
                          <ul class="slides">
                           
                           <?   if(!empty($isSubImageExist))
                             {
                                foreach ($isSubImageExist as $value) { ?>

                                      <li>
                                        <img src="<?php echo base_url('photo/album/').$value['sub_image']; ?>" />
                                     </li>
                                    
                             <?php   }
                             } ?>

                             
                          </ul>
                       </div>
                    </section>
                </div>
            </div>
        </div>
</section>

<?php } } ?>



<?php $getServiceContent = $this->Cms_admin_model->getServices();  ?>

<section class="menu-3colgrid-content home-widget">
    
    <div class="">
        <div class="row" style="margin: 0px;">
            <div class="col-md-12 alignc" style="padding: 0;">
                <h1 class="home-title margin-b24 title-headline"><?php echo $getServiceContent['heading']; ?></h1>
                <p><?php echo $getServiceContent['sub_heading']; ?></p>
                <div class="menu-holder menu-3col-grid-image clearfix">

                    <div class="menu-post">
                        <a href="<?php echo base_url('space'); ?>">
                            <div class="item-content-bkg">
                                <div class="menu-grid-img" style="background-image: url('<?php echo base_url('photo/album/').$getServiceContent['image_one'] ; ?>');">
                                    <br>
                                </div>
                                <div class="menu-post-desc">
                                    <h4><?php echo $getServiceContent['image_one_heading']; ?></h4>
                                    <div class="menu-text"><?php echo $getServiceContent['image_one_subheading']; ?></div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="menu-post">
                        <a href="<?php echo base_url('private_event'); ?>">
                            <div class="item-content-bkg">
                                <div class="menu-grid-img" style="background-image: url('<?php echo base_url('photo/album/').$getServiceContent['image_two'] ; ?>');">
                                    <br>
                                </div>
                                <div class="menu-post-desc">
                                    <h4><?php echo $getServiceContent['image_two_heading']; ?></h4>
                                    <div class="menu-text"><?php echo $getServiceContent['image_two_subheading']; ?></div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="menu-post">
                        <a href="<?php echo base_url('corporate'); ?>">
                            <div class="item-content-bkg">
                                <div class="menu-grid-img" style="background-image: url('<?php echo base_url('photo/album/').$getServiceContent['image_three'] ; ?>');">
                                    <br>
                                </div>
                                <div class="menu-post-desc">
                                    <h4><?php echo $getServiceContent['image_three_heading']; ?></h4>
                                    <div class="menu-text"><?php echo $getServiceContent['image_three_subheading']; ?></div>
                                </div>
                            </div>
                        </a>
                    </div>


                </div>
            </div>
        </div>
    </div>

</section>
<p>
    <br>
</p>

<div class="section-full content-inner bg-white client-section">
    <div class="container m-auto">
        <h3 class="m-b50 text-center home-title">Our Clients</h3>
        <div class="about-client-logo equal-wraper clearfix text-center">
         <?php $getAllClients = $this->Cms_admin_model->getAllClients();

          if(!empty($getAllClients))
          {
             foreach ($getAllClients as $value) { ?>
                     
                     <div class="client-logo equal-col"><img src="<?php echo base_url('photo/clients/').$value['image'] ; ?>" alt=""></div>                           
                 
           <?php  }
          } ?>

            

          <!--   <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-2.jpg" alt=""></div>
            <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-3.jpg" alt=""></div>
            <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-4.jpg" alt=""></div>
            <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-5.jpg" alt=""></div>
            <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-6.jpg" alt=""></div>
            <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-7.jpg" alt=""></div>
            <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-8.jpg" alt=""></div>
              <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-9.jpg" alt=""></div>
            <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-10.jpg" alt=""></div>
            <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-11.jpg" alt=""></div>
            <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-12.jpg" alt=""></div>
            <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-13.jpg" alt=""></div>
            <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-14.jpg" alt=""></div>
            <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-15.jpg" alt=""></div>
            <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-16.jpg" alt=""></div>
              <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-17.jpg" alt=""></div>
            <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-18.jpg" alt=""></div>
            <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-19.jpg" alt=""></div>
            <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-20.jpg" alt=""></div>
            <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-22.jpg" alt=""></div>
            <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-21.jpg" alt=""></div>
            <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-23.jpg" alt=""></div> -->
        </div>
      <!--   <div class="about-client-logo equal-wraper clearfix text-center">
            <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-9.jpg" alt=""></div>
            <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-10.jpg" alt=""></div>
            <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-11.jpg" alt=""></div>
            <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-12.jpg" alt=""></div>
            <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-13.jpg" alt=""></div>
            <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-14.jpg" alt=""></div>
            <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-15.jpg" alt=""></div>
            <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-16.jpg" alt=""></div>
        </div>
        <div class="about-client-logo equal-wraper clearfix text-center">
            <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-17.jpg" alt=""></div>
            <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-18.jpg" alt=""></div>
            <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-19.jpg" alt=""></div>
            <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-20.jpg" alt=""></div>
            <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-22.jpg" alt=""></div>
            <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-21.jpg" alt=""></div>
            <div class="client-logo equal-col"><img src="http://restaurant.homepeers.com/templates/restro/images/client-23.jpg" alt=""></div>
        </div> -->

    </div>
</div>

<?php $getPartner = $this->Cms_admin_model->getAllPartners(); ?>
<section id="home-content-8" class="home-widget parallax" style="background-image: url('http://restaurant.homepeers.com/templates/restro/images/experience.jpg'); background-position: 50% 50%;">
    <div class="parallax-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="alignc">
                        <h1 class="home-title margin-b24"><?php echo $getPartner['heading']; ?></h1>
                        <p><?php echo $getPartner['sub_heading']; ?></p></div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="brand-image">
                        <img src="<?php echo base_url('photo/partner/').$getPartner['image_one']; ?>">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="brand-image">
                        <img src="<?php echo base_url('photo/partner/').$getPartner['image_two']; ?>">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="brand-image">
                        <img src="<?php echo base_url('photo/partner/').$getPartner['image_three']; ?>">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="brand-image">
                        <img src="<?php echo base_url('photo/partner/').$getPartner['image_four']; ?>">
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>




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





     