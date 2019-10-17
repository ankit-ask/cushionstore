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
                        <h4 class="page-title">Internal Communication - Messages</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin_home.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Internal Communication</li>
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
                            <div class="card-body" id="refresh_count">
                                
                                <div align="right">
                                    <button type="button" id="add_button" data-toggle="modal" data-target="#edit_model" class="btn btn-info btn-lg jsr-btn-add"><i class="m-r-5 fa far fa-envelope" aria-hidden="true"></i> New Message</button>
                                    <button type="button" id="delete_button" onclick="DeleteMessage()"  class="btn btn-danger btn-lg jsr-btn-add"><i class="m-r-5 fa far fa-trash" aria-hidden="true"></i> Delete All</button>
                                </div>

                                <ul class="nav nav-tabs" role="tablist">

                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#sent_tab" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">SENT (--)</span></a> </li>

                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#received_tab" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">INBOX (--)</span></a> </li>

                                </ul>
                                <br>


                                <!-- Message Section Begin -->

                                <!-- Tab panes begin -->

                                <div class="tab-content tabcontent-border" id="refresh_div">
                                    <!-- Sent Mail Tab Begin -->
                                    <div class="tab-pane active" id="sent_tab" role="tabpanel">


                                <!-- accoridan part -->
                                <div class="accordion" id="accordion1">
                 
                                    PHP Section
                                </div>

                            </div>
                            <!-- Sent Mail Tab End -->

                            <!-- Received Mail Tab Begin -->
                            <div class="tab-pane" id="received_tab" role="tabpanel">


                                <!-- accoridan part -->
                                <div class="accordion" id="accordion2">
                                

                                    PHP Section
                                </div>

                            </div>
                            <!-- Received Mail Tab End -->

                        </div>

                                <!-- Message Section End -->
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
    <?php $this->view('Components/Modals/add-communication-sms.php')?>

    <!-- Include Scripts Files -->
    <?php $this->view('Assets/include_script.php')?>

<script>
//================== For select 2 ==================//
$(".select2").select2();
</script>

</body>