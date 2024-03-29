

    <link rel="stylesheet" href="<?php echo base_url();?>templates/default/assets/css/style1.css">


<div id="wrapper" class="wrapper">

  <!-- Heroslider Area -->
        <div class="heroslider-area">
            <!-- Heroslider Slider -->
            <div class="heroslider-slider-2 heroslider-animated-content tm-slider-arrow tm-slider-dots-left">
 <?php if($slider){
		    		foreach($slider as $row){ ?>
		    			<?php if($row['file_upload']){
		    			$img=base_url().'photo/upload/'. $row['file_upload'];
		    		}else{
		    			$img=base_url().'templates/default/assets/images/heroslider-image-1.jpg';
		    		}

		    		?>
                <div class="heroslider-singleslider d-flex align-items-center" data-white-overlay="5" data-bgimage="<?php echo $img;?>">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 col-md-8">
                                <div class="heroslider-content">
                                      <h1><?php echo $row['maintext']; ?></h1>
                                    <p><?php echo $row['subtext']; ?></p>
                                    <a href="about-us.html" class="tm-button">About Us<b></b></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
		    <?php } }?>
               <!--  <div class="heroslider-singleslider d-flex align-items-center" data-white-overlay="5" data-bgimage="<?php echo base_url();?>templates/default/assets/images/heroslider-image-3.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 col-md-8">
                                <div class="heroslider-content">
                                    <h1>We are Providing Best Business
                                        Service</h1>
                                    <p>Business plan draws on a wide range of knowledge from many different business
                                        disciplines</p>
                                    <a href="about-us.html" class="tm-button">About Us<b></b></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

            </div>
            <!--// Heroslider Slider -->
        </div>
        <!--// Heroslider Area -->









        <main class="main-content">

            <!-- About Us Area -->
           <?php echo $content;?>

             <!-- Pupular Products -->
            <div class="tm-section product-section tm-padding-section bg-white">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-md-12">
                            <div class="tm-section-title text-center">
                                <h2>Our Latest Products</h2>
                                <p>Lorem ipsum dolor sit amet, in quodsi vulputate pro. Ius illum vocent mediocritatem
                                    an cule dicta iriure at phaedrum. </p>
                            </div>
                        </div>
                    </div>

                    <!-- Tab Buttons -->
                    <ul class="nav tm-tabgroup" id="bstab1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="bstab1-area1-tab" data-toggle="tab" href="#bstab1-area1"
                                role="tab" aria-controls="bstab1-area1" aria-selected="true">New</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="bstab1-area2-tab" data-toggle="tab" href="#bstab1-area2" role="tab"
                                aria-controls="bstab1-area2" aria-selected="false">Popular</a>
                        </li>
                    </ul>
                    <!--// Tab Buttons -->

                    <!-- Tab Content -->
                    <div class="tab-content" id="bstab1-ontent">
                        <div class="tab-pane fade show active" id="bstab1-area1" role="tabpanel" aria-labelledby="bstab1-area1-tab">

                            <div class="product-vertical-slider-active tm-slider-dots tm-slider-dots-vertical">
                                <div class="product-vertical-slider-row">
                                    <div class="row mt-30-reverse">

                                        <!-- Single Product -->
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt-30">
                                            <div class="tm-product">
                                                <div class="tm-product-image">
                                                    <a class="tm-product-imagelink" href="product-details.html">
                                                        <img src="<?php echo base_url();?>templates/default/assets/images/product-image-1.jpg" alt="product image">
                                                    </a>
                                                    <ul class="tm-product-actions">
                                                        <li><a href="cart.html"><i class="fas fa-shopping-cart"></i></a></li>
                                                        <li><button type="button" data-toggle="modal" data-target="#tm-product-quickview"><i
                                                                    class="far fa-eye"></i></button></li>
                                                    </ul>
                                                </div>
                                                <div class="tm-product-content">
                                                    <h5 class="tm-product-title"><a href="product-details.html">Pipple
                                                            Watch</a></h5>
                                                    <div class="tm-product-rating">
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                    </div>
                                                    <h6 class="tm-product-price">$99.99</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <!--// Single Product -->

                                        <!-- Single Product -->
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt-30">
                                            <div class="tm-product">
                                                <div class="tm-product-image">
                                                    <a class="tm-product-imagelink" href="product-details.html">
                                                        <img src="<?php echo base_url();?>templates/default/assets/images/product-image-2.jpg" alt="product image">
                                                    </a>
                                                    <ul class="tm-product-actions">
                                                        <li><a href="cart.html"><i class="fas fa-shopping-cart"></i></a></li>
                                                        <li><button type="button" data-toggle="modal" data-target="#tm-product-quickview"><i
                                                                    class="far fa-eye"></i></button></li>
                                                    </ul>
                                                </div>
                                                <div class="tm-product-content">
                                                    <h5 class="tm-product-title"><a href="product-details.html">Creative
                                                            3d Mug</a></h5>
                                                    <div class="tm-product-rating">
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                    </div>
                                                    <h5 class="tm-product-price"><del>$110.50</del> $99.99</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <!--// Single Product -->

                                        <!-- Single Product -->
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt-30">
                                            <div class="tm-product">
                                                <div class="tm-product-image">
                                                    <a class="tm-product-imagelink" href="product-details.html">
                                                        <img src="<?php echo base_url();?>templates/default/assets/images/product-image-3.jpg" alt="product image">
                                                    </a>
                                                    <ul class="tm-product-actions">
                                                        <li><a href="cart.html"><i class="fas fa-shopping-cart"></i></a></li>
                                                        <li><button type="button" data-toggle="modal" data-target="#tm-product-quickview"><i
                                                                    class="far fa-eye"></i></button></li>
                                                    </ul>
                                                </div>
                                                <div class="tm-product-content">
                                                    <h5 class="tm-product-title"><a href="product-details.html">Pipple
                                                            Notebook P-450</a></h5>
                                                    <div class="tm-product-rating">
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                    </div>
                                                    <h5 class="tm-product-price">$99.99</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <!--// Single Product -->

                                        <!-- Single Product -->
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt-30">
                                            <div class="tm-product">
                                                <div class="tm-product-image">
                                                    <a class="tm-product-imagelink" href="product-details.html">
                                                        <img src="<?php echo base_url();?>templates/default/assets/images/product-image-4.jpg" alt="product image">
                                                    </a>
                                                    <ul class="tm-product-actions">
                                                        <li><a href="cart.html"><i class="fas fa-shopping-cart"></i></a></li>
                                                        <li><button type="button" data-toggle="modal" data-target="#tm-product-quickview"><i
                                                                    class="far fa-eye"></i></button></li>
                                                    </ul>
                                                </div>
                                                <div class="tm-product-content">
                                                    <h5 class="tm-product-title"><a href="product-details.html">Awesome
                                                            Flower Tub</a></h5>
                                                    <div class="tm-product-rating">
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                    </div>
                                                    <h5 class="tm-product-price">$99.99</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <!--// Single Product -->

                                    </div>
                                </div>
                                <div class="product-vertical-slider-row">
                                    <div class="row mt-30-reverse">

                                        <!-- Single Product -->
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt-30">
                                            <div class="tm-product">
                                                <div class="tm-product-image">
                                                    <a class="tm-product-imagelink" href="product-details.html">
                                                        <img src="<?php echo base_url();?>templates/default/assets/images/product-image-3.jpg" alt="product image">
                                                    </a>
                                                    <ul class="tm-product-actions">
                                                        <li><a href="cart.html"><i class="fas fa-shopping-cart"></i></a></li>
                                                        <li><button type="button" data-toggle="modal" data-target="#tm-product-quickview"><i
                                                                    class="far fa-eye"></i></button></li>
                                                    </ul>
                                                </div>
                                                <div class="tm-product-content">
                                                    <h5 class="tm-product-title"><a href="product-details.html">Pipple
                                                            Notebook P-450</a></h5>
                                                    <div class="tm-product-rating">
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                    </div>
                                                    <h5 class="tm-product-price">$99.99</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <!--// Single Product -->

                                        <!-- Single Product -->
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt-30">
                                            <div class="tm-product">
                                                <div class="tm-product-image">
                                                    <a class="tm-product-imagelink" href="product-details.html">
                                                        <img src="<?php echo base_url();?>templates/default/assets/images/product-image-4.jpg" alt="product image">
                                                    </a>
                                                    <ul class="tm-product-actions">
                                                        <li><a href="cart.html"><i class="fas fa-shopping-cart"></i></a></li>
                                                        <li><button type="button" data-toggle="modal" data-target="#tm-product-quickview"><i
                                                                    class="far fa-eye"></i></button></li>
                                                    </ul>
                                                </div>
                                                <div class="tm-product-content">
                                                    <h5 class="tm-product-title"><a href="product-details.html">Awesome
                                                            Flower Tub</a></h5>
                                                    <div class="tm-product-rating">
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                    </div>
                                                    <h5 class="tm-product-price">$99.99</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <!--// Single Product -->

                                        <!-- Single Product -->
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt-30">
                                            <div class="tm-product">
                                                <div class="tm-product-image">
                                                    <a class="tm-product-imagelink" href="product-details.html">
                                                        <img src="<?php echo base_url();?>templates/default/assets/images/product-image-1.jpg" alt="product image">
                                                    </a>
                                                    <ul class="tm-product-actions">
                                                        <li><a href="cart.html"><i class="fas fa-shopping-cart"></i></a></li>
                                                        <li><button type="button" data-toggle="modal" data-target="#tm-product-quickview"><i
                                                                    class="far fa-eye"></i></button></li>
                                                    </ul>
                                                </div>
                                                <div class="tm-product-content">
                                                    <h5 class="tm-product-title"><a href="product-details.html">Pipple
                                                            Watch</a></h5>
                                                    <div class="tm-product-rating">
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                    </div>
                                                    <h6 class="tm-product-price">$99.99</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <!--// Single Product -->

                                        <!-- Single Product -->
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt-30">
                                            <div class="tm-product">
                                                <div class="tm-product-image">
                                                    <a class="tm-product-imagelink" href="product-details.html">
                                                        <img src="<?php echo base_url();?>templates/default/assets/images/product-image-2.jpg" alt="product image">
                                                    </a>
                                                    <ul class="tm-product-actions">
                                                        <li><a href="cart.html"><i class="fas fa-shopping-cart"></i></a></li>
                                                        <li><button type="button" data-toggle="modal" data-target="#tm-product-quickview"><i
                                                                    class="far fa-eye"></i></button></li>
                                                    </ul>
                                                </div>
                                                <div class="tm-product-content">
                                                    <h5 class="tm-product-title"><a href="product-details.html">Creative
                                                            3d Mug</a></h5>
                                                    <div class="tm-product-rating">
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                    </div>
                                                    <h5 class="tm-product-price"><del>$110.50</del> $99.99</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <!--// Single Product -->

                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="bstab1-area2" role="tabpanel" aria-labelledby="bstab1-area2-tab">
                            <div class="product-vertical-slider-active tm-slider-dots tm-slider-dots-vertical">

                                <div class="product-vertical-slider-row">
                                    <div class="row mt-30-reverse">

                                        <!-- Single Product -->
                                        <div class="col-lg-3 col-lg-3 col-md-6 col-sm-6 col-12 mt-30">
                                            <div class="tm-product">
                                                <div class="tm-product-image">
                                                    <a class="tm-product-imagelink" href="product-details.html">
                                                        <img src="<?php echo base_url();?>templates/default/assets/images/product-image-3.jpg" alt="product image">
                                                    </a>
                                                    <ul class="tm-product-actions">
                                                        <li><a href="cart.html"><i class="fas fa-shopping-cart"></i></a></li>
                                                        <li><button type="button" data-toggle="modal" data-target="#tm-product-quickview"><i
                                                                    class="far fa-eye"></i></button></li>
                                                    </ul>
                                                </div>
                                                <div class="tm-product-content">
                                                    <h5 class="tm-product-title"><a href="product-details.html">Pipple
                                                            Notebook P-450</a></h5>
                                                    <div class="tm-product-rating">
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                    </div>
                                                    <h5 class="tm-product-price">$99.99</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <!--// Single Product -->

                                        <!-- Single Product -->
                                        <div class="col-lg-3 col-lg-3 col-md-6 col-sm-6 col-12 mt-30">
                                            <div class="tm-product">
                                                <div class="tm-product-image">
                                                    <a class="tm-product-imagelink" href="product-details.html">
                                                        <img src="<?php echo base_url();?>templates/default/assets/images/product-image-4.jpg" alt="product image">
                                                    </a>
                                                    <ul class="tm-product-actions">
                                                        <li><a href="cart.html"><i class="fas fa-shopping-cart"></i></a></li>
                                                        <li><button type="button" data-toggle="modal" data-target="#tm-product-quickview"><i
                                                                    class="far fa-eye"></i></button></li>
                                                    </ul>
                                                </div>
                                                <div class="tm-product-content">
                                                    <h5 class="tm-product-title"><a href="product-details.html">Awesome
                                                            Flower Tub</a></h5>
                                                    <div class="tm-product-rating">
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                    </div>
                                                    <h5 class="tm-product-price">$99.99</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <!--// Single Product -->

                                        <!-- Single Product -->
                                        <div class="col-lg-3 col-lg-3 col-md-6 col-sm-6 col-12 mt-30">
                                            <div class="tm-product">
                                                <div class="tm-product-image">
                                                    <a class="tm-product-imagelink" href="product-details.html">
                                                        <img src="<?php echo base_url();?>templates/default/assets/images/product-image-1.jpg" alt="product image">
                                                    </a>
                                                    <ul class="tm-product-actions">
                                                        <li><a href="cart.html"><i class="fas fa-shopping-cart"></i></a></li>
                                                        <li><button type="button" data-toggle="modal" data-target="#tm-product-quickview"><i
                                                                    class="far fa-eye"></i></button></li>
                                                    </ul>
                                                </div>
                                                <div class="tm-product-content">
                                                    <h5 class="tm-product-title"><a href="product-details.html">Pipple
                                                            Watch</a></h5>
                                                    <div class="tm-product-rating">
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                    </div>
                                                    <h6 class="tm-product-price">$99.99</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <!--// Single Product -->

                                        <!-- Single Product -->
                                        <div class="col-lg-3 col-lg-3 col-md-6 col-sm-6 col-12 mt-30">
                                            <div class="tm-product">
                                                <div class="tm-product-image">
                                                    <a class="tm-product-imagelink" href="product-details.html">
                                                        <img src="<?php echo base_url();?>templates/default/assets/images/product-image-2.jpg" alt="product image">
                                                    </a>
                                                    <ul class="tm-product-actions">
                                                        <li><a href="cart.html"><i class="fas fa-shopping-cart"></i></a></li>
                                                        <li><button type="button" data-toggle="modal" data-target="#tm-product-quickview"><i
                                                                    class="far fa-eye"></i></button></li>
                                                    </ul>
                                                </div>
                                                <div class="tm-product-content">
                                                    <h5 class="tm-product-title"><a href="product-details.html">Creative
                                                            3d Mug</a></h5>
                                                    <div class="tm-product-rating">
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                    </div>
                                                    <h5 class="tm-product-price"><del>$110.50</del> $99.99</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <!--// Single Product -->

                                    </div>
                                </div>
                                <div class="product-vertical-slider-row">
                                    <div class="row mt-30-reverse">

                                        <!-- Single Product -->
                                        <div class="col-lg-3 col-lg-3 col-md-6 col-sm-6 col-12 mt-30">
                                            <div class="tm-product">
                                                <div class="tm-product-image">
                                                    <a class="tm-product-imagelink" href="product-details.html">
                                                        <img src="<?php echo base_url();?>templates/default/assets/images/product-image-1.jpg" alt="product image">
                                                    </a>
                                                    <ul class="tm-product-actions">
                                                        <li><a href="cart.html"><i class="fas fa-shopping-cart"></i></a></li>
                                                        <li><button type="button" data-toggle="modal" data-target="#tm-product-quickview"><i
                                                                    class="far fa-eye"></i></button></li>
                                                    </ul>
                                                </div>
                                                <div class="tm-product-content">
                                                    <h5 class="tm-product-title"><a href="product-details.html">Pipple
                                                            Watch</a></h5>
                                                    <div class="tm-product-rating">
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                    </div>
                                                    <h6 class="tm-product-price">$99.99</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <!--// Single Product -->

                                        <!-- Single Product -->
                                        <div class="col-lg-3 col-lg-3 col-md-6 col-sm-6 col-12 mt-30">
                                            <div class="tm-product">
                                                <div class="tm-product-image">
                                                    <a class="tm-product-imagelink" href="product-details.html">
                                                        <img src="<?php echo base_url();?>templates/default/assets/images/product-image-2.jpg" alt="product image">
                                                    </a>
                                                    <ul class="tm-product-actions">
                                                        <li><a href="cart.html"><i class="fas fa-shopping-cart"></i></a></li>
                                                        <li><button type="button" data-toggle="modal" data-target="#tm-product-quickview"><i
                                                                    class="far fa-eye"></i></button></li>
                                                    </ul>
                                                </div>
                                                <div class="tm-product-content">
                                                    <h5 class="tm-product-title"><a href="product-details.html">Creative
                                                            3d Mug</a></h5>
                                                    <div class="tm-product-rating">
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                    </div>
                                                    <h5 class="tm-product-price"><del>$110.50</del> $99.99</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <!--// Single Product -->

                                        <!-- Single Product -->
                                        <div class="col-lg-3 col-lg-3 col-md-6 col-sm-6 col-12 mt-30">
                                            <div class="tm-product">
                                                <div class="tm-product-image">
                                                    <a class="tm-product-imagelink" href="product-details.html">
                                                        <img src="<?php echo base_url();?>templates/default/assets/images/product-image-3.jpg" alt="product image">
                                                    </a>
                                                    <ul class="tm-product-actions">
                                                        <li><a href="cart.html"><i class="fas fa-shopping-cart"></i></a></li>
                                                        <li><button type="button" data-toggle="modal" data-target="#tm-product-quickview"><i
                                                                    class="far fa-eye"></i></button></li>
                                                    </ul>
                                                </div>
                                                <div class="tm-product-content">
                                                    <h5 class="tm-product-title"><a href="product-details.html">Pipple
                                                            Notebook P-450</a></h5>
                                                    <div class="tm-product-rating">
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                    </div>
                                                    <h5 class="tm-product-price">$99.99</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <!--// Single Product -->

                                        <!-- Single Product -->
                                        <div class="col-lg-3 col-lg-3 col-md-6 col-sm-6 col-12 mt-30">
                                            <div class="tm-product">
                                                <div class="tm-product-image">
                                                    <a class="tm-product-imagelink" href="product-details.html">
                                                        <img src="<?php echo base_url();?>templates/default/assets/images/product-image-4.jpg" alt="product image">
                                                    </a>
                                                    <ul class="tm-product-actions">
                                                        <li><a href="cart.html"><i class="fas fa-shopping-cart"></i></a></li>
                                                        <li><button type="button" data-toggle="modal" data-target="#tm-product-quickview"><i
                                                                    class="far fa-eye"></i></button></li>
                                                    </ul>
                                                </div>
                                                <div class="tm-product-content">
                                                    <h5 class="tm-product-title"><a href="product-details.html">Awesome
                                                            Flower Tub</a></h5>
                                                    <div class="tm-product-rating">
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                        <span class="active"><i class="fas fa-star"></i></span>
                                                    </div>
                                                    <h5 class="tm-product-price">$99.99</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <!--// Single Product -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--// Tab Content -->

                </div>
            </div>
            <!--// Pupular Products -->




             <!-- Brand Logos Area -->
            <div class="tm-section brand-logos-area tm-padding-section-bottom bg-white">
                <div class="container">
                    <div class="brandlogo-slider">

                        <!-- Brang Logo Single -->
                        <div class="brandlogo">
                            <a href="#">
                                <img src="<?php echo base_url();?>templates/default/assets/images/brand-logo-1.png" alt="brand-logo">
                            </a>
                        </div>
                        <!--// Brang Logo Single -->

                        <!-- Brang Logo Single -->
                        <div class="brandlogo">
                            <a href="#">
                                <img src="<?php echo base_url();?>templates/default/assets/images/brand-logo-2.png" alt="brand-logo">
                            </a>
                        </div>
                        <!--// Brang Logo Single -->

                        <!-- Brang Logo Single -->
                        <div class="brandlogo">
                            <a href="#">
                                <img src="<?php echo base_url();?>templates/default/assets/images/brand-logo-3.png" alt="brand-logo">
                            </a>
                        </div>
                        <!--// Brang Logo Single -->

                        <!-- Brang Logo Single -->
                        <div class="brandlogo">
                            <a href="#">
                                <img src="<?php echo base_url();?>templates/default/assets/images/brand-logo-4.png" alt="brand-logo">
                            </a>
                        </div>
                        <!--// Brang Logo Single -->

                        <!-- Brang Logo Single -->
                        <div class="brandlogo">
                            <a href="#">
                                <img src="<?php echo base_url();?>templates/default/assets/images/brand-logo-5.png" alt="brand-logo">
                            </a>
                        </div>
                        <!--// Brang Logo Single -->

                        <!-- Brang Logo Single -->
                        <div class="brandlogo">
                            <a href="#">
                                <img src="<?php echo base_url();?>templates/default/assets/images/brand-logo-1.png" alt="brand-logo">
                            </a>
                        </div>
                        <!--// Brang Logo Single -->

                        <!-- Brang Logo Single -->
                        <div class="brandlogo">
                            <a href="#">
                                <img src="<?php echo base_url();?>templates/default/assets/images/brand-logo-2.png" alt="brand-logo">
                            </a>
                        </div>
                        <!--// Brang Logo Single -->

                        <!-- Brang Logo Single -->
                        <div class="brandlogo">
                            <a href="#">
                                <img src="<?php echo base_url();?>templates/default/assets/images/brand-logo-3.png" alt="brand-logo">
                            </a>
                        </div>
                        <!--// Brang Logo Single -->

                        <!-- Brang Logo Single -->
                        <div class="brandlogo">
                            <a href="#">
                                <img src="<?php echo base_url();?>templates/default/assets/images/brand-logo-4.png" alt="brand-logo">
                            </a>
                        </div>
                        <!--// Brang Logo Single -->

                        <!-- Brang Logo Single -->
                        <div class="brandlogo">
                            <a href="#">
                                <img src="<?php echo base_url();?>templates/default/assets/images/brand-logo-5.png" alt="brand-logo">
                            </a>
                        </div>
                        <!--// Brang Logo Single -->

                    </div>
                </div>
            </div>
            <!--// Brand Logos Area -->





		</main>


</div>












  
