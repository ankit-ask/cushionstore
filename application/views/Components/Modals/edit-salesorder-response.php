<!-- Add New SMS Template Modal -->
<div id="edit_salesorder_response_modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Sales Order Response</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form method="post" id="edit_salesorder_response_form">
            <div class="modal-body">

                  <div class="form-group">
                    <label class="col-md-6 m-t-15">Sales Order Status</label>
                        <select name="status" id="order_status" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
                            <optgroup label="Select order status">
                                <option value="ACCEPTED">ACCEPT</option>
                                <option value="REJECTED">REJECT</option>
                            </optgroup>
                        </select>
                  </div>

                  <div class="form-group">
                    <label for="admin_comment" class="control-label">Comment</label>
                    <textarea class="form-control" rows="5" id="admin_comment" name="admin_comment"></textarea>
                  </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" onclick="editSalesorderStatus()" name="action" id="action" class="btn btn-success" value="Add">SAVE</button>
            </div>
            </form>
        </div>
    </div>
</div>