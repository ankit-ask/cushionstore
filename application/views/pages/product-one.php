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
                    <button class="btn">
                        -
                    </button>
                </span>
                <span>
                    <input value="1">
                </span>
                <span>
                    <button class="btn">
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
            <div id="shape" class="tab-pane fade in active show">
                <div class="tab-pane-main">
                    <div class="col-lg-4 panel-details">
                        <p class="panel-details-heading">SELECT YOUR CUSHION SHAPE</p>
                        <p class="panel-details-text">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                    </div>
                    <div class="col-lg-8 panel-customization">

                    </div>   
                    <div class="clearfix"></div>

                    
                </div>
                <div class="col-lg-12 stepper-tab-btn-wrapper">
                    <button class="btn btn-success stepper-tab-dir-btn stepper-previous-btn">
                        <i class="fas fa-angle-left"></i> PREVIOUS STEP
                    </button>
                    <button class="btn btn-success stepper-tab-dir-btn stepper-next-btn">
                        NEXT STEP <i class="fas fa-angle-right"></i>
                    </button>
                </div>
            </div>
            <div id="style" class="tab-pane fade show">
                <h3>STYLE</h3>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div id="dimensions" class="tab-pane fade show">
                <h3>DIMENSIONS</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
            </div>
            <div id="cover" class="tab-pane fade show">
                <h3>COVER</h3>
                <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
            </div>
            <div id="fill" class="tab-pane fade show">
                <h3>FILL</h3>
                <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
            </div>
            <div id="ties" class="tab-pane fade show">
                <h3>TIES</h3>
                <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
            </div>
            <div id="confirm" class="tab-pane fade show">
                <h3>CONFIRM</h3>
                <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
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

<?php $this->view('Components/footer.php') ?>