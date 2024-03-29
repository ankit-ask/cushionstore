<!-- Topbar header - style you can find in pages.scss -->
<?php $this->view('Components/basic-init.php') ?>

<header class="tech-header">
    <div class="top-header">
        <p><span><i class="fas fa-headset"></i></span><span>+12-34-56-7890</span></p>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light tech-navbar">
        <a class="navbar-brand" href="#">CUSHION</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url()?>">HOME <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                CUSTOM CUSHION
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo base_url()?>product-one">Custom Seat Pads</a>
                <a class="dropdown-item" href="<?php echo base_url()?>product-two">Custom Bench Pads</a>
                <a class="dropdown-item" href="<?php echo base_url()?>product-three-a">Custom Chair Back Pads</a>
                <a class="dropdown-item" href="<?php echo base_url()?>product-three-b">Custom Bench Back Pads</a>
                <a class="dropdown-item" href="<?php echo base_url()?>product-four">Custom Chair Cushions</a>
                <a class="dropdown-item" href="<?php echo base_url()?>product-five-a">Custom Deep Seating Chair Cushions</a>
                <a class="dropdown-item" href="<?php echo base_url()?>product-five-b">Custom Deep Seating Chaise Cushions</a>
                <a class="dropdown-item" href="<?php echo base_url()?>product-six">Custom Caise Cushions</a>
                <a class="dropdown-item" href="<?php echo base_url()?>product-seven-a">Custom Rectangle Daybed Cushions</a>
                <a class="dropdown-item" href="<?php echo base_url()?>product-seven-b">Custom Round Daybed Cushions</a>
                <a class="dropdown-item" href="<?php echo base_url()?>product-eight">Custom Ottoman Cushions</a>
                <!-- <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
                </div> -->
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">CREATE YOUR OWN</a>
            </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        </form>
        <button class="btn btn-outline-success my-2 my-sm-0">
            <!-- <i class="fas fa-shopping-cart"></i> -->
            <i class="fab fa-opencart"></i>
        </button>
        </div>
    </nav>

</header>
