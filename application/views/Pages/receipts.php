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
                        <h4 class="page-title">Receipts</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin_home.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Receipts</li>
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
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="receipts_grid" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <!-- <th data-column-id="id">Id</th> -->
                                                <th data-column-id="receipt_num">Receipt No.</th>
                                                <th data-column-id="lead_fk">Lead ID</th>
                                                <th data-column-id="name">Lead Name</th>
                                                <!-- <th data-column-id="acc_fk">Account ID</th> -->
                                                <th data-column-id="service_name">Service</th>
                                                <th data-column-id="package">Package</th>
                                                <th data-column-id="package_amt">Package Amount</th>
                                                <th data-column-id="receiving_amt">Receipt Amount</th>
                                                <th data-column-id="discount">Discount</th>
                                                <th data-column-id="payment_date">Payment Date</th>
                                                <th data-column-id="payment_mode">Payment Mode</th>
                                                <th data-column-id="payment_acc">Payment Account</th>
                                                <th data-column-id="payment_acc">Reference No.</th>
                                                <th data-column-id="remark">Remark.</th>
                                                <th data-column-id="status">Status</th>
                                                <th data-column-id="receipt_used">Receipt Used?</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- Modals -->

    <!-- Include Scripts Files -->
    <?php $this->view('Assets/include_script.php')?>

</body>