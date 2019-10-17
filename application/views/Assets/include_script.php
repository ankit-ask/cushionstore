<div id="lock_modal" class="modal fade" style=" height: 100%  !important; width 100%  !important;">
    <div class="modal-dialog" style="overflow-y: initial !important;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Your crm is locked</h4>
            </div>
			<div class="modal-body" style="background:#2255A4; overflow-y: auto;">
				<center>
					<h2 style="color: #f2f2f2">Enter your personal password!</h2>
					<div class="row">
						<div class="col-md-6">
							<input type="password" id="locakPasswordText" />
						</div>
						<div class="col-md-6">
							<button type="button" onclick="lockPasswordVerify()" class="btn btn-success">Verify</button>
						</div>
					</div> 
					
				</center>
            </div>
        </div>
    </div>
</div>


<div id="crm_password_modal" class="modal fade" style=" height: 100%  !important; width 100%  !important;">
    <div class="modal-dialog" style="overflow-y: initial !important;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Your crm will get locked</h4>
            </div>
			<div class="modal-body" style="background:#2255A4; overflow-y: auto;">
				<center>
					<h2 style="color: #f2f2f2">Enter your password to lock crm</h2>
					<div class="row">
						<div class="col-md-6">
							<input type="password" id="lockCrmPasswordText" />
						</div>
						<div class="col-md-6">
							<button type="button" onclick="lockCrmPassword()" class="btn btn-success">Verify</button>
						</div>
					</div> 
					
				</center>
            </div>
        </div>
    </div>
</div>

<!-- All Jquery -->
<!-- ============================================================== -->
<script src="<?php echo base_url(); ?>assets/libs/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap tether Core JavaScript -->
<script src="<?php echo base_url(); ?>assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="<?php echo base_url(); ?>assets/custom/js/config.js"></script>
<script src="<?php echo base_url(); ?>assets/custom/js/customForm.js"></script>
<script src="<?php echo base_url(); ?>assets/custom/js/storage.js"></script>

<script src="<?php echo base_url(); ?>assets/custom/js/global.js"></script>

<!-- slimscrollbar scrollbar JavaScript -->
<script src="<?php echo base_url(); ?>assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<script src="<?php echo base_url(); ?>assets/dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="<?php echo base_url(); ?>assets/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="<?php echo base_url(); ?>assets/dist/js/custom.min.js"></script>
<!--This page JavaScript -->
<!-- Charts js Files -->
<script src="<?php echo base_url(); ?>assets/libs/flot/excanvas.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/flot/jquery.flot.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/flot/jquery.flot.pie.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/flot/jquery.flot.time.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/flot/jquery.flot.stack.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/flot/jquery.flot.crosshair.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/pages/chart/chart-page-init.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/toastr/build/toastr.min.js"></script>

<!-- <script src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script> -->

<script src="<?php echo base_url(); ?>assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
<script src="<?php echo base_url(); ?>assets/extra-libs/multicheck/jquery.multicheck.js"></script>
<script src="<?php echo base_url('assets/libs/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/extra-libs/DataTables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/extra-libs/DataTables/js/dataTables.bootstrap.min.js')?>"></script>
<script src="<?php echo base_url(); ?>assets/extra-libs/DataTables/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/toastr/build/toastr.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- <script src="<?php echo base_url(); ?>assets/dist/js/bootgrid/jquery.bootgrid.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/bootgrid/jquery.bootgrid.fa.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/bootgrid/jquery.bootgrid.fa.min.js"></script> -->

<script src="<?php echo base_url(); ?>assets/dist/js/state.js"></script>

<script src="<?php echo base_url(); ?>assets/libs/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/select2/dist/js/select2.min.js"></script>

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script>
    /****************************************
     *       Basic Table                   *
     ****************************************/
    $('#zero_config').DataTable();
</script>

