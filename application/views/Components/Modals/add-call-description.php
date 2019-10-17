<!-- Add Call Description Modal -->
<div id="add_call_description_modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Call Response</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form method="post" id="add_call_description_form">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Lead Response</label>
                        <select id="call_status" name="call_status" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
                            <optgroup label="Select Option">
                                <option value="INTERESTED">Interested</option>
                                <option value="CALLBACK">Call Back</option>
                                <option value="NOT_INTERESTED">Not Interested</option>
                                <option value="LANGUAGE_ISSUE">Language Issue</option>
                                <option value="FREE_TRIAL">Free Trial</option>
                                <option value="CALL_BUSY">Call Busy</option>
                                <option value="DISCONNECTED_DURING_CALL">Disconnected During Call</option>
                                <option value="NOT_PICKED_CALL">Not Picked Call</option>
                                <option value="SWITCHED_OFF">Switched Off</option>
                                <option value="NOT_REACHABLE">Not Reachable</option>
                                <option value="INVALID_NUMBER">Invalid Number</option>
                                <option value="CALL_DISCONNECT">Call Disconnect</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="callback_date" class="control-label">Callback Date:</label>
                         <input type="text" class="form-control" id="datepicker_autoclose_callback_date" name="callback_date" placeholder="yyyy/mm/dd" disabled>
                         <div class="input-group-append" style="float: right; margin-top: -31px" >
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                         </div>
                    </div>
                    <div class="form-group">
                        <label for="callback_time" class="control-label">Callback Time:</label>
                         <input type="time" class="form-control" id="callback_time" name="callback_time" placeholder="HH:MM AM/PM" disabled>
                    </div>
                    <div  class="form-group">
                        <label class="col-md-3 m-t-15">Comment</label>
                        <textarea class="form-control" rows="5" id="call_comment" name="description" value="-"></textarea>
                    </div>
                    <button type="button" onclick="return addCallDescription()" name="action" id="action" class="btn btn-success btn-modal-tab" value="add_desc">Add Description</button>

                </div>
            </form>
        </div>
    </div>
</div>
