<!DOCTYPE html>
<html lang="en-US">
   <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant - Restaurant, Bar, Cafe, Food</title>
    <meta name="robots" content="noodp"/>
    <!-- Google Fonts -->
    <!-- <link rel='stylesheet' id='dina-body-font-css'  href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' type='text/css' media='all' />
    <link rel='stylesheet' id='dina-post-titles-font-css'  href='http://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700' type='text/css' media='all' /> -->

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,500,700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel='stylesheet' id='dina-bootstrap-css-css'  href='<?php echo base_url('templates/restro/') ?>css/bootstrap/css/bootstrap.min.css' type='text/css' media='all' />
    <!-- Font Awesome Icons CSS -->
    <link rel='stylesheet' id='dina-font-awesome-css'  href='<?php echo base_url('templates/restro/') ?>css/fontawesome/css/font-awesome.min.css' type='text/css' media='all' />
    <!-- Main CSS File -->
    <link rel='stylesheet' id='dina-style-css-css'  href='<?php echo base_url('templates/restro/') ?>style.css' type='text/css' media='all' />
    <!-- favicons -->
    <link rel="icon" href="<?php echo base_url('templates/restro/') ?>images/icons/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" href="<?php echo base_url('templates/restro/') ?>images/icons/favicon-192x192.png" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url('templates/restro/') ?>images/icons/favicon-180x180.png" />
  </head>
  
   <body class="body-header1" >
   
   <!-- MOBILE MENU -->
      <div class="mask-nav-2">
      
         <!-- MENU -->
         <nav class="navbar navbar-2 nav-mobile">
            <div class="nav-holder nav-holder-2">
            
               <ul id="menu-menu-2" class="menu-nav-2">
                  <li class="menu-item  current-menu-item">
                     <a href="<?php echo  base_url(''); ?>">Home</a>
                  </li>
                  
                  <!-- <li class="menu-item ">
                     <a href="<?= base_url('our-company') ?>">Our Company</a>
                  </li> -->
                  
                  <li class="menu-item"><a class="submenu-item" href="JavaScript:Void(0);">Our Services</a>
                     <ul class="submenu">
                       <li><a href="<?php echo base_url('corporate'); ?>">Corporate Events</a></li>
                        <li><a href="<?php echo base_url('private_event'); ?>">Private Dining</a></li>
                        <li><a href="<?php echo base_url('space') ?>">Space Rental (Kim Yam)</a></li>
                      </ul>
                  </li>

                  <!-- <li class="menu-item"><a href="<?php echo base_url('menu'); ?>">Menu</a></li> -->
                  
                  <li class="menu-item ">
                     <a href="<?php echo base_url('myblog'); ?>">Event Update</a>
                  </li>
                  
                  <li class="menu-item ">
                     <a href="<?php echo base_url('gallery'); ?>">Event Gallery</a>
                  </li>

                  <li class="menu-item ">
                     <a href="#">Get Social</a>
                  </li>
                  
                  
                  <li class="menu-item"><a href="<?php echo base_url('contact'); ?>">Contact Us</a></li>
               </ul>
            </div>
         </nav>
          <!-- /MENU -->
         
         <!-- RIGHT SIDE -->
         <div class="rightside-nav-2">
         
            <h3>Book Now</h3>
            <ul class="right-side-contact">
               <li><label>Address:</label> 59-61 KIM YAM ROAD, SINGAPORE 239360</li>
               <li><label>Phone:</label> +65 9384 4383</li>
               <li><label>Email:</label> jolin@divinepalate.com </li>
            </ul>
            
            <!-- SOCIAL ICONS -->
            <ul class="search-social search-social-2">
               <li><a class="social-facebook" href="https://www.facebook.com/matchthemes" target="_blank"><i class="fa fa-facebook"></i></a></li>
               <li><a class="social-twitter" href="https://twitter.com/matchthemes" target="_blank"><i class="fa fa-twitter"></i></a></li>
               <li><a class="social-pinterest" href="#" target="_blank"><i class="fa fa-pinterest"></i></a></li>
               <li><a class="social-instagram" href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
            </ul>
            <!-- /SOCIAL ICONS -->
         </div>
         <!-- /RIGHT SIDE -->
         
      </div>
      <!-- /MOBILE MENU -->
   
      <!-- HEADER -->
      <header id="header-1">
         <div class="headerWrap-1">
            <nav class="navbar-1">
               <!-- TOP LEFT PAGE TEXT  -->
               <?php $logo =  $this->Cms_model->getLogo(); ?>
               <div class="top-location">
                  <img src="<?php echo base_url('photo/logo/').$logo;  ?>"> 
               </div>
               <!-- TOP RIGHT PAGE TEXT  -->

              <div class="book-now">
                 <a href="https://wa.me/<?php echo $this->Cms_model->getWhatsap(); ?>" target="_blank"><i class="fa fa-whatsapp"></i> Let's Chat</a>   
               </div> 
               
               <!-- MOBILE BUTTON NAV  -->
               <div class="nav-button-holder nav-btn-mobile inactive">
                <span class="menu-txt">MENU</span>
                <button type="button" class="nav-button">
                <span class="icon-bar"></span>
                </button>
                </div>
               
               <div class="nav-content-1">                
            
                  <!-- MENU -->
                  <div class="nav-holder nav-holder-1 nav-holder-desktop">
                    <ul id="menu-menu-1" class="menu-nav menu-nav-1">

                      <?php 
                      $page_menu = $this->Cms_model->getPageMenu(); 
                      if(!empty($page_menu))
                      {
                         foreach ($page_menu as $value) {

                                $getDropDown =  $this->Cms_model->getDropMenu($value['page_menu_id']);
                                if(count($getDropDown) == 0)
                                { ?> 
                                  <li class="menu-item <?php echo ($this->uri->segment(1) == $value['other_link']) ? 'current-menu-item' : ''; ?> ">
                                 <!-- <a href="<?php echo base_url().($value['other_link'] != "") ? $value['other_link'] : '' ?>"><?php echo $value['menu_name']; ?></a> -->
                                 <a href="<?php echo base_url(($value['other_link'] != "") ? $value['other_link'] : '') ?>"><?php echo $value['menu_name']; ?></a>
                                  </li>

                              <?php  }else { ?>

                                    <li class="menu-item <?php echo ($this->uri->segment(1) == $value['other_link']) ? 'current-menu-item' : ''; ?>"><a href=""><?php echo $value['menu_name']; ?></a>
                                       <ul>

                                          <?php if(!empty($getDropDown)) {
                                            foreach ($getDropDown as $value) { ?>

                                               <li><a href="<?php echo  base_url(($value['other_link'] != "") ? $value['other_link'] : '') ?>"><?php echo $value['menu_name']; ?></a></li>

                                              
                                         <?php   }

                                          }?>

                                        </ul>
                                    </li>
                                
                            <?php  }

                           ?>
                      <?php   }
                      }
                      ?>


                <!--   <li class="menu-item  current-menu-item">
                     <a href="<?= base_url() ?>">Home</a>
                  </li> -->
                  
                  <!-- <li class="menu-item ">
                     <a href="<?= base_url('our-company') ?>">Our Company</a>
                  </li> -->
                  
               <!--    <li class="menu-item"><a href="JavaScript:Void(0);">Our Services</a>
                     <ul>
                       <li><a href="<?= base_url('corporate') ?>">Corporate Events</a></li>
                        <li><a href="<?= base_url('private_event') ?>">Private Dining</a></li>
                        <li><a href="<?= base_url('space') ?>">Space Rental (Kim Yam)</a></li>
                      </ul>
                  </li> -->

                  <!-- <li class="menu-item"><a href="<?= base_url('menu') ?>">Menu</a></li> -->
                  
               <!--    <li class="menu-item ">
                     <a href="<?= base_url('blog') ?>">Event Update</a>
                  </li>
                  
                  <li class="menu-item ">
                     <a href="<?= base_url('gallery') ?>">Event Gallery</a>
                  </li>

                  <li class="menu-item ">
                     <a href="#">Get Social</a>
                  </li>
                  
                  
                  <li class="menu-item"><a href="<?= base_url('contact') ?>">Contact Us</a></li>
                     </ul>
                  </div> -->
                  <!-- /MENU -->
                  
               </div>
            </nav>
         </div>
         <!--headerWrap-->
      </header>
      <!-- /HEADER -->


      <?php echo $content; ?>


       <!-- FOOTER -->
      <footer>
         <div class="container">
            
            <!-- ROW -->
            <div class="row alignc">
            <?php $getSocial = $this->Cms_admin_model->getSocialValue('address'); ?>
                <!-- FOOTER COLUMN 1 -->
               <div class="col-md-4">
                  <div class="footer-content">
                     <h5>ADDRESS:</h5>
                     <p><?php echo $getSocial ;?> 
                     </p>
                  </div>
               </div>
               
               <!-- FOOTER COLUMN 2 -->
               <div class="col-md-4">
                  <div class="footer-content">
                     <h5>RESERVATION:</h5>
                      <?php $getSocial = $this->Cms_admin_model->getSocialValue('contact'); ?>
                     <p><?php echo $getSocial; ?><br/>
                      <?php $getSocial = $this->Cms_admin_model->getSocialValue('email'); ?>
                       
                         <?php echo $getSocial; ?>
                     </p>
                  </div>
               </div>
               
               <!-- FOOTER COLUMN 3 -->
               <div class="col-md-4">
                  <div class="footer-content">
                     <h5>OPEN HOURS:</h5>
                     <?php $getSocial = $this->Cms_admin_model->getSocialValue('open_hours'); ?>
                     <p><?php  echo $getSocial; ?>
                     </p>
                  </div>
               </div>
               
            </div>
            <!-- /ROW -->
            
            <!-- FOOTER SOCIAL -->
            <ul class="footer-social">
               <li><a class="social-facebook" href="https://www.facebook.com/divinepalate" target="_blank"><i class="fa fa-facebook"></i></a></li>
               <li><a class="social-twitter" href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>

               <li><a class="social-instagram" href="https://www.instagram.com/divine_palate" target="_blank"><i class="fa fa-instagram"></i></a></li>
            </ul>
            <!-- /FOOTER SOCIAL -->
            
            <!-- FOOTER COPYRIGHT -->
            <div class="copyright">
              <?php $getSocial = $this->Cms_admin_model->getSocialValue('copyright'); ?>
              <?php  echo $getSocial; ?>
            </div>
            <!-- /FOOTER COPYRIGHT -->
            
            <!-- FOOTER SCROLL UP -->
            <div class="scrollup">
               <a class="scrolltop" href="#">
               <i class="fa fa-chevron-up"></i>
               </a>
            </div>
            <!-- /FOOTER SCROLL UP -->
            
         </div>
         <!--container-->
         
      </footer>
       <!-- /FOOTER -->
       
      <!-- JS --> 
      <script  src='<?php echo base_url('templates/restro/') ?>js/jquery.js'></script>
      <script  src='<?php echo base_url('templates/restro/') ?>js/jquery-migrate.min.js'></script>
      <script  src='<?php echo base_url('templates/restro/') ?>css/bootstrap/js/popper.min.js'></script>
      <script  src='<?php echo base_url('templates/restro/') ?>css/bootstrap/js/bootstrap.min.js'></script>
      <script  src='<?php echo base_url('templates/restro/') ?>js/jquery.easing.min.js'></script>
      <script  src='<?php echo base_url('templates/restro/') ?>js/jquery.fitvids.js'></script>
      <script  src='<?php echo base_url('templates/restro/') ?>js/jquery.magnific-popup.min.js'></script>
      <script  src='<?php echo base_url('templates/restro/') ?>js/owl-carousel/owl.carousel.min.js'></script>
      <!-- MAIN JS -->
      
<script type="text/javascript">
  jQuery( document ).ready(function() {

    jQuery('.nav-button').on('click', function(e) {
      jQuery('.mask-nav-2').toggleClass("is-active"); 
      jQuery('.nav-button').toggleClass("active"); 
      e.preventDefault();
    });

    jQuery(".submenu-item").click(function(){
    jQuery(".submenu").toggle('slow');
});
});

  $(window).load(function() {
  $('#flexslider1').flexslider({
    animation: "slide",
    animationLoop: true,
    itemMargin: 0,
    slideshow: true,
    directionNav: true,
    controlNav: false
  });
});


  
</script>
   </body>
</html>