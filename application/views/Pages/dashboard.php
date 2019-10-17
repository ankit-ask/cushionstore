<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $this->view('Components/basic-init.php') ?>

<body>
    <?php $this->view('Components/preloader.php') ?>

    <!-- Main wrapper - style you can find in pages.scss -->
    <div id="main-wrapper">
        
        <?php $this->view('Components/header.php') ?>
        
        <?php $this->view('Components/sidebar.php') ?>

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3" id="dashborad_approval_tab">
                        <div class="card card-hover">
                            <a href="/viewFT/approvals.php">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                                <h6 class="text-white">Approvals
                                    (NA)
                                </h6>
                            </div>
                            </a>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <a href="/viewFT/notifications.php">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-arrow-all"></i></h1>
                                <h6 class="text-white">Notifications
                                (NA)
                                </h6>
                            </div>
                            </a>
                        </div>
                    </div>
                     <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3" id="dashborad_download_formats_tab">
                        <div class="card card-hover">
                            <a href="/formats.php" target="_blank">
                                <div class="box bg-warning text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-receipt"></i></h1>
                                    <h6 class="text-white">Download Formats</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <a href="/viewFT/receipts_list.php">
                                <div class="box bg-danger text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>
                                    <h6 class="text-white">Announcements</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3" id="dashborad_targets_tab">
                        <div class="card card-hover">
                            <a href="/viewFT/salesorder_list.php">
                                <div class="box bg-info text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                                    <h6 class="text-white">Targets</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <a href="/viewFT/approvals.php">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                                <h6 class="text-white">CRM Reports
                                    (NA)
                                </h6>
                            </div>
                            </a>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Site Analysis</h4>
                                        <!-- <h5 class="card-subtitle">Overview of Latest Month</h5> -->
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- column -->
                                    <!-- <div class="col-lg-9">
                                        <div class="flot-chart">
                                            <div class="flot-chart-content" id="flot-line-chart"></div>
                                        </div>
                                    </div> -->
                                    <div class="col-lg-12">
                                        <div class="row">

                                            <div class="col-3 dashboard-pill">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-user m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5" id='count_total_leads'>-</h5>
                                                   <small class="font-light">Total Leads</small>
                                                </div>
                                            </div>

                                            <div class="col-3 dashboard-pill">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-user m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5" id='count_aone_leads'>-</h5>
                                                   <small class="font-light">Total A-ONE Leads</small>
                                                </div>
                                            </div>

                                            <div class="col-3 dashboard-pill">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-user m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5" id='count_smo_leads'>-</h5>
                                                   <small class="font-light">Total SMO Leads</small>
                                                </div>
                                            </div>

                                            <div class="col-3 dashboard-pill">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-user m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5" id='count_web_leads'>-</h5>
                                                   <small class="font-light">Total WEB Leads</small>
                                                </div>
                                            </div>

                                             <div class="col-3 dashboard-pill">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-plus m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5" id='count_active_employees'>-</h5>
                                                   <small class="font-light">Active Employees</small>
                                                </div>
                                            </div>

                                            <div class="col-3 dashboard-pill m-t-15">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-cart-plus m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5" id='count_contact_accounts'>-</h5>
                                                   <small class="font-light">Total Accounts</small>
                                                </div>
                                            </div>

                                             <div class="col-3 dashboard-pill m-t-15">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-tag m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5" id='count_sales_order'>-</h5>
                                                   <small class="font-light">Total Orders</small>
                                                </div>
                                            </div>

                                            <div class="col-3 dashboard-pill m-t-15">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-table m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5" id='count_free_trials'>-</h5>
                                                   <small class="font-light">Active Free Trials</small>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- column -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            
            <?php $this->view('Components/footer.php') ?>

        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- Include Scripts Files -->

    <style>
    .dashboard-pill{
        padding: 10px;
    }
    .dashboard-pill div{
        padding: 20px;
    }
    </style>

    <?php $this->view('Assets/include_script.php')?>
    <script src="<?php echo base_url(); ?>assets/custom/js/dashboard-data-service.js"></script>
	

<script>
$(document).ready(function(){
    init();
});
</script>

</body>
