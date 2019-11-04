<?php $this->view('Components/header.php') ?>

<section class="tech-container">

    <div class="product-section-header">
        <div class="col-lg-6 product-name">
            <p>CUSTOM SEAT CUSHIONS</p>
        </div>
        <div class="col-lg-2 product-price">
            <p>$123.45</p>
        </div>
        <div class="col-lg-2 product-qty-wrapper">
            <p>
                <span>
                    <button class="btnsub">
                        -
                    </button>
                </span>
                <span class="product-qty">
                    <input type="text" value="1">
                </span>
                <span>
                    <button class="btnadd">
                        +
                    </button>
                </span>
            </p>
        </div>
        <div class="col-lg-2 product-add-to-cart">
            <button class="btn btn-success add-to-cart-btn">
                <i class="fab fa-opencart"></i>ADD TO CART
            </button>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="stepper-wrapper">
        <ul class="nav nav-pills nav-justified stepper-nav">
            <li class="active"><a data-toggle="pill" href="#shape">SHAPE</a></li>
            <li><a data-toggle="pill" href="#style">STYLE</a></li>
            <li><a data-toggle="pill" href="#dimensions">DIMENSIONS</a></li>
            <li><a data-toggle="pill" href="#cover">COVER</a></li>
            <li><a data-toggle="pill" href="#fill">FILL</a></li>
            <li><a data-toggle="pill" href="#ties">TIES</a></li>
            <li><a data-toggle="pill" href="#confirm">CONFIRM</a></li>
        </ul>
    
        <div class="tab-content">
            <!-- Step 1 -->
            <div id="shape" class="tab-pane fade in active show">
                <div class="tab-pane-main">
                    <div class="col-lg-4 panel-details">
                        <p class="panel-details-heading">SELECT YOUR CUSHION SHAPE</p>
                        <p class="panel-details-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                        <img id="imageShapeReview" src="<?php echo base_url('assets/images/stepper/product-one/shapes/product-1-A.png')?>">
                        <button class="btn product-preview-btn">
                            PRODUCT PREVIEW
                        </button>
                    </div>
                    <div class="col-lg-8 panel-customization">
                        <div class="col-md-4 shape-radio-wrapper">
                            <img src="<?php echo base_url('assets/images/stepper/product-one/seat-selet-square.png')?>">
                            <br>
                            <label><input type="radio" name="shape_radio" checked value="1">Square Corners</label>
                        </div>
                        <div class="col-md-4 shape-radio-wrapper">
                            <img src="<?php echo base_url('assets/images/stepper/product-one/top-rounded-corners.png')?>">
                            <br>
                            <label><input type="radio" name="shape_radio" value="2">Rounded Back Corners</label>
                        </div>
                        <div class="col-md-4 shape-radio-wrapper">
                            <img src="<?php echo base_url('assets/images/stepper/product-one/all-rounded-corners.png')?>">
                            <br>
                            <label><input type="radio" name="shape_radio" value="3">All Corners Rounded</label>
                        </div>
                        <div class="col-md-4 shape-radio-wrapper">
                            <img src="<?php echo base_url('assets/images/stepper/product-one/rounded-back.png')?>">
                            <br>
                            <label><input type="radio" name="shape_radio" value="4">Rounded Back</label>
                        </div>
                        <div class="col-md-4 shape-radio-wrapper">
                            <img src="<?php echo base_url('assets/images/stepper/product-one/rounded.png')?>">
                            <br>
                            <label><input type="radio" name="shape_radio" value="5">Round</label>
                        </div>
                        <div class="col-md-4 shape-radio-wrapper">
                            <img src="<?php echo base_url('assets/images/stepper/product-one/trapezoidal.png')?>">
                            <br>
                            <label><input type="radio" name="shape_radio" value="6">Trapezoid</label>
                        </div>
                    </div>   
                    <div class="clearfix"></div>
                    
                </div>
                <div class="col-lg-12 stepper-tab-btn-wrapper">
                    <!-- <button id="previousbtn" class="btn btn-success stepper-tab-dir-btn stepper-previous-btn previousbtn">
                        <i class="fas fa-angle-left"></i> PREVIOUS STEP
                    </button> -->
                    <button id="nextbtn" class="btn btn-success stepper-tab-dir-btn stepper-next-btn nextbtn">
                        NEXT STEP <i class="fas fa-angle-right"></i>
                    </button>
                </div>
            </div>

            <!-- Step 2 -->
            <div id="style" class="tab-pane fade show">
                <div class="tab-pane-main">
                    <div class="col-lg-4 panel-details">
                        <p class="panel-details-heading">SELECT THE STYLE OF YOUR CUSHION</p>
                        <p class="panel-details-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                        <img src="<?php echo base_url('assets/images/products/product-img-1.png')?>">
                        <button class="btn product-preview-btn">
                            PRODUCT PREVIEW
                        </button>
                    </div>
                    <div class="col-lg-8 panel-customization">
                        <div class="col-md-6 style-radio-wrapper">
                            <img src="<?php echo base_url('assets/images/stepper/product-one/structure/waterfall-edge.png')?>">
                            <br>
                            <label><input type="radio" name="style_radio" checked value="1">Waterfall Edge</label>
                        </div>
                        <div class="col-md-6 style-radio-wrapper">
                            <img src="<?php echo base_url('assets/images/stepper/product-one/structure/boxed-edge.png')?>">
                            <br>
                            <label><input type="radio" name="style_radio" value="2">Boxed Edge</label>
                        </div>
                    </div>   
                    <div class="clearfix"></div>
                    
                </div>
                <div class="col-lg-12 stepper-tab-btn-wrapper">
                    <button id="previousbtn" class="btn btn-success stepper-tab-dir-btn stepper-previous-btn previousbtn">
                        <i class="fas fa-angle-left"></i> PREVIOUS STEP
                    </button>
                    <button id="nextbtn" class="btn btn-success stepper-tab-dir-btn stepper-next-btn nextbtn">
                        NEXT STEP <i class="fas fa-angle-right"></i>
                    </button>
                </div>
            </div>

            <!-- Step 3 -->
            <div id="dimensions" class="tab-pane fade show">
                <div class="tab-pane-main">
                    <div class="col-lg-4 panel-details">
                        <p class="panel-details-heading">ADJUST YOUR CUSHION DIMENSIONS</p>
                        <p class="panel-details-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                        <img src="<?php echo base_url('assets/images/products/product-img-1.png')?>">
                        <button class="btn product-preview-btn">
                            PRODUCT PREVIEW
                        </button>
                    </div>
                    <div class="col-lg-8 panel-customization">
                        <div class="col-md-12 dimension-preview">
                            <p>Dimensions Image Goes Here</p>
                        </div>
                        <div class="col-md-12 dimension-select-wrapper">
                            <p>CUSTOMIZE AS PER YOUR REQUIREMENT</p>
                            <select class="form-control" id="thickness">
                                <option>1 INCH IN THICKNESS</option>
                                <option>2 INCH IN THICKNESS</option>
                                <option>3 INCH IN THICKNESS</option>
                                <option>4 INCH IN THICKNESS</option>
                            </select>

                            <select class="form-control" id="depth">
                                <option>1 INCH IN DEPTH</option>
                                <option>2 INCH IN DEPTH</option>
                                <option>3 INCH IN DEPTH</option>
                                <option>4 INCH IN DEPTH</option>
                            </select>

                            <select class="form-control" id="width">
                                <option>1 INCH IN WIDTH</option>
                                <option>2 INCH IN WIDTH</option>
                                <option>3 INCH IN WIDTH</option>
                                <option>4 INCH IN WIDTH</option>
                            </select>
                        </div>
                    </div>   
                    <div class="clearfix"></div>

                    
                </div>
                <div class="col-lg-12 stepper-tab-btn-wrapper">
                    <button id="previousbtn" class="btn btn-success stepper-tab-dir-btn stepper-previous-btn previousbtn">
                        <i class="fas fa-angle-left"></i> PREVIOUS STEP
                    </button>
                    <button id="nextbtn" class="btn btn-success stepper-tab-dir-btn stepper-next-btn nextbtn">
                        NEXT STEP <i class="fas fa-angle-right"></i>
                    </button>
                </div>
            </div>

            <!-- Step 4 -->
            <div id="cover" class="tab-pane fade show">
                <div class="tab-pane-main">
                    <div class="col-lg-4 panel-details">
                        <p class="panel-details-heading">CHOOSE FABRCIS FOR YOUR CUSHION</p>
                        <p class="panel-details-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                        <img src="<?php echo base_url('assets/images/products/product-img-1.png')?>">
                        <button class="btn product-preview-btn">
                            PRODUCT PREVIEW
                        </button>
                    </div>
                    <div class="col-lg-8 panel-customization">
                        <div class="col-md-12 dimension-preview">
                            <div class="col-md-6 fabric-sample-img">
                                <p>Fabric Details</p>
                            </div>
                            <div class="col-md-6 fabric-sample-img">
                                <p>Trimming Details</p>
                            </div>
                        </div>
                        <div class="col-md-12 dimension-select-wrapper">
                            <select class="form-control" id="thickness">
                                <option>WITH TRIMMING</option>
                                <option>NO TRIMMING</option>
                            </select>

                            <button class="btn btn-success fabric-select-btn">
                                <i class="fas fa-angle-right"></i> SELECT CUSHION FABRIC
                            </button>

                            <button class="btn btn-success fabric-select-btn">
                                <i class="fas fa-angle-right"></i> SELECT TRIMMING
                            </button>

                        </div>
                    </div>   
                    <div class="clearfix"></div>

                    
                </div>
                <div class="col-lg-12 stepper-tab-btn-wrapper">
                    <button id="previousbtn" class="btn btn-success stepper-tab-dir-btn stepper-previous-btn previousbtn">
                        <i class="fas fa-angle-left"></i> PREVIOUS STEP
                    </button>
                    <button id="nextbtn" class="btn btn-success stepper-tab-dir-btn stepper-next-btn nextbtn">
                        NEXT STEP <i class="fas fa-angle-right"></i>
                    </button>
                </div>
            </div>

            <!-- Step 5 -->
            <div id="fill" class="tab-pane fade show">
                <div class="tab-pane-main">
                    <div class="col-lg-4 panel-details">
                        <p class="panel-details-heading">CHOOSE FILLING MATERIAL</p>
                        <p class="panel-details-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                        <img src="<?php echo base_url('assets/images/products/product-img-1.png')?>">
                        <button class="btn product-preview-btn">
                            PRODUCT PREVIEW
                        </button>
                    </div>
                    <div class="col-lg-8 panel-customization">
                        <div class="col-md-4 fill-wrapper">
                            <div>
                                <img src="<?php echo base_url('assets/images/stepper/fill/polyster-fiber.jpg')?>">
                            </div>
                            <br>
                            <label><input type="radio" name="fill_radio" checked value="1">Polyster Fiber</label>
                        </div>
                        <div class="col-md-4 fill-wrapper">
                            <div>
                                <img src="<?php echo base_url('assets/images/stepper/fill/polyurethane-foam.jpg')?>">
                            </div>
                            <br>
                            <label><input type="radio" name="fill_radio" value="2">Polyurethane Foam</label>
                        </div>
                        <div class="col-md-4 fill-wrapper">
                            <div>
                                <img src="<?php echo base_url('assets/images/stepper/fill/reticulated-dry-fast-foam.jpg')?>">
                            </div>
                            <br>
                            <label><input type="radio" name="fill_radio" value="3">Reticulated Dry Fast Foam</label>
                        </div>
                    </div>   
                    <div class="clearfix"></div>

                    
                </div>
                <div class="col-lg-12 stepper-tab-btn-wrapper">
                    <button id="previousbtn" class="btn btn-success stepper-tab-dir-btn stepper-previous-btn previousbtn">
                        <i class="fas fa-angle-left"></i> PREVIOUS STEP
                    </button>
                    <button id="nextbtn" class="btn btn-success stepper-tab-dir-btn stepper-next-btn nextbtn">
                        NEXT STEP <i class="fas fa-angle-right"></i>
                    </button>
                </div>
            </div>

            <!-- Step 6 -->
            <div id="ties" class="tab-pane fade show">
                <div class="tab-pane-main">
                    <div class="col-lg-4 panel-details">
                        <p class="panel-details-heading">CHOOSE FASTNER TYPE</p>
                        <p class="panel-details-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                        <img src="<?php echo base_url('assets/images/products/product-img-1.png')?>">
                        <button class="btn product-preview-btn">
                            PRODUCT PREVIEW
                        </button>
                    </div>
                    <div class="col-lg-8 panel-customization">
                        <div class="col-md-4 ties-wrapper">
                            <div>
                                <img src="<?php echo base_url('assets/images/stepper/product-one/tie/square/tie-1.png')?>">
                            </div>
                            <label><input type="radio" name="ties_radio" checked value="1">Square Corners</label>
                        </div>
                        <div class="col-md-4 ties-wrapper">
                            <div>
                                <img src="<?php echo base_url('assets/images/stepper/product-one/tie/square/tie-2.png')?>">
                            </div>
                            <label><input type="radio" name="ties_radio" value="2">Rounded Back Corners</label>
                        </div>
                        <div class="col-md-4 ties-wrapper">
                            <div>
                                <img src="<?php echo base_url('assets/images/stepper/product-one/tie/square/tie-3.png')?>">
                            </div>
                            <label><input type="radio" name="ties_radio" value="3">All Corners Rounded</label>
                        </div>
                        <div class="col-md-4 ties-wrapper">
                            <div>
                                <img src="<?php echo base_url('assets/images/stepper/product-one/tie/square/tie-4.png')?>">
                            </div>
                            <label><input type="radio" name="ties_radio" value="3">Rounded Back</label>
                        </div>
                        <div class="col-md-4 ties-wrapper">
                            <div>
                                <img src="<?php echo base_url('assets/images/stepper/product-one/tie/square/tie-5.png')?>">
                            </div>
                            <label><input type="radio" name="ties_radio" value="3">Round</label>
                        </div>
                        <div class="col-md-4 ties-wrapper">
                            <div>
                                <img src="<?php echo base_url('assets/images/stepper/product-one/tie/square/tie-6.png')?>">
                            </div>
                            <label><input type="radio" name="ties_radio" value="3">Trapezoid</label>
                        </div>
                    </div>   
                    <div class="clearfix"></div>

                    
                </div>
                <div class="col-lg-12 stepper-tab-btn-wrapper">
                    <button id="previousbtn" class="btn btn-success stepper-tab-dir-btn stepper-previous-btn previousbtn">
                        <i class="fas fa-angle-left"></i> PREVIOUS STEP
                    </button>
                    <button id="nextbtn" class="btn btn-success stepper-tab-dir-btn stepper-next-btn nextbtn">
                        NEXT STEP <i class="fas fa-angle-right"></i>
                    </button>
                </div>
            </div>

            <!-- Step 7 -->
            <div id="confirm" class="tab-pane fade show">
                <div class="tab-pane-main">
                    <div class="col-lg-6 panel-details">
                        <p class="panel-details-heading">REVIEW AND ORDER</p>
                        <!-- <p class="panel-details-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p> -->
                        <img src="<?php echo base_url('assets/images/products/product-img-1.png')?>">
                        <button class="btn product-preview-btn">
                            PRODUCT PREVIEW
                        </button>
                    </div>
                    <div class="col-lg-6 panel-customization confirm-wrapper">
                        <p><span>PRODUCT</span><span>Custom Seat Cushion</span></p>
                        <p><span>SHAPE</span><span>Square Corners</span></p>
                        <p><span>STYLE</span><span>Waterfall Edge</span></p>
                        <p><span>DIMENSIONS</span><span>25W x 12L x 5T</span></p>
                        <p><span>COVER FABRIC</span><span>Antique Beige 5422-0000</span></p>
                        <p><span>TRIMMING FABRIC</span><span>Black 5408-0000</span></p>
                        <p><span>FILL</span><span>Reticulated Dry-Fast Foam</span></p>
                        <p><span>TIES</span><span>Yes</span></p>
                    </div>   
                    <div class="clearfix"></div>

                    
                </div>
                <div class="col-lg-12 stepper-tab-btn-wrapper">
                    <button id="previousbtn" class="btn btn-success stepper-tab-dir-btn stepper-previous-btn previousbtn">
                        <i class="fas fa-angle-left"></i> PREVIOUS STEP
                    </button>
                    <button id="nextbtn" class="btn btn-success stepper-tab-dir-btn stepper-next-btn">
                        CONTINUE <i class="fas fa-angle-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Product Info Section Begins -->
<section class="tech-container">

        <div class="col-lg-12 about-product-us-section">

            <div class="about-product-section-heading">
                <p>
                    ABOUT THIS PRODUCT
                </p>
            </div>

            <div class="col-lg-12 pill-outer-wrapper">
                <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>

        </div>

</section>
<!-- Product Info Section Ends -->

<!-- CTA Section Begins -->
<section class="tech-container">

        <div class="col-lg-12 cta-section">

            <div class="cta-section-heading">
                <p>
                    Got a question?
                </p>
            </div>
            <div class="section-sub-heading">
                <p>
                    We love to hear from you.
                </p>
            </div>

            <div class="col-lg-12">
                <button class="btn btn-success tech-dark-btn">
                    CONTACT US
                </button>
            </div>

        </div>

</section>
<!-- CTA Section Ends -->

<?php $this->view('Assets/include_script.php') ?>
<script src="<?php echo base_url(); ?>assets/dist/js/productone.js"></script>

<?php $this->view('Components/footer.php') ?>
