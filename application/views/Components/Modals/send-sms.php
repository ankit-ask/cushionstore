<!-- Send SMS model -->
<div id="send-sms-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Send SMS</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form method="post" id="form_sms">
            <div class="modal-body">
                
                  <div class="form-group">
                    <label for="sms_lead_name" class="control-label">Name:</label>
                    <input type="text" class="form-control" id="sms_lead_name" name="sms_lead_name" required />
                  </div>
                  <div class="form-group">
                    <label for="mobile" class="control-label">Mobile:</label>
                    <input type="number" class="form-control" id="sms_lead_mobile" name="sms_lead_mobile" required />
                  </div>

                  <!-- <label class="col-md-3 m-t-15">SMS Type</label>
                        <select id="sms_type" name="sms_type" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
                            <optgroup label="Select SMS Type">
                                <option value="template">From Template</option>
                                <option value="custom">Custom SMS</option>
                            </optgroup>
                        </select> -->
                    <label class="col-md-3 m-t-15">SMS Category</label>
                        <select id="sms_category" name="sms_category" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
                            <optgroup label="Select SMS Category"> 
                            </optgroup>
                        </select>
                    <label class="col-md-3 m-t-15">Select Template</label>
                        <select id="sms_template" name="sms_template" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
                            <optgroup label="Select SMS Template"> 
                            </optgroup>
                        </select>
                    <label class="col-md-3 m-t-15">SMS Header</label>
                        <input type="text" name="sms_head" id="sms_head" class="form-control">
                    <label class="col-md-3 m-t-15">SMS Content</label>
                        <textarea class="form-control" rows="5" id="sms_content"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" onclick="return sendSms()" name="action" id="action" class="btn btn-success" value="send_sms">Send</button>
            </div>
            </form>
        </div>
    </div>
</div>