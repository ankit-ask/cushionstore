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
                        <h4 class="page-title">Active Free Trials</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Active Free Trials</li>
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
                                    <table id="freetrials_active_table" class="table table-striped table-bordered" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th data-column-id="no">S.No.</th>
                                                <th data-column-id="lead_fk">Lead ID</th>
                                                <th data-column-id="name">Lead Name</th>
                                                <th data-column-id="service_name">Service Name</th>
                                                <th data-column-id="start_date">Start Date</th>
                                                <th data-column-id="end_date">End Date</th>
                                                <th data-column-id="days">Days</th>
                                                <th data-column-id="booked_by">Booked By</th>
                                            </tr>
                                        </thead>
                                        <thead>
											<tr>
											<td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <input type="text" id="nameSearch"  class="search-input-text" placeholder="Search by Employee name">
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <input type="text" id="bookedBySearch"  class="search-input-text" placeholder="Search by Assigned By Name">
                                            </td>
											</tr>
										</thead>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- Modals -->

    <!-- Include Scripts Files -->
    <?php $this->view('Assets/include_script.php')?>
    <script src="<?php echo base_url(); ?>assets/custom/js/free-trials-service.js"></script>

<script type="text/javascript">

$(document).ready(function(){	
	init('freetrials_active_table', GET_FREETRIAL_ACTIVE_API);
});

</script>
</body>