<div id="add_lead_modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="lead_modal_title">Add Lead</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form method="post" id="add_lead_form">
            <div class="modal-body">
                  
                  <div class="form-group">
                    <label for="leadType" class="control-label">Lead Type:</label>
                     <select id="leadType" name="lead_type" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
                        <optgroup label="Type of Lead">
                            <option value="AONE">A-One</option>
                            <option value="WEB">Web</option>
                            <option value="SMO">SMO</option>
                        </optgroup>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="edit_name" class="control-label">Name:</label>
                    <input type="text" class="form-control" id="edit_name" name="name" required />
                  </div>
                  <div class="form-group col-md-6" style="float: left; padding-left: 0;">
                  <label for="mobile" class="control-label">Mobile:</label>
                    <input type="number" class="form-control" id="mobile" name="mobile" required />
                  </div>
                  <div class="form-group col-md-6" style="float: right; padding-right: 0;">
                  <label for="alternate_mobile" class="control-label">Alternate Mobile:</label>
                    <input type="number" class="form-control" id="alternate_mobile" name="alternate_mobile" />
                  </div>
                  <div class="form-group">
                    <label for="email" class="control-label">Email:</label>
                    <input type="text" class="form-control" id="edit_email" name="email" value="-" />
                  </div>
                  <div class="form-group col-md-6" style="float: left; padding-left: 0;">
                    <label for="segment" class="control-label">Segment:</label>
                    <input type="text" class="form-control" id="add_segment" name="segment" value="-" />
                  </div>
                  <div class="form-group col-md-6" style="float: right; padding-right: 0;">
                    <label for="investment" class="control-label">Investment:</label>
                    <input type="number" class="form-control" id="add_investment" name="investment" value="0" />
                  </div>
                  <div class="form-group">
                    <label for="country" class="control-label">Country:</label>
                    <input type="text" class="form-control" id="edit_country" name="country" value="India" />
                  </div>

                  <div class="form-group">
                    <label for="state" class="control-label">State:</label>
                    <select id="listBox" name="state" onchange='selct_district(this.value)'></select>
                    <!-- <input type="text" class="form-control" id="edit_state" name="edit_state" /> -->

                    <label for="city"  class="control-label">City:</label>
                    <select id='secondlist' name="city" style="min-width: 200px; max-width:200px"></select>

                  </div>
                  <!-- <div class="form-group">
                    <label for="city"  class="control-label">City:</label>
                    <select id='secondlist' name="edit_city" ></select>
                    <input type="text" class="form-control" id="edit_city" name="edit_city"/>
                  </div> -->

                  <div class="form-group">
                    <label for="address" class="control-label">Address:</label>
                    <input type="text" class="form-control" id="edit_address" name="address" value="-" />
                  </div>
                  <div class="form-group col-md-6" style="float: left; padding-left: 0;">
                  <label for="pan_num" class="control-label">PAN No.:</label>
                    <input type="text" class="form-control" id="edit_pan_num" name="pan_num" value="-" />
                  </div>
                  <div class="form-group col-md-6" style="float: right; padding-right: 0;">
                  <label for="aadhar_num" class="control-label">Aadhar No.:</label>
                    <input type="text" class="form-control" id="edit_aadhar_num" name="aadhar_num" value="-" />
                  </div>
                  <div class="form-group">
                    <label for="dob" class="control-label">DOB:</label>
                     <input type="text" class="form-control" id="datepicker-autoclose" name="dob" placeholder="yyyy/mm/ddy" value="-" autocomplete="off">
                     <div class="input-group-append" style="float: right; margin-top: -31px" >
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                     </div>
                  </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" onclick="addLead()" name="action" id="action" class="btn btn-success" value="Add">Save</button>
                <button type="button" onclick="updateLead()" name="action-update" id="action-update" class="btn btn-success" value="Update">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
