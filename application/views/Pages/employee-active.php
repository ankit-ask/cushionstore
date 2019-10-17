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
                        <h4 class="page-title">Active Employees</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Employees</li>
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
                    <div class="input-daterange">
                        <div class="col-md-4" style="display: inline-block">
                        <input type="text" name="start_date" id="start_date" class="form-control" style="width:120px;" placeholder="Start Date" autocomplete="off"/>
                        </div>
                        <div class="col-md-4" style="display: inline-block">
                        <input type="text" name="end_date" id="end_date" class="form-control" style="width:120px;" placeholder="End Date" autocomplete="off"/>
                        </div>      
                    </div>
                    <div class="col-md-4">
                        <input type="button" name="search" id="search" value="Search" class="btn btn-info" />
                        <input type="button" name="reset" id="reset" value="Reset" class="btn btn-warning" />
                    </div>
                    <!-- column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <div align="right">
                                    <button type="button" id="add_emp_button" data-toggle="modal" data-target="#add_employee_modal" class="btn btn-info btn-lg jsr-btn-add">Add</button>
                                </div>
                                <div class="table-responsive">
                                    <table id="employee_table" class="table table-striped table-bordered" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>Employee Id</th>
                                                <th>Name <br></th>
                                                <th>Designation</th>
                                                <th>Access Level</th>
                                                <th>Managed By</th>
                                                <th>Managed By Emp ID</th>
                                                <th>Joining Date</th>
                                                <th>Mobile</th>
                                                <th>E-Mail</th>
                                                <th>Address</th>
                                                <th>Lead Capacity</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th data-column-id="commands" data-formatter="commands" data-sortable="false" id="commands-th">Commands</th>
                                                <!-- Give Employee Stats Button Here Itself -->
                                            </tr>
                                        </thead>
										<thead>
											<tr>
											<td></td>
											<td>
												<input type="text" id="nameSearch"  class="search-input-text" placeholder="Search by Name">												
											</td>
											<td>
												<input type="text" id="designationSearch"  class="search-input-text" placeholder="Search by Designation">												
											</td>
											<td>
												<input type="text" id="userTypeSearch"  class="search-input-text" placeholder="Search by Account Type">												
											</td>
                                            <td>
												<input type="text" id="managedBySearch"  class="search-input-text" placeholder="Search by Managed By">												
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

        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- Modals -->
    <?php $this->view('Components/Modals/add-employee.php') ?>
    <?php $this->view('Components/Modals/update-employee.php') ?>
    <?php $this->view('Components/Modals/update-employee-status.php') ?>

    <!-- Include Scripts Files -->
    <?php $this->view('Assets/include_script.php')?>

<!-- Fixed Coumn Datatable Script -->
<!-- <script src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script> -->
<script src="<?php echo base_url(); ?>assets/custom/js/employee-service.js"></script>

<script type="text/javascript">

$(document).ready(function(){

    init(EMPLOYEE_GET_ACTIVE_API);

});
/*datepicker*/

</script>

</body>
