 <style>
     .zoomWindow {
    display: none !important;
}
.tm-prodetails-largeimage img {
    width: 100%;
}
pre{
    font-family: 'Poppins', sans-serif;
    overflow: unset;
    font-size: 14px;
}
 </style>
 <!-- Breadcrumb Area -->
        <div class="tm-breadcrumb-area tm-padding-section" data-bgimage="<?php echo base_url();?>templates/default/assets/images/imgbanner.jpeg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="tm-breadcrumb">
                            <h2>Product Details</h2>
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="#">Our Product</a></li>
                                <li>Product Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--// Breadcrumb Area -->

        <!-- Main Content -->
        <main class="main-content">

            <!-- Product Details Area -->
            <div class="tm-section product-details-area bg-white tm-padding-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="tm-prodetails">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">

                                        <!-- Product Details Images -->
                                        <div class="tm-prodetails-images">
                                            <div class="tm-prodetails-largeimage">
                                                <img src="<?php echo base_url();?>photo/products/<?php echo $product['product_image']; ?>"
                                                    data-zoom-image="<?php echo base_url();?>photo/products/<?php echo $product['product_image']; ?>"
                                                    alt="product image">
                                                <a href="<?php echo base_url();?>photo/products/<?php echo $product['product_image']; ?>"
                                                    class="tm-prodetails-zoomimage">
                                                    <i class="fas fa-search-plus"></i>
                                                </a>
                                            </div>
                                            <div id="image-gallery" class="tm-prodetails-thumbs">
                                                <a class="active" href="#" data-image="<?php echo base_url();?>photo/products/<?php echo $product['product_image']; ?>"
                                                    data-zoom-image="<?php echo base_url();?>photo/products/<?php echo $product['product_image']; ?>">
                                                    <img src="<?php echo base_url();?>photo/products/<?php echo $product['product_image']; ?>" alt="">
                                                </a>
                                                <?php if ($extra_images): ?>
                                                    <?php foreach ($extra_images as $img): ?>
                                                        <a class="" href="#" data-image="<?php echo base_url();?>photo/products/<?php echo $img['images']; ?>"
                                                            data-zoom-image="<?php echo base_url();?>photo/products/<?php echo $img['images']; ?>">
                                                            <img src="<?php echo base_url();?>photo/products/<?php echo $img['images']; ?>" alt="">
                                                        </a>
                                                    <?php endforeach ?>
                                                <?php endif ?>
                                                <!-- <a href="#" data-image="<?php echo base_url();?>templates/default/assets/images//prdoduct-details-image-2.jpg"
                                                    data-zoom-image="<?php echo base_url();?>templates/default/assets/images/prdoduct-details-image-2-lg.jpg">
                                                    <img src="<?php echo base_url();?>templates/default/assets/images/product-image-3.jpg" alt="">
                                                </a>
                                                <a href="#" data-image="<?php echo base_url();?>templates/default/assets/images/prdoduct-details-image-3.jpg"
                                                    data-zoom-image="<?php echo base_url();?>templates/default/assets/images//prdoduct-details-image-3-lg.jpg">
                                                    <img src="<?php echo base_url();?>templates/default/assets/images/product-image-4.jpg" alt="">
                                                </a>
                                                <a href="#" data-image="<?php echo base_url();?>templates/default/assets/images//prdoduct-details-image-4.jpg"
                                                    data-zoom-image="<?php echo base_url();?>templates/default/assets/images/prdoduct-details-image-4-lg.jpg">
                                                    <img src="<?php echo base_url();?>templates/default/assets/images/product-image-5.jpg" alt="">
                                                </a>
                                                <a href="#" data-image="<?php echo base_url();?>templates/default/assets/images//prdoduct-details-image-5.jpg"
                                                    data-zoom-image="<?php echo base_url();?>templates/default/assets/images//prdoduct-details-image-5-lg.jpg">
                                                    <img src="<?php echo base_url();?>templates/default/assets/images/product-image-6.jpg" alt="">
                                                </a> -->
                                            </div>
                                        </div>
                                        <!--// Product Details Images -->

                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <?php //print_r($product) ?>
                                        <div class="tm-prodetails-content">
                                            <h3 class="tm-prodetails-title"><?= $product['product_name'] ?></h3>
                                            <div class="tm-rating">
                                                <span class="active"><i class="fas fa-star"></i></span>
                                                <span class="active"><i class="fas fa-star"></i></span>
                                                <span class="active"><i class="fas fa-star"></i></span>
                                                <span class="active"><i class="fas fa-star"></i></span>
                                                <span class="active"><i class="fas fa-star"></i></span>
                                            </div>
                                            <p class="tm-prodetails-availability">Available: <span>In Stock</span></p>
                                            <div class="tm-prodetails-price">
                                                <span><?php if ($product['product_price']): ?>
                                                    <!-- <del><?= $product['product_price'] ?></del>  -->
                                                <?php endif ?>
                                                <?php if ($product['sale_price']): ?>
                                                     <?= $product['sale_price'] ?>
                                                <?php endif ?>
                                               </span>
                                            </div>
                                            <p><pre><?= $product['product_description'] ?></pre></p>
                                            <!-- <div class="tm-prodetails-quantitycart">
                                                <div class="tm-quantitybox">
                                                    <input type="text" value="1">
                                                </div>
                                                <a href="#" class="tm-button">Add To Cart<b></b></a>
                                            </div> -->

                                            <div class="tm-prodetails-categories">
                                                <h6>Categories :</h6>
                                                <ul>
                                                    <li><a href="<?= base_url('products').'?ctgry='.$product['product_category'] ?>"><?= $product['category_name'] ?></a></li>
                                                    <!-- <li><a href="#">Electronics</a></li>
                                                    <li><a href="#">White</a></li> -->
                                                </ul>
                                            </div>

                                            <!-- <div class="tm-prodetails-tags">
                                                <h6>Tags :</h6>
                                                <ul>
                                                    <li><a href="#">Electronic</a></li>
                                                    <li><a href="#">Smartwatch</a></li>
                                                </ul>
                                            </div> -->

                                           <!--  <div class="tm-prodetails-share">
                                                <h6>Share :</h6>
                                                <ul>
                                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-skype"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                                </ul>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Details Description & Review -->
                            <div class="tm-prodetails-desreview tm-padding-section-sm-top">
                                <!-- <ul class="nav tm-tabgroup2" id="prodetails" role="tablist"> -->
                                    <!-- <li class="nav-item">
                                        <a class="nav-link active" id="prodetails-area1-tab" data-toggle="tab" href="#prodetails-area1"
                                            role="tab" aria-controls="prodetails-area1" aria-selected="true">Description</a>
                                    </li> -->
                                   <!--  <li class="nav-item">
                                        <a class="nav-link" id="prodetails-area2-tab" data-toggle="tab" href="#prodetails-area2"
                                            role="tab" aria-controls="prodetails-area2" aria-selected="false">Reviews
                                            (1)</a>
                                    </li> -->
                                <!-- </ul> -->
                                <div class="tab-content" id="prodetails-content">
                                    <!-- <div class="tab-pane fade show active" id="prodetails-area1" role="tabpanel"
                                        aria-labelledby="prodetails-area1-tab">
                                        <div class="tm-prodetails-description">
                                            <?= $product['product_description'] ?>
                                        </div>
                                    </div> -->
                                    <div class="tab-pane fade" id="prodetails-area2" role="tabpanel" aria-labelledby="prodetails-area2-tab">
                                        <div class="tm-prodetails-review">
                                            <h5 class="text-uppercase">1 Review For Latest Smartwatch H-250 2018</h5>
                                            <div class="tm-comment-wrapper mb-50">
                                                <!-- Comment Single -->
                                                <div class="tm-comment">
                                                    <div class="tm-comment-thumb">
                                                        <img src="<?php echo base_url();?>templates/default/assets/images/author-image-3.png" alt="author image">
                                                    </div>
                                                    <div class="tm-comment-content">
                                                        <h6 class="tm-comment-authorname"><a href="#">Kareem Todd</a></h6>
                                                        <span class="tm-comment-date">Wednesday, October 17, 2018 at
                                                            4:00PM.</span>
                                                        <div class="tm-rating">
                                                            <span class="active"><i class="fas fa-star"></i></span>
                                                            <span class="active"><i class="fas fa-star"></i></span>
                                                            <span class="active"><i class="fas fa-star"></i></span>
                                                            <span class="active"><i class="fas fa-star"></i></span>
                                                            <span class="active"><i class="fas fa-star"></i></span>
                                                        </div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                            sed do
                                                            eiusmod
                                                            tempor incididunt ut labore dolore magna aliqua. Ut enim ad
                                                            minim
                                                            veniam.</p>
                                                    </div>
                                                </div>
                                                <!--// Comment Single -->
                                            </div>

                                            <h5 class="text-uppercase">Add a review</h5>
                                            <form action="#" class="tm-form">
                                                <div class="tm-form-inner">
                                                    <div class="tm-form-field">
                                                        <div class="tm-rating tm-rating-input">
                                                            <span class="active"><i class="fas fa-star"></i></span>
                                                            <span class="active"><i class="fas fa-star"></i></span>
                                                            <span class="active"><i class="fas fa-star"></i></span>
                                                            <span class="active"><i class="fas fa-star"></i></span>
                                                            <span><i class="fas fa-star"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="tm-form-field tm-form-fieldhalf">
                                                        <input type="text" placeholder="Your Name*" required="required">
                                                    </div>
                                                    <div class="tm-form-field tm-form-fieldhalf">
                                                        <input type="Email" placeholder="Your Email*" required="required">
                                                    </div>
                                                    <div class="tm-form-field">
                                                        <textarea name="product-review" cols="30" rows="5"
                                                            placeholder="Your Review"></textarea>
                                                    </div>
                                                    <div class="tm-form-field">
                                                        <button type="submit" class="tm-button">Submit <b></b></button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--// Product Details Description & Review -->

                            <!-- <div class="tm-similliar-products tm-padding-section-sm-top">
                                <h3 class="small-title">Similliar Products</h3>
                                <div class="tm-similliar-products-slider tm-slider-arrow tm-slider-arrow-hovervisible row"> -->
                                    <!-- Single Product -->
                                       <?php //$j=1;if($allproducts){ foreach(array_reverse($allproducts)  as $pro){ if($j<=4){ ?>
                                   <!--  <div class="col-12">
                                        <div class="tm-product">
                                            <div class="tm-product-image">
                                                <a class="tm-product-imagelink" href="<?php echo base_url('product/'.$pro['id']); ?>">
                                                        <img src="<?php echo base_url();?>photo/products/<?php echo $pro['product_image']; ?>" alt="product image">
                                                    </a>
                                                <ul class="tm-product-actions">
                                                    <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                                    <li><button type="button" data-toggle="modal" data-target="#tm-product-quickview"><i
                                                                class="far fa-eye"></i></button></li>
                                                </ul>
                                            </div>
                                            <div class="tm-product-content">
                                                <h5 class="tm-product-title"><a href="<?php echo base_url('product/'.$pro['id']); ?>"><?php echo $pro['product_name']; ?></a></h5>
                                                <div class="tm-product-rating">
                                                    <span class="active"><i class="fas fa-star"></i></span>
                                                    <span class="active"><i class="fas fa-star"></i></span>
                                                    <span class="active"><i class="fas fa-star"></i></span>
                                                    <span class="active"><i class="fas fa-star"></i></span>
                                                    <span class="active"><i class="fas fa-star"></i></span>
                                                </div>
                                                <h5 class="tm-product-price"><del>$<?php echo $pro['product_price']; ?></del>$<?php echo $pro['sale_price']; ?>
                                            </div>
                                        </div>
                                    </div> -->
                                     <?php //}$j++;}} ?>
                                    <!--// Single Product -->

                                    <!-- Single Product -->
                                   <!--  <div class="col-12">
                                        <div class="tm-product">
                                            <div class="tm-product-image">
                                                <a class="tm-product-imagelink" href="#">
                                                    <img src="<?php echo base_url();?>templates/default/assets/images/product-image-2.jpg" alt="product image">
                                                </a>
                                                <ul class="tm-product-actions">
                                                    <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                                    <li><button type="button" data-toggle="modal" data-target="#tm-product-quickview"><i
                                                                class="far fa-eye"></i></button></li>
                                                </ul>
                                            </div>
                                            <div class="tm-product-content">
                                                <h5 class="tm-product-title"><a href="#">Creative
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
                                    </div> -->
                                    <!--// Single Product -->

                                    <!-- Single Product -->
                   <!--                  <div class="col-12">
                                        <div class="tm-product">
                                            <div class="tm-product-image">
                                                <a class="tm-product-imagelink" href="#">
                                                    <img src="<?php echo base_url();?>templates/default/assets/images/product-image-3.jpg" alt="product image">
                                                </a>
                                                <ul class="tm-product-actions">
                                                    <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                                    <li><button type="button" data-toggle="modal" data-target="#tm-product-quickview"><i
                                                                class="far fa-eye"></i></button></li>
                                                </ul>
                                            </div>
                                            <div class="tm-product-content">
                                                <h5 class="tm-product-title"><a href="#">Pipple
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
                                    </div> -->
                                    <!--// Single Product -->

                                    <!-- Single Product -->
                                   <!--  <div class="col-12">
                                        <div class="tm-product">
                                            <div class="tm-product-image">
                                                <a class="tm-product-imagelink" href="#">
                                                    <img src="<?php echo base_url();?>templates/default/assets/images/product-image-4.jpg" alt="product image">
                                                </a>
                                                <ul class="tm-product-actions">
                                                    <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                                    <li><button type="button" data-toggle="modal" data-target="#tm-product-quickview"><i
                                                                class="far fa-eye"></i></button></li>
                                                </ul>
                                            </div>
                                            <div class="tm-product-content">
                                                <h5 class="tm-product-title"><a href="#">Awesome
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
                                    </div> -->
                                    <!--// Single Product -->
                              <!--   </div>
                            </div> -->

                        </div>
                        <!-- <div class="col-lg-3">
                            <div class="widgets sidebar-widgets3 sticky-sidebar">
 -->
                                <!-- Single Widget -->
                             <!--    <div class="single-widget widget-categories">
                                    <h5 class="widget-title">Categories</h5>
                                    <ul> -->
                                        <?php //if($categories){ foreach($categories as $row){ ?>
                                        <!-- <li><a href="<?= base_url('products').'?ctgry='.$row['id'] ?>"><?php echo $row['category_name']; ?></a></li> -->
                                    <?php //}} ?>
                                        <!-- <li><a href="#">Electronic Devices <span>25</span></a></li>
                                        <li><a href="#">Electronic Accessories <span>34</span></a></li>
                                        <li><a href="#">Health & Beauty <span>12</span></a></li>
                                        <li><a href="#">Babies & Toys <span>28</span></a></li>
                                        <li><a href="#">Home & Lifestyle <span>30</span></a></li>
                                        <li><a href="#">Sports & Outdoor <span>08</span></a></li> -->
                                  <!--   </ul>
                                </div> -->
                                <!--// Single Widget -->

                                <!-- Single Widget -->
                               <!--  <div class="single-widget widget-popularproduct">
                                    <h5 class="widget-title">Popular Product</h5>
                                    <ul>
                                        <li>
                                            <a href="#" class="widget-popularproduct-image">
                                                <img src="<?php echo base_url();?>templates/default/assets/images/product-thumbnail-1.png" alt="product thumbnail">
                                            </a>
                                            <div class="widget-popularproduct-content">
                                                <h6><a href="#">Corded Headphones</a></h6>
                                                <span>$20.00</span>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#" class="widget-popularproduct-image">
                                                <img src="<?php echo base_url();?>templates/default/assets/images/product-thumbnail-2.png" alt="product thumbnail">
                                            </a>
                                            <div class="widget-popularproduct-content">
                                                <h6><a href="#">Analog Watch</a></h6>
                                                <span>$35.99</span>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#" class="widget-popularproduct-image">
                                                <img src="<?php echo base_url();?>templates/default/assets/images/product-thumbnail-3.png" alt="product thumbnail">
                                            </a>
                                            <div class="widget-popularproduct-content">
                                                <h6><a href="#">Pentax SLR Camera</a></h6>
                                                <span>$99.99</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div> -->
                                <!--// Single Widget -->

                                <!-- Single Widget -->
                            <!--     <div class="single-widget widget-size">
                                    <h5 class="widget-title">Size Options</h5>
                                    <ul>
                                        <li><a href="#">Small </a></li>
                                        <li><a href="#">Medium</a></li>
                                        <li><a href="#">Large</a></li>
                                        <li><a href="#">Extra Large </a></li>
                                    </ul>
                                </div> -->
                                <!--// Single Widget -->

                            <!-- </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <!--// Product Details Area -->

        </main>
        <!--// Main Content -->
