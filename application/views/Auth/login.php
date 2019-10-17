<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $this->view('Components/basic-init.php') ?>

<body>
    <div class="main-wrapper">

        <?php $this->view('Components/preloader.php') ?>
        
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="auth-box bg-dark border-top border-secondary">
                <div id="loginform">
                    <div class="text-center p-t-20 p-b-20">
                        <span class="db"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="logo" /></span>
                    </div>
                    <br>
                    <!-- Form -->
                    <form id="login_form" class="form-horizontal m-t-20" id="loginform" action="index.html">
                        <div class="row p-b-30">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" id="username" class="form-control form-control-lg" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required="" name="username">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-lock"></i></span>
                                    </div>
                                    <input type="password" id="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required="" name="password">
                                </div>
                                <div class="input-group mb-3" id="otp_div">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-mobile"></i></span>
                                    </div>
                                    <input type="number_otp" id="number_otp" class="form-control form-control-lg" placeholder="Otp Here" aria-label="Password" aria-describedby="basic-addon1" required="" name="password">
                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">
                                        <button id="login_submit" onclick="doLogin()" class="btn btn-success float-left" type="button">Login</button>
                                        <button id="btn_otp" class="btn btn-success float-left" type="button" onclick="return FetchOTP()">Submit OTP</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <?php $this->view('Assets/include_script.php')?>
	
	<script src="<?php echo base_url(); ?>assets/custom/js/login.js"></script>
    <script>
        $(document).ready(function(){ 
            $('#otp_div').hide();
			$('#btn_otp').hide();
			
			if(getFromStorage(EMPLOYEE_ID) != undefined && getFromStorage(EMPLOYEE_ID) != '' ){
				window.location.replace(DASHBOARD_URL);
			}
        });

    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    $('#to-login').click(function(){
        
        $("#recoverform").hide();
        $("#loginform").fadeIn();
    }); 
    </script>

</body>
</html>
