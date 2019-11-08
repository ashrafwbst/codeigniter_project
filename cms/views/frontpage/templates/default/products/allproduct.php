  <!-- Breadcrumb Area -->
        <div class="tm-breadcrumb-area tm-padding-section" data-bgimage="<?php echo base_url();?>templates/default/assets/images/imgbanner.jpeg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="tm-breadcrumb">
                            <h2>Our Products</h2>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li>Our Products</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--// Breadcrumb Area -->










 <!-- Main Content -->
        <main class="main-content">

            <!-- Shop Page Area -->
            <div class="tm-section shop-page-area bg-white tm-padding-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-12 order-1 order-lg-2">
                            <form action="#" class="tm-shop-header">
                                <p class="tm-shop-countview">Showing <?= $d_from ?> to <?= $d_to ?> of <?= $d_total ?> </p>
                                <!-- <select>
                                    <option value="value">Default Sorting</option>
                                    <option value="value">Name A-Z</option>
                                    <option value="value">Date</option>
                                    <option value="value">Best Sellers</option>
                                    <option value="value">Trending</option>
                                </select> -->
                            </form>
                            <div class="tm-shop-products">
                                <div class="row mt-50-reverse">

                                    <!-- Single Product -->

                                    <?php if($products){ foreach($products as $pro){ ?>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt-50">
                                        <div class="tm-product">
                                            <div class="tm-product-image">
                                                <a class="tm-product-imagelink" href="<?php echo base_url('product/'.$pro['id']); ?>">
                                                    <img src="<?php echo base_url();?>photo/products/<?php echo $pro['product_image']; ?>" alt="product image">
                                                </a>
                                                <ul class="tm-product-actions">
                                                    <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                                    <li><button type="button" data-toggle="modal" data-target="#tm-product-quickview<?php echo $pro['id']; ?>"><i
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
                                                <h5 class="tm-product-price"><!-- <del><?php echo $pro['product_price']; ?></del> --> <?php echo $pro['sale_price']; ?></h5>
                                                
                                            </div>
                                        </div>
                                    </div>

    <div class="tm-product-quickview modal fade" id="tm-product-quickview<?php echo $pro['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="container">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                        <div class="tm-prodetails">
                            <div class="row">
                                <div class="col-lg-5 col-md-6 col-12">

                                    <!-- Product Details Images -->
                                    <div class="tm-prodetails-images">
                                        <div class="tm-prodetails-largeimage">
                                            <img src="<?php echo base_url();?>photo/products/<?php echo $pro['product_image']; ?>"
                                                data-zoom-image="<?php echo base_url();?>photo/products/<?php echo $pro['product_image']; ?>"
                                                alt="product image">
                                        </div>

                                        <div id="image-gallery" class="tm-prodetails-thumbs">

                                            <a class="active" href="#" data-image="<?php echo base_url();?>photo/products/<?php echo $pro['product_image']; ?>"
                                                data-zoom-image="<?php echo base_url();?>photo/products/<?php echo $pro['product_image']; ?>">
                                                <img src="<?php echo base_url();?>photo/products/<?php echo $pro['product_image']; ?>" alt="">
                                            </a>
                                            <?php $img=$this->db->get_where('products_extra_images',array('product_id'=>$pro['id']))->result_array();

                                            if($img){foreach($img as $im){ ?>
                                            <a href="#" data-image="<?php echo base_url();?>photo/products/<?php echo $im['images']; ?>"
                                                data-zoom-image="<?php echo base_url();?>photo/products/<?php echo $im['images']; ?>">
                                                <img src="<?php echo base_url();?>photo/products/<?php echo $im['images']; ?>" alt="">
                                            </a>
                                        <?php }} ?>
                                     <!--        <a href="#" data-image="<?php echo base_url();?>templates/default/assets/images/prdoduct-details-image-3.jpg"
                                                data-zoom-image="<?php echo base_url();?>templates/default/assets/images/prdoduct-details-image-3-lg.jpg">
                                                <img src="<?php echo base_url();?>templates/default/assets/images/product-image-4.jpg" alt="">
                                            </a>
                                            <a href="#" data-image="<?php echo base_url();?>templates/default/assets/images/prdoduct-details-image-4.jpg"
                                                data-zoom-image="<?php echo base_url();?>templates/default/assets/images/prdoduct-details-image-4-lg.jpg">
                                                <img src="<?php echo base_url();?>templates/default/assets/images/product-image-5.jpg" alt="">
                                            </a>
                                            <a href="#" data-image="<?php echo base_url();?>templates/default/assets/images/prdoduct-details-image-5.jpg"
                                                data-zoom-image="<?php echo base_url();?>templates/default/assets/images/prdoduct-details-image-5-lg.jpg">
                                                <img src="<?php echo base_url();?>templates/default/assets/images/product-image-6.jpg" alt="">
                                            </a> -->
                                        </div>
                                    </div>
                                    <!--// Product Details Images -->

                                </div>

                                <div class="col-lg-7 col-md-6 col-12">
                                    <div class="tm-prodetails-content">
                                        <?php //print_r($pro); ?>
                                        <h3 class="tm-prodetails-title"><?php echo $pro['product_name']; ?></h3>
                                        <div class="tm-rating">
                                            <span class="active"><i class="fas fa-star"></i></span>
                                            <span class="active"><i class="fas fa-star"></i></span>
                                            <span class="active"><i class="fas fa-star"></i></span>
                                            <span class="active"><i class="fas fa-star"></i></span>
                                            <span class="active"><i class="fas fa-star"></i></span>
                                        </div>
                                        <p class="tm-prodetails-availability">Availalbe: <span>In Stock</span></p>
                                        <div class="tm-prodetails-price">
                                            <span><del>$<?php echo $pro['product_price']; ?></del> $<?php echo $pro['sale_price']; ?></span>
                                        </div>
                                        <p><?php echo $pro['product_description']; ?></p>
                                        <div class="tm-prodetails-quantitycart">
                                            <div class="tm-quantitybox">
                                                <input type="text" value="1">
                                            </div>
                                            <a href="#" class="tm-button">Add To Cart<b></b></a>
                                        </div>

                                        <div class="tm-prodetails-categories">
                                            <h6>Categories :</h6>
                                            <ul>
                                                <li><a href="#"><?php echo $pro['category_name']; ?></a></li>
                                            <!--     <li><a href="#">Electronics</a></li>
                                                <li><a href="#">White</a></li> -->
                                            </ul>
                                        </div>

                                       <!--  <div class="tm-prodetails-tags">
                                            <h6>Tags :</h6>
                                            <ul>
                                                <li><a href="#">Electronic</a></li>
                                                <li><a href="#">Smartwatch</a></li>
                                            </ul>
                                        </div> -->

                                        <div class="tm-prodetails-share">
                                            <h6>Share :</h6>
                                            <ul>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-skype"></i></a></li>
                                                <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





                                <?php } }else {
                                    echo '<h3 style="margin-top:20px;">No Products found!</h3>';
                                } ?>
                                    <!--// Single Product -->

                                    <!-- Single Product -->
                                   <!--  <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt-50">
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
                                   <!--  <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt-50">
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
                                   <!--  <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt-50">
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

                                    <!-- Single Product -->
                                    <!-- <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt-50">
                                        <div class="tm-product">
                                            <div class="tm-product-image">
                                                <a class="tm-product-imagelink" href="#">
                                                    <img src="<?php echo base_url();?>templates/default/assets/images/product-image-5.jpg" alt="product image">
                                                </a>
                                                <ul class="tm-product-actions">
                                                    <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                                    <li><button type="button" data-toggle="modal" data-target="#tm-product-quickview"><i
                                                                class="far fa-eye"></i></button></li>
                                                </ul>
                                            </div>
                                            <div class="tm-product-content">
                                                <h5 class="tm-product-title"><a href="#">Latest X
                                                        Phone</a></h5>
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
                                    <!-- <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt-50">
                                        <div class="tm-product">
                                            <div class="tm-product-image">
                                                <a class="tm-product-imagelink" href="#">
                                                    <img src="<?php echo base_url();?>templates/default/assets/images/product-image-6.jpg" alt="product image">
                                                </a>
                                                <ul class="tm-product-actions">
                                                    <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                                    <li><button type="button" data-toggle="modal" data-target="#tm-product-quickview"><i
                                                                class="far fa-eye"></i></button></li>
                                                </ul>
                                            </div>
                                            <div class="tm-product-content">
                                                <h5 class="tm-product-title"><a href="#">C-200
                                                        Camera</a></h5>
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
                                   <!--  <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt-50">
                                        <div class="tm-product">
                                            <div class="tm-product-image">
                                                <a class="tm-product-imagelink" href="#">
                                                    <img src="<?php echo base_url();?>templates/default/assets/images/product-image-7.jpg" alt="product image">
                                                </a>
                                                <ul class="tm-product-actions">
                                                    <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                                    <li><button type="button" data-toggle="modal" data-target="#tm-product-quickview"><i
                                                                class="far fa-eye"></i></button></li>
                                                </ul>
                                            </div>
                                            <div class="tm-product-content">
                                                <h5 class="tm-product-title"><a href="#">Awesome
                                                        Headphone</a></h5>
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
                                   <!--  <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt-50">
                                        <div class="tm-product">
                                            <div class="tm-product-image">
                                                <a class="tm-product-imagelink" href="#">
                                                    <img src="<?php echo base_url();?>templates/default/assets/images/product-image-8.jpg" alt="product image">
                                                </a>
                                                <ul class="tm-product-actions">
                                                    <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                                    <li><button type="button" data-toggle="modal" data-target="#tm-product-quickview"><i
                                                                class="far fa-eye"></i></button></li>
                                                </ul>
                                            </div>
                                            <div class="tm-product-content">
                                                <h5 class="tm-product-title"><a href="#">Black
                                                        Backpack</a></h5>
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
                                   <!--  <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt-50">
                                        <div class="tm-product">
                                            <div class="tm-product-image">
                                                <a class="tm-product-imagelink" href="#">
                                                    <img src="<?php echo base_url();?>templates/default/assets/images/product-image-9.jpg" alt="product image">
                                                </a>
                                                <ul class="tm-product-actions">
                                                    <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                                    <li><button type="button" data-toggle="modal" data-target="#tm-product-quickview"><i
                                                                class="far fa-eye"></i></button></li>
                                                </ul>
                                            </div>
                                            <div class="tm-product-content">
                                                <h5 class="tm-product-title"><a href="#">Dslr camera
                                                        lens</a></h5>
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

                                </div>
                            </div>
                            <div class="tm-pagination mt-50">
                                <?= $links ?>
                                <!-- <ul>
                                    <li class="is-active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">Next Page</a></li>
                                </ul> -->
                            </div>
                        </div>
                        <div class="col-lg-3 col-12 order-2 order-lg-1 mbl-hide">
                            <div class="widgets sidebar-widgets3 sticky-sidebar">
                                <?php //print_r($categories); echo '<br>'; ?>
                                <?php //print_r($subcategories) ?>
                                <!-- Single Widget -->
                                <div class="single-widget widget-categories">
                                    <h5 class="widget-title">Categories</h5>
                                    <ul>
                                        <?php if($categories){ foreach($categories as $row){ ?>
                                        <li><a class="menu-toggle" href="JavaScript:Void(0);"><?php echo $row['category_name']; ?></a>
                                            <ol class="ul_submenu">
                                                <?php if($subcategories){ foreach($subcategories as $row1){ ?>
                                                    <?php if ($row1['category_id']==$row['id']): ?>
                                                        <li style="border-bottom: none; padding: 5px 0!important;"><a href="<?= base_url('products').'?subctgry='.$row1['id'] ?>"><?php echo $row1['category_name']; ?></a></li>
                                                    <?php endif ?>
                                                <?php }} ?>
                                            </ol>
                                        </li>
                                     <!--    <li><a href="#">Electronic Accessories</a></li>
                                        <li><a href="#">Health & Beauty</a></li>
                                        <li><a href="#">Babies & Toys</a></li>
                                        <li><a href="#">Home & Lifestyle</a></li>
                                        <li><a href="#">Sports & Outdoor</a></li> -->
                                    <?php }} ?>
                                    </ul>
                                </div>
                                <!--// Single Widget -->


                                 <!-- Single Widget -->
                                <!-- <div class="single-widget widget-categories">
                                    <h5 class="widget-title">Subcategories</h5>
                                    <ul>
                                       <?php if($subcategories){ foreach($subcategories as $row){ ?>
                                        <li><a href="<?= base_url('products').'?subctgry='.$row['id'] ?>"><?php echo $row['category_name']; ?></a></li>
                                    <?php }} ?>
                                    </ul>
                                </div> -->
                                <!--// Single Widget -->


                                <!-- Single Widget -->
                              <!--   <div class="single-widget widget-pricefilter">
                                    <h5 class="widget-title">Filter by Price</h5>
                                    <div class="widget-pricefilter-inner">
                                        <div class="tm-rangeslider" data-range_min="0" data-range_max="800"
                                            data-cur_min="200" data-cur_max="550">
                                            <div class="tm-rangeslider-bar nst-animating"></div>
                                            <span class="tm-rangeslider-leftgrip nst-animating" tabindex="0"></span>
                                            <span class="tm-rangeslider-rightgrip nst-animating" tabindex="0"></span>
                                        </div>
                                        <div class="widget-pricefilter-actions">
                                            <p class="widget-pricefilter-price">Price: $<span class="tm-rangeslider-leftlabel">308</span>
                                                - $<span class="tm-rangeslider-rightlabel">798</span></p>
                                            <button class="widget-pricefilter-button">Filter</button>
                                        </div>
                                    </div>
                                </div> -->
                                <!--// Single Widget -->

                                <!-- Single Widget -->
                                <!-- <div class="single-widget widget-popularproduct">
                                    <h5 class="widget-title">Popular Product</h5>
                                    <ul>
                                        <?php $i=1;if($products){ foreach($products as $pro){ if($i<4){ ?>
                                        <li>
                                            <a href="#" class="widget-popularproduct-image">
                                                <img src="<?php echo base_url();?>photo/products/<?php echo $pro['product_image']; ?>" alt="product thumbnail">
                                            </a>
                                            <div class="widget-popularproduct-content">
                                                <h6><a href="#"><?php echo $pro['product_name']; ?></a></h6>
                                                <span>$<?php echo $pro['sale_price']; ?></span>
                                            </div>
                                        </li>
                                    <?php }$i++;}} ?> -->
                                      <!--   <li>
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
                                        </li> -->
                                    <!-- </ul>
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

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--// Shop Page Area -->

        </main>
        <!--// Main Content -->

<style type="text/css">
    .widget-categories ol{
        display: none
    }
</style>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
$('.menu-toggle').click(function(e) {
 e.preventDefault();
$(this).closest("li").find("[class^='ul_submenu']").slideToggle();
});
</script>