<script>
$(document).ready(function(){
    userName = getFromStorage(EMPLOYEE_NAME);
    empID = getFromStorage(EMPLOYEE_ID);
    userType = getFromStorage(USER_TYPE);

    if (userType != undefined) {
        if (userType === 'ADMIN') {

            console.log("Admin");
            // $("#s-o-employees").css("display","block");
            // $("#s-i-employees-active").css("display","block");
            // $("#s-i-employees-all").css("display","block");
            
            // $("#s-i-leads-unassigned").css("display","block");
            // $("#s-i-leads-assigned").css("display","block");
            // $("#s-i-leads-follow-up").css("display","block");
            // $("#s-i-leads-fresh").css("display","block");
            // $("#s-i-leads-dnd").css("display","block");
            // $("#s-i-leads-disposed").css("display","block");
            
            // $("#s-o-reports").css("display","block");
            // $("#s-i-reports-dsh").css("display","block");
            // $("#s-i-reports-manager").css("display","block");
            // $("#s-i-reports-employee").css("display","block");
            
            // $("#s-i-target").css("display","block");
            $("#s-i-target-individual").css("display","none");
            // $("#s-i-target-all").css("display","block");
            
            // $("#s-o-free-trials").css("display","block");
            // $("#s-o-lead-accounts").css("display","block");  
            // $("#s-o-bank-accounts").css("display","block");
            // $("#s-o-sales").css("display","block");
            // $("#s-o-services").css("display","block");
            // $("#s-o-lead-description").css("display","block");
            
            // $("#s-o-email").css("display","block");
            // $("#s-i-email-category").css("display","block");

            // $("#s-o-sms").css("display","block");
            // $("#s-i-sms-category").css("display","block");

            // $("#s-o-lead-management").css("display","block");
            
        } else {
            if (userType === 'DSH') {

                console.log("DSH");
                // $("#s-o-employees").css("display","block");
                // $("#s-i-employees-active").css("display","block");
                $("#s-i-employees-all").css("display","none");

                // $("#s-i-leads-unassigned").css("display","block");
                // $("#s-i-leads-assigned").css("display","block");
                // $("#s-i-leads-follow-up").css("display","block");
                // $("#s-i-leads-fresh").css("display","block");
                // $("#s-i-leads-dnd").css("display","block");
                // $("#s-i-leads-disposed").css("display","block");

                // $("#s-o-reports").css("display","block");
                $("#s-i-reports-dsh").css("display","none");
                // $("#s-i-reports-manager").css("display","block");
                // $("#s-i-reports-employee").css("display","block");

                // $("#s-o-target").css("display","block");
                // $("#s-i-target-individual").css("display","block");
                // $("#s-i-target-all").css("display","block");

                // $("#s-o-free-trials").css("display","block");
                // $("#s-o-lead-accounts").css("display","block");
                // $("#s-o-bank-accounts").css("display","block");
                // $("#s-o-sales").css("display","block");
                // $("#s-o-services").css("display","block");
                // $("#s-o-lead-description").css("display","block");

                // $("#s-o-email").css("display","block");
                // $("#s-i-email-category").css("display","block");

                // $("#s-o-sms").css("display","block");
                // $("#s-i-sms-category").css("display","block");

                // $("#s-o-lead-management").css("display","block");
                
            } else {
                if (userType === 'MANAGER') {

                    console.log("Manager");
                    // $("#s-o-employees").css("display","block");
                    // $("#s-i-employees-active").css("display","block");
                    $("#s-i-employees-all").css("display","none");

                    $("#s-i-leads-unassigned").css("display","none");
                    $("#s-i-leads-assigned").css("display","none");
                    // $("#s-i-leads-follow-up").css("display","block");
                    // $("#s-i-leads-fresh").css("display","block");
                    $("#s-i-leads-dnd").css("display","none");
                    $("#s-i-leads-disposed").css("display","none");
                    $("#s-i-leads-idle").css("display","none");

                    // $("#s-o-reports").css("display","block");
                    $("#s-i-reports-dsh").css("display","none");
                    $("#s-i-reports-manager").css("display","none");
                    // $("#s-i-reports-employee").css("display","block");

                    // $("#s-o-target").css("display","block");
                    // $("#s-i-target-individual").css("display","block");
                    // $("#s-i-target-all").css("display","block");

                    // $("#s-o-free-trials").css("display","block");
                    // $("#s-o-lead-accounts").css("display","block");
                    // $("#s-o-bank-accounts").css("display","block");
                    // $("#s-o-sales").css("display","block");
                    // $("#s-o-services").css("display","block");
                    // $("#s-o-lead-description").css("display","block");

                    // $("#s-o-email").css("display","block");
                    $("#s-i-email-category").css("display","none");

                    // $("#s-o-sms").css("display","block");
                    $("#s-i-sms-category").css("display","none");

                    // $("#s-o-lead-management").css("display","block");
                    
                } else {
                    if (userType === 'LEADMANAGER') {

                        console.log("Lead Manager");
                        $("#s-o-employees").css("display","none");

                        $("#s-i-leads-unassigned").css("display","none");
                        $("#s-i-leads-assigned").css("display","none");
                        $("#s-i-leads-follow-up").css("display","none");
                        $("#s-i-leads-fresh").css("display","none");
                        $("#s-i-leads-dnd").css("display","none");
                        $("#s-i-leads-disposed").css("display","none");
                        $("#s-i-leads-idle").css("display","none");

                        $("#s-o-reports").css("display","none");

                        $("#s-o-target").css("display","none");

                        $("#s-o-free-trials").css("display","none");
                        $("#s-o-lead-accounts").css("display","none");
                        $("#s-o-bank-accounts").css("display","none");
                        $("#s-o-sales").css("display","none");
                        $("#s-o-services").css("display","none");
                        $("#s-o-lead-description").css("display","none");
                        $("#s-o-sms").css("display","none");
                        $("#s-o-email").css("display","none");
                        $("#s-o-lead-management").css("display","none");
                        
                    } else {

                        console.log("Telecaller");
                        $("#s-o-employees").css("display","none");

                        $("#s-i-leads-unassigned").css("display","none");
                        $("#s-i-leads-assigned").css("display","none");
                        // $("#s-i-leads-follow-up").css("display","block");
                        $("#s-i-leads-dnd").css("display","none");
                        // $("#s-i-leads-fresh").css("display","block");
                        $("#s-i-leads-disposed").css("display","none");
                        $("#s-i-leads-idle").css("display","none");

                        $("#s-o-reports").css("display","none");

                        // $("#s-o-target").css("display","block");
                        // $("#s-i-target-individual").css("display","block");
                        $("#s-i-target-all").css("display","none");

                        // $("#s-o-free-trials").css("display","block");
                        // $("#s-o-lead-accounts").css("display","block");
                        // $("#s-o-bank-accounts").css("display","block");
                        // $("#s-o-sales").css("display","block");
                        // $("#s-o-services").css("display","block");
                        // $("#s-o-lead-description").css("display","block");
                        
                        // $("#s-o-email").css("display","block");
                        $("#s-i-email-category").css("display","none");

                        // $("#s-o-sms").css("display","block");
                        $("#s-i-sms-category").css("display","none");

                        // $("#s-o-lead-management").css("display","block");
                        
                    }
                }
            }
        }
    } else {
        console.log("No userType Found");
	}
	
});
</script>


