<!-- Add SMS Category Modal -->
<div id="add_sms_category_modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">SMS Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form method="post" id="add_category_form">
            <div class="modal-body">
                  
                  <div class="form-group">
                    <label for="category" class="control-label">Category Name:</label>
                    <input type="text" class="form-control" id="category" name="category" required />
                  </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" onclick="addSMSCategory()" name="action" id="action" class="btn btn-success" value="Add">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit SMS Category Modal -->
<div id="update_sms_category_modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update SMS Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form method="post" id="update_category_form">
            <div class="modal-body">
                  
                  <div class="form-group">
                    <label for="update_category" class="control-label">Category Name:</label>
                    <input type="text" class="form-control" id="update_category" name="category" required />
                  </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" onclick="updateSMSCategory()" name="action-update" id="action-update" class="btn btn-success" value="UPDATE">UPDATE</button>
            </div>
            </form>
        </div>
    </div>
</div>