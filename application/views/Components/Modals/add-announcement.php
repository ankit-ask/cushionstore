<div id="edit_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Announcement</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form method="post" id="frm_edit">
            <div class="modal-body">
                
                <input type="hidden" value="0" name="edit_id" id="edit_id">
                <input type="hidden" name="operation" id="operation" />
                 
                <div class="form-group row">
                    <label class="col-md-3 m-t-15">Receipients:</label>
                    <div class="col-md-12">
                        <select class="select2 form-control m-t-15" multiple="multiple" id="MultiRec" style="height: 60px; width: 100%">
                            <optgroup label="Send notification to:">
                                <option value="Managers">Managers</option>
                                <option value="Others">Other Employees</option>
                            </optgroup>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="subject" class="control-label">Title:</label>
                    <input type="text" class="form-control" id="announcement_tittle" name="edit_subject" required />
                </div>

                <div class="form-group">
                    <label for="content" class="control-label">Notice/Message:</label>
                    <textarea class="form-control" rows="8" id="announcement_message" name="edit_content" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
                <button type="button" onclick="return AddAnnouncement()" name="action" id="action" class="btn btn-success" value="Add"><i class="m-r-5 fa far fas fa-paper-plane" aria-hidden="true"></i> Send</button>
            </div>
            </form>
        </div>
    </div>
</div>