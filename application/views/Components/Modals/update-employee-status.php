<!-- Update Employee Status Modal -->
<div id="update_employee_status_modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Are you sure you want to remove this Employee from the Active CRM Users?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form   name="form_update_employee_status" id="form_update_employee_status" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <label for="update_employee_status_id" class="control-label">Employee ID:</label>
                    <input type="text" class="form-control" id="update_employee_status_id" name="update_employee_status_id" required readonly/>
                </div>

                <div class="form-group">
                    <label for="update_employee_status_name" class="control-label">Employee Name:</label>
                    <input type="text" class="form-control" id="update_employee_status_name" name="update_employee_status_name" required readonly/>
                </div>

                <div class="form-group">
                    <label for="update_employee_status_type" class="control-label">Account Type:</label>
                    <input type="text" class="form-control" id="update_employee_status_type" name="update_employee_status_type" required readonly/>
                </div>
                
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-md-12 m-t-15"><strong>Warning:</strong> This action cannot be undone and the above Employee will not be able to use the CRM anymore.</label>
                    </div>   
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" name="delete" id="submit" class="btn btn-success" onclick="updateEmployeeStatus()">I Agree</button>
            </div>
            </form>

            

        </div>
    </div>
</div>
