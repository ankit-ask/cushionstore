<div id="add_employee_modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Employee</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form method="post" id="addEmployee_Form">
            <div class="modal-body">
                
                <!-- <input type="hidden" value="0" name="edit_id" id="edit_id"> -->
                <!-- <input type="hidden" name="operation" id="operation" /> -->
                  
                  <div class="form-group">
                    <label for="user_type" class="control-label">CRM Account Type:</label>
                     <select id="user_type" name="user_type" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
                        <optgroup label="Type of Employee">
                            <option value="DSH">DSH</option>
                            <option value="MANAGER">MANAGER</option>
                            <option value="LEADMANAGER">LEAD MANAGER</option>
                            <option value="TELECALLER">TELECALLER</option>
                        </optgroup>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="managed_by_name" class="control-label">Managed By Name:</label>
                     <select id="managed_by_name" name="managed_by_name" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
                     <optgroup label="Managed By">
                            <option value="admin">ADMIN</option>
                        </optgroup>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="managed_by_id" class="control-label">Managed By ID:</label>
                    <input type="text" class="form-control" id="managed_by_id" name="managed_by_id" required value="ADMIN" readonly/>
                  </div>

                  <div class="form-group">
                    <label for="designation" class="control-label">Designation:</label>
                    <select id="designation" name="designation" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
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
                    <label for="name" class="control-label">Employee Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required />
                  </div>

                  <div class="form-group">
                    <label for="mobile" class="control-label">Mobile:</label>
                    <input type="number" class="form-control" id="mobile" name="mobile" required />
                  </div>

                  <div class="form-group">
                    <label for="email" class="control-label">E-Mail:</label>
                    <input type="Emails" class="form-control" id="email" name="email" required />
                  </div>

                  <div class="form-group">
                    <label for="joining_date" class="control-label">Joining Date:</label>
                     <input type="text" class="form-control" id="joining_date" name="joining_date" placeholder="yyyy/mm/dd" required autocomplete="off">
                     <div class="input-group-append" style="float: right; margin-top: -31px">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                     </div>
                  </div>

                  <div class="form-group">
                    <label for="address" class="control-label">Address:</label>
                    <input type="text" class="form-control" id="address" name="address" required />
                  </div>

                  <div class="form-group">
                    <label for="lead_capacity" class="control-label">Lead Capacity:</label>
                    <input type="number" class="form-control" id="lead_capacity" name="lead_capacity" required />
                  </div>

                  <div class="form-group">
                    <label for="user_ip" class="control-label">User IP Address:</label>
                    <input type="text" class="form-control" id="user_ip" name="user_ip" required value="0.0.0.0" disabled/>
                  </div>

                  <div class="form-group">
                    <label for="username" class="control-label">User Login ID:</label>
                    <input type="text" class="form-control" id="username" name="username" required />
                  </div>

                  <div class="form-group">
                    <label for="password" class="control-label">User Login Password:</label>
                    <input type="text" class="form-control" id="password" name="password" required />
                  </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
                <button type="submit" name="action" id="action" class="btn btn-success" value="Add" onclick="addEmployee()">SAVE</button>
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
