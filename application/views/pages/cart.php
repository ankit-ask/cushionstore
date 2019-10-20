<?php $this->view('Components/header.php') ?>

<section class="cart-section">

    <div class="col-lg-12 cart-section-wrapper">

        <div class="cart-section-heading">
            <p>
                ITEMS IN YOUR CART
            </p>
        </div>

        <div class="col-lg-12 cart-item-wrapper">

            <div class="col-lg-6 item-details float-left">
                <p class="item-heading">Custom Seat Cushion - Square Corners</p>
                <div class="col-lg-6 item-details-inner float-left">
                    <p class="cart-qty-wrapper">
                        <div class="float-left cart-qty-label">
                            <span>QUANTITY</span>
                        </div>
                        <div class="cart-qty-wrapper-inner">
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
                        </div>
                        <div class="clearfix"></div>
                    </p>

                    <p><span>UNTI PRICE</span><span>$12.34</span></p>
                    <p><span>ITEM TOTAL</span><span>$24.68</span></p>
                </div>
                <div class="col-lg-6 item-details-img float-left">
                    <img src="<?php echo base_url('assets/images/products/product-img-1.png')?>">
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="col-lg-6 item-extra-details float-left">
                <div class="col-md-12">
                    <button class="btn btn-success remove-item-btn">
                        <i class="fas fa-trash"></i> REMOVE
                    </button>
                </div>
                <div class="col-md-12 item-extra-details-inner">
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

            <div class="clearfix"></div>

        </div>

        <div class="col-lg-12 cart-bottom">
            <div class="cart-total-etails col-lg-12">
                <p>
                    <span>MERCHANDISE</span><span>$24.68</span>
                    <div class="clearfix"></div>
                    <hr>
                </p>
                <p>
                    <span>ESTIMATED SHIPPING</span><span>$24.68</span>
                    <div class="clearfix"></div>
                    <hr>
                </p>
                <p>
                    <span>ESTIMATED TOTAL</span><span>$49.36</span>
                    <div class="clearfix"></div>
                    <hr>
                </p>
                
            </div>
            <button class="btn btn-success tech-dark-btn">
                <i class="fas fa-percentage"></i> APPLY PROMO CODE
            </button>
            <button class="btn btn-success tech-dark-btn">
                CHECKOUT <i class="fas fa-angle-right"></i>
            </button>
        </div>

    </div>

</section>

<?php $this->view('Assets/include_script.php') ?>

<?php $this->view('Components/footer.php') ?>