<!-- Add Target Modal -->
<div id="add_target_modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Employee Target</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form method="post" id="add_target_form">
            <div class="modal-body">

                  <div class="form-group" id="hid_1">
                    <label class="col-md-6 m-t-15">Select Employee:</label>
                        <select name="emp_fk" id="emp_fk" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
                            <optgroup label="Select Employee"></optgroup>
                        </select>
                    </div>

                  <div class="form-group" id="hid_2">
                    <label for="month" class="control-label">Select Month:</label>
                     <input type="text" class="form-control" id="datepicker_freetrial_month" name="month" placeholder="mm/yyyy" required>
                     <div class="input-group-append" style="float: right; margin-top: -31px">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                     </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="target_assigned" class="control-label">Target Value(In rupees):</label>
                    <input type="number" class="form-control" id="target_assigned" name="target_assigned" required />
                  </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" onclick="addTarget()" name="action" id="action" class="btn btn-success" value="Add">SAVE</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Target Modal -->
<!-- <div id="update_target_modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Employee Target</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form method="post" id="update_target_form">
            <div class="modal-body">


                  <div class="form-group" id="hid_2">
                    <label for="update_month" class="control-label">Select Month:</label>
                     <input type="text" class="form-control" id="update_month" name="month" placeholder="mm/yyyy" required readonly>
                     <div class="input-group-append" style="float: right; margin-top: -31px">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                     </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="update_target_assigned" class="control-label">Target Value(In rupees):</label>
                    <input type="number" class="form-control" id="update_target_assigned" name="target_assigned" required />
                  </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" onclick="updateTarget()" name="action" id="action" class="btn btn-success" value="Add">UPDATE</button>
            </div>
            </form>
        </div>
    </div>
</div> -->