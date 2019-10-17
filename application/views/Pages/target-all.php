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
                        <h4 class="page-title">Target Management</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin_home.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Target Management</li>
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
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <div align="right">
                                    <button type="button" id="add_button" data-toggle="modal" data-target="#add_target_modal" class="btn btn-info btn-lg jsr-btn-add">Add Target</button>
                                </div>
                                <div class="table-responsive">
                                    <table id="target_all_table" class="table table-striped table-bordered" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>Employee Name</th>
                                                <th>Employee ID</th>
                                                <th>Target Assigned</th>
                                                <th>Assigned By</th>
                                                <th>Target for Month</th>
                                                <th>Target Achieved (%)</th>
                                                <th>Achieved Sales</th>
                                                <th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
                                            </tr>
                                        </thead>
                                        <thead>
											<tr>
											<td>
                                                <input type="text" id="nameSearch"  class="search-input-text" placeholder="Search by Employee name">
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <input type="text" id="assignedBySearch"  class="search-input-text" placeholder="Search by Assigned By Name">
                                            </td>
											<td>
                                                <input type="text" id="monthSearch"  class="search-input-text" placeholder="Search by Month">									
											</td>
                                            <td></td>
                                            <td></td>
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
    <?php $this->view('Components/Modals/add-target.php') ?>

    <!-- Include Scripts Files -->
    <?php $this->view('Assets/include_script.php')?>
    <script src="<?php echo base_url(); ?>assets/custom/js/target-service.js"></script>

<script type="text/javascript">
$(document).ready(function(){	
	init('target_all_table', GET_TARGET_API);
});
</script>

</body>