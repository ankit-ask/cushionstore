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
                        <h4 class="page-title">Announcements</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin_home.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Announcements</li>
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
                            <div class="card-body" id="refresh_div" >
                                
                                <div align="right">
                                    <button type="button" id="add_announcements_button" data-toggle="modal" data-target="#edit_model" class="btn btn-info btn-lg jsr-btn-add"><i class="m-r-5 fa far fa-envelope" aria-hidden="true"></i> Add New</button>
                                    <button type="button" id="delete_announcements_button" onclick="ClearAnnouncements()"  class="btn btn-danger btn-lg jsr-btn-add"><i class="m-r-5 fa far fa-trash" aria-hidden="true"></i> Delete All</button>
                                </div>
                                <!-- Announcement Section Begin -->

                                    <!-- Here... -->
                            
                                <!-- Announcement Section End -->       
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
    <?php $this->view('Components/Modals/add-announcement.php') ?>

    <!-- Include Scripts Files -->
    <?php $this->view('Assets/include_script.php')?>

<script>
//======================== For select 2 ========================//
$(".select2").select2();

$(document).ready(function(){

    if (userType != undefined) {
        console.log(userType);

        if (userType === 'ADMIN') {
            $("#delete_announcements_button").show();
        } else {
            $("#delete_announcements_button").hide();
        }

        if (userType === 'ADMIN' || userType === 'DSH') {
            $("#add_announcements_button").show();
        } else {
            $("#add_announcements_button").hide();
        }
        
    } else {
        console.log("No userType Found");
    }
});
</script>
</body>