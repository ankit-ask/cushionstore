<!-- Add User Modal -->
<div id="edit_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form method="post" id="frm_edit">
            <div class="modal-body">
                
                <input type="hidden" value="0" name="edit_id" id="edit_id">
                <input type="hidden" name="operation" id="operation" />

                  <div class="form-group">
                    <label class="col-md-3 m-t-15">Employee ID:</label>
                        <select name="edit_emp_fk" id="edit_emp_fk" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
                            <optgroup label="Select Employee ID for this user">                                           
                            </optgroup>
                        </select>
                        <!-- Show only those emloyees who do not have a user account mapped to them -->
                    </div>

                    <div class="form-group">
                    <label class="col-md-3 m-t-15">Account Type:</label>
                        <select name="edit_acc_type" id="edit_acc_type" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
                            <optgroup label="Select Account Type for this user">
                              <option value="manager">DSH Account</option>
                              <option value="manager">Manager Account</option>
                              <option value="telecaller">Telecaller Account</option>              
                            </optgroup>
                        </select>
                        <!-- Remove this selection, get data from Employee table instead -->
                    </div>
                  <div class="form-group">
                    <label for="edit_name" class="control-label">Username:</label>
                    <input type="text" class="form-control" id="edit_name" name="edit_name" required />
                  </div>
                  <div class="form-group">
                    <label for="password" class="control-label">Password:</label>
                    <input type="text" class="form-control" id="edit_password" name="edit_password" required />
                  </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" name="action" id="action" class="btn btn-success" value="Add">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>