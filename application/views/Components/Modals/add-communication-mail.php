<div id="edit_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Compose Email</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form method="post" id="frm_edit">
            <div class="modal-body">
                
                <input type="hidden" value="0" name="edit_id" id="edit_id">
                <input type="hidden" name="operation" id="operation" />
                <p><h6>Note: All the mail directly send to admin there is no need to add admin in TO or CC section.If you want to send mail to admin leave both the feilds blank.</h6></p>
                <div class="form-group row">
                    <label class="col-md-3 m-t-15">Mail To:</label>
                    <div class="col-md-12">
                        <select class="select2 form-control m-t-15" id="MultiRec" name="MultiRec" multiple="multiple" style="height: 60px; width: 100%">
                            <optgroup label="Send mail to:">
                                
                            </optgroup>
                        </select>
                    </div>
                </div>
                <br>

                <div class="form-group row">
                    <label class="col-md-3 m-t-15">CC:</label>
                    <div class="col-md-12">
                        <select class="select2 form-control m-t-15" id="MultiCC" name="MultiCC" multiple="multiple" style="height: 60px; width: 100%">
                            <optgroup label="Select CC for this mail:">
                                
                            </optgroup>
                        </select>
                    </div>
                </div>
                <br> 
                        
                <div class="form-group">
                    <label for="subject" class="control-label">Subject:</label>
                    <input type="text" class="form-control" id="compose_subject" name="edit_subject" required />
                </div>

                <div class="form-group">
                    <label for="content" class="control-label">Content:</label>
                    <textarea class="form-control" rows="8" id="compose_content" name="edit_content" required></textarea>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" name="action" id="action" onclick="return ComposeMail()" class="btn btn-success" value="Add"><i class="m-r-5 fa far fas fa-paper-plane" aria-hidden="true"></i> Send</button>
            </div>
            </form>
        </div>
    </div>
</div>