<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/6.4.2/firebase-app.js"></script>


<script src='https://www.gstatic.com/firebasejs/3.9.0/firebase-app.js'></script>;

<script src='https://www.gstatic.com/firebasejs/3.9.0/firebase-messaging.js'></script>;
<script>


        MsgElem = document.getElementById("msg")
        TokenElem = document.getElementById("token")
        NotisElem = document.getElementById("notis")
        ErrElem = document.getElementById("err")
        // Initialize Firebase
        // TODO: Replace with your project's customized code snippet
        var config = {
            apiKey: "AIzaSyAHElLhez3i5qY-NBcW-Zn7wB36ecTLc4Y",
			authDomain: "crmpn-66c0b.firebaseapp.com",
			databaseURL: "https://crmpn-66c0b.firebaseio.com",
			projectId: "crmpn-66c0b",
			storageBucket: "",
			messagingSenderId: "181234153481",
			appId: "1:181234153481:web:490123de3aec3222"
        };
        firebase.initializeApp(config);

        const messaging = firebase.messaging();
        messaging
            .requestPermission()
            .then(function () {
                // MsgElem.innerHTML = "Notification permission granted." 
                console.log("Notification permission granted.");

                // get the token in the form of promise
                return messaging.getToken()
            })
            .then(function(token) {
                console.log("token is : " + token);
            })
            .catch(function (err) {
               console.log( err);
                console.log("Unable to get permission to notify.", err);
            });

        messaging.onMessage(function(payload) {
            console.log("Message received. ", payload);
           console.log(JSON.stringify(payload)); 
        });
    </script>
