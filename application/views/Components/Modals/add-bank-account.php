<!-- Add Bank Account Modal -->
<div id="add_bank_account_modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Bank Account</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form method="post" id="add_bank_account_form">
            <div class="modal-body">
                  
                  <div class="form-group">
                    <label for="bank_name" class="control-label">Bank Name:</label>
                    <input type="text" class="form-control" id="bank_name" name="bank_name" required />
                  </div>
                  <div class="form-group">
                    <label for="branch" class="control-label">Branch:</label>
                    <input type="text" class="form-control" id="branch" name="branch" required />
                  </div>
                  <div class="form-group">
                    <label for="acc_num" class="control-label">Account Number:</label>
                    <input type="number" class="form-control" id="acc_num" name="acc_num" required />
                  </div>
                  <div class="form-group">
                    <label for="ifsc" class="control-label">IFSC:</label>
                    <input type="text" class="form-control" id="ifsc" name="ifsc" required />
                  </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" onclick="addBankAccount()" name="action" id="action" class="btn btn-success" value="Add">SAVE</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Bank Account Modal -->
<div id="update_bank_account_modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Bank Account</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form method="post" id="update_bank_account_form">
            <div class="modal-body">
                  
                  <div class="form-group">
                    <label for="update_bank_name" class="control-label">Bank Name:</label>
                    <input type="text" class="form-control" id="update_bank_name" name="bank_name" required />
                  </div>
                  <div class="form-group">
                    <label for="update_branch" class="control-label">Branch:</label>
                    <input type="text" class="form-control" id="update_branch" name="branch" required />
                  </div>
                  <div class="form-group">
                    <label for="update_acc_num" class="control-label">Account Number:</label>
                    <input type="number" class="form-control" id="update_acc_num" name="acc_num" required />
                  </div>
                  <div class="form-group">
                    <label for="update_ifsc" class="control-label">IFSC:</label>
                    <input type="text" class="form-control" id="update_ifsc" name="ifsc" required />
                  </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" onclick="updateBankAccount()" name="action" id="action" class="btn btn-success" value="Update">UPDATE</button>
            </div>
            </form>
        </div>
    </div>
</div>