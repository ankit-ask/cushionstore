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
                        <h4 class="page-title">E-Mail Templates</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin_home.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">E-Mail Templates</li>
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
                                
                                <div align="right">
                                    <button type="button" id="add_email_template_button" data-toggle="modal" data-target="#add_mail_template_modal" class="btn btn-info btn-lg jsr-btn-add">Add</button>
                                </div>
                                <div class="table-responsive">
                                    <table id="mail_template_table" class="table table-striped table-bordered" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>Template Id</th>
                                                <th>Category</th>
                                                <th>Template Name</th>
                                                <th>E-Mail Subject</th>
                                                <th>Content</th>
                                                <th data-column-id="commands" data-formatter="commands" data-sortable="false" id="commands-th">Commands</th>
                                            </tr>
                                        </thead>
										<thead>
											<tr>
											<td></td>
											<td>
												<input type="text" id="categorySearch"  class="search-input-text" placeholder="Search by Category">												
											</td>
                                            <td>
												<input type="text" id="templateSearch"  class="search-input-text" placeholder="Search by Template">												
											</td>
											</tr>
										</thead>
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
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- Modals -->
    <?php $this->view('Components/Modals/add-email-template.php')?>

    <!-- Include Scripts Files -->
    <?php $this->view('Assets/include_script.php')?>
    <script src="<?php echo base_url(); ?>assets/custom/js/mail-template-service.js"></script>

<script type="text/javascript">

$(document).ready(function(){

    init('mail_template_table',GET_MAIL_TEMPLATE_API);

});

</script>
</body>