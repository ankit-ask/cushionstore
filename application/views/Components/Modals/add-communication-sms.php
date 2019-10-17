<div id="edit_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Compose Message</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form method="post" id="frm_edit">
            <div class="modal-body">
                
                <input type="hidden" value="0" name="edit_id" id="edit_id">
                <input type="hidden" name="operation" id="operation" />
                 
                <div class="form-group row">
                    <label class="col-md-3 m-t-15">Receipients:</label>
                    <div class="col-md-12">
                        <select class="select2 form-control m-t-15" id="MultiRec" multiple="multiple" style="height: 60px; width: 100%">
                            <optgroup label="Send message to:">
                                <option value="1">Emp-Id-1: Test Employee 1</option>
                                <option value="2">Test 2</option>
                                <option value="3">Test 3</option>
                                <option value="4">Test 4</option>
                                <option value="5">Test 5</option>
                                <option value="6">Test 6</option>
                                <option value="7">Test 7</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
                <br>
                <br>
                      
                  <div class="form-group">
                    <label for="subject" class="control-label">Title:</label>
                    <input type="text" class="form-control" id="compose_tittle" name="edit_subject" required />
                  </div>

                  <div class="form-group">
                    <label for="content" class="control-label">Message:</label>
                    <textarea class="form-control" rows="8" id="compose_message" name="edit_content" required></textarea>
                  </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" onclick="return SendMessage()" name="action" id="action" class="btn btn-success" value="Add"><i class="m-r-5 fa far fas fa-paper-plane" aria-hidden="true"></i> Send</button>
            </div>
            </form>
        </div>
    </div>
</div>