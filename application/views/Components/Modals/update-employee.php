<div id="update_employee_modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Employee</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form method="post" id="updateEmployee_Form">
            <div class="modal-body">
                
                <!-- <input type="hidden" value="0" name="edit_id" id="edit_id"> -->
                <!-- <input type="hidden" name="operation" id="operation" /> -->
                  
                <div class="form-group">
                    <label for="update_employee_id" class="control-label">Employee ID:</label>
                    <input type="text" class="form-control" id="update_employee_id" name="update_employee_id" required readonly/>
                  </div>
                  
                  <div class="form-group">
                    <label for="update_user_type" class="control-label">CRM Account Type:</label>
                    <input type="text" class="form-control" id="update_user_type" name="update_user_type" required readonly/>
                  </div>

                  <div class="form-group">
                    <label for="update_managed_by_name" class="control-label">Managed By Name:</label>
                     <select id="update_managed_by_name" name="update_managed_by_name" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
                     <optgroup label="Managed By">
                            <option value="admin">ADMIN</option>
                        </optgroup>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="update_managed_by_id" class="control-label">Managed By ID:</label>
                    <input type="text" class="form-control" id="update_managed_by_id" name="update_managed_by_id" required readonly/>
                  </div>

                  <div class="form-group">
                    <label for="update_designation" class="control-label">Designation:</label>
                    <select id="update_designation" name="update_designation" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
                        <optgroup label="Employee's Designation">
                            <option value="DSH">DSH</option>
                            <option value="MANAGER">MANAGER</option>
                            <option value="LEADMANAGER">LEAD MANAGER</option>
                            <option value="SBA">SBA</option>
                            <option value="BA">BA</option>
                            <option value="TELECALLER">TELECALLER</option>
                        </optgroup>
                    </select>
                    <!-- <input type="text" class="form-control" id="designation" name="designation" required /> -->
                  </div>

                  <div class="form-group">
                    <label for="update_name" class="control-label">Employee Name:</label>
                    <input type="text" class="form-control" id="update_name" name="update_name" required />
                  </div>

                  <div class="form-group">
                    <label for="update_mobile" class="control-label">Mobile:</label>
                    <input type="number" class="form-control" id="update_mobile" name="update_mobile" required />
                  </div>

                  <div class="form-group">
                    <label for="update_email" class="control-label">E-Mail:</label>
                    <input type="Emails" class="form-control" id="update_email" name="update_email" required />
                  </div>

                  <div class="form-group">
                    <label for="update_joining_date" class="control-label">Joining Date:</label>
                     <input type="text" class="form-control" id="update_joining_date" name="update_joining_date" placeholder="yyyy/mm/dd" required autocomplete="off">
                     <div class="input-group-append" style="float: right; margin-top: -31px">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                     </div>
                  </div>

                  <div class="form-group">
                    <label for="update_address" class="control-label">Address:</label>
                    <input type="text" class="form-control" id="update_address" name="update_address" required />
                  </div>

                  <div class="form-group">
                    <label for="update_lead_capacity" class="control-label">Lead Capacity:</label>
                    <input type="number" class="form-control" id="update_lead_capacity" name="update_lead_capacity" required />
                  </div>

                  <div class="form-group">
                    <label for="update_username" class="control-label">User Login ID:</label>
                    <input type="text" class="form-control" id="update_username" name="update_username" required />
                  </div>

                  <div class="form-group">
                    <label for="update_password" class="control-label">User Login Password:</label>
                    <input type="text" class="form-control" id="update_password" name="update_password" required />
                  </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
                <button type="submit" name="action" id="action" class="btn btn-success" value="Add" onclick="updateEmployee()">UPDATE</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- <script>
/*datepicker*/
jQuery('.mydatepicker').datepicker();
jQuery('#joining_date').datepicker({
    autoclose: true,
    todayHighlight: true,
    format: 'yyyy/mm/dd'
});
</script> -->
