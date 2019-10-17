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
                        <h4 class="page-title">Sales Order</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin_home.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Sales Order</li>
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
                                    <table id="salesorder_dtable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Lead ID</th>
                                                <th>Lead Name</th>
                                                <th>Service</th>
                                                <th>Package</th>
                                                <th>Package Amount</th>
                                                <th>Total Receipts Amount</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Service Days</th>
                                                <th>Remark.</th>
                                                <th>Payment Date</th>
                                                <th>Payment TimeStamp</th>
                                                <th>Payment Mode</th>
                                                <th>Payment Account</th>
                                                <th>Reference No.</th>
                                                <th>Order Status</th>
                                                <th>Booked By Id</th>
                                                <th>Booked By Name</th>
                                                <th>Admin Comment</th>
                                                <th>Commands</th>
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
    <?php $this->view('Components/Modals/edit-salesorder-response.php') ?>

    <!-- Include Scripts Files -->
    <?php $this->view('Assets/include_script.php')?>

	<script src="<?php echo base_url(); ?>assets/custom/js/salesorder-service.js"></script>

	<script>
		$(document).ready(function(){	
			init(GET_SALESORDER_PENDING_API , 'salesorder_dtable');
		});
	</script>

</body>
