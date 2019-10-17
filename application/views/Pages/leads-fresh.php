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
                        <h4 class="page-title">Fresh Leads</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item active" aria-current="page">Leads</li>
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

			<!-- CustomFilter Wrapper Begins -->
            <div class="custom-filter-wrapper">
                <div class="row">
                <h4>Creation Date Filter</h4>
                    <div class="input-daterange" id="daterange">
                        <div class="col-md-4" style="display: inline-block">
                            <input type="text" name="creationStartDate" id="creationStartDate" class="form-control" style="width:120px;" placeholder="Start Date" autocomplete="off"/>
                        </div>
                        <div class="col-md-4" style="display: inline-block">
                            <input type="text" name="creationEndDate" id="creationEndDate" class="form-control" style="width:120px;" placeholder="End Date" autocomplete="off"/>
                        </div>      
                    </div>
                </div>

                <div class="row">
                <h4>Last Call Time Filter</h4>
                    <div class="input-daterange" id="datetimerange">
                        <div class="col-md-4" style="display: inline-block">
                            <input type="text" name="lastCallStartTime" id="lastCallStartTime" class="form-control" style="width:120px;" placeholder="Start Date" autocomplete="off"/>
                        </div>
                        <div class="col-md-4" style="display: inline-block">
                            <input type="text" name="lastCallEndTime" id="lastCallEndTime" class="form-control" style="width:120px;" placeholder="End Date" autocomplete="off"/>
                        </div>      
                    </div>
                    <div class="col-md-4">
                        <input type="button" name="search" id="search" value="Search" class="btn btn-info" />
                        <input type="button" name="reset" id="reset" value="Reset" class="btn btn-warning" />
                    </div>
                </div>
            </div> 
            <!-- CustomFilter Wrapper Ends -->

                <div class="row">

                    <!-- column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">  
                                <div align="right">

                                    <button type="button" id="assign_leads_button"  class="btn btn-info btn-md jsr-btn-add">Assign Leads</button>
                                </div>
                                <div class="table-responsive">
                                    <table id="lead_fresh_table" class="table table-striped table-bordered" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <!-- <th data-column-id="id"  data-identifier="true" data-type="text">Id</th> -->
                                                <th> <input type="checkbox" id="mass_select_all" data-to-table="tasks"> </th>
												<th>Lead Id</th>
                                                <th>Lead Type</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Alternate Mobile</th>
                                                <th>Segment</th>
                                                <th>Investment</th>
                                                <th>Last Call Status</th>
                                                <th>Last Call Time</th>
                                                <th>Email</th>
                                                <th>Country</th>
                                                <th>State</th>
                                                <th>City</th>
                                                <th>Address</th>
                                                <th>Pan No.</th>
                                                <th>Aadhar No.</th>
                                                <th>Date of Birth</th>
                                                <th>Status</th>
                                                <th>Assigned To</th>
                                                <th>Creation Date</th>
                                                <th>Assigning Date</th>
                                                <th>Lead Added By (ID)</th>
                                                <th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
                                            </tr>
                                        </thead>
										<thead>
											<tr>
												<td></td>
												<td></td>
												<td>
													<input type="text" id="leadTypeSearch"  class="search-input-text" placeholder="Search by lead type">												
												</td>
												<td>
													<input type="text" id="nameSearch"  class="search-input-text" placeholder="Search by name">												
												</td>
												<td>
													<input type="text" id="mobileSearch"  class="search-input-text" placeholder="Search by mobile">												
												</td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td>
													<input type="text" id="stateSearch"  class="search-input-text" placeholder="Search by state">												
												</td>
												<td>
													<input type="text" id="citySearch"  class="search-input-text" placeholder="Search by city">												
												</td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td>
													<input type="text" id="leadStatusSearch"  class="search-input-text" placeholder="Search by lead status">												
												</td>
												<td>
													<input type="text" id="assignedToSearch"  class="search-input-text" placeholder="Search by assigned to name">												
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
    <?php $this->view('Components/Modals/add-lead.php') ?>
    <?php $this->view('Components/Modals/assign-leads.php') ?>
    <?php $this->view('Components/Modals/send-sms.php') ?>
    <?php $this->view('Components/Modals/add-call-description.php') ?>
    <?php $this->view('Components/Modals/leads-view-action.php') ?>


    <!-- Include Scripts Files -->
    <?php $this->view('Assets/include_script.php')?>

	<script src="<?php echo base_url(); ?>assets/custom/js/lead-service.js"></script>

<script type="text/javascript">

$(document).ready(function(){	
	init('lead_fresh_table',GET_FRESH_LEADS_API,'');
});

</script>

</body>
