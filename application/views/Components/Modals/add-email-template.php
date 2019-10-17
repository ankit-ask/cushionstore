<!-- Add Mail Template Modal -->
<div id="add_mail_template_modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add E-Mail Template</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form method="post" id="add_mail_template_form">
            <div class="modal-body">

                  <div class="form-group">
                    <label class="col-md-6 m-t-15">E-Mail Category:</label>
                        <select name="cat_fk" id="cat_fk" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
                            <optgroup label="Select Category for this E-Mail">
                            </optgroup>
                        </select>
                    </div>

                  <div class="form-group">
                    <label for="template_name" class="control-label">Template Name:</label>
                    <input type="text" class="form-control" id="template_name" name="template_name" required />
                  </div>
                  <div class="form-group">
                    <label for="mail_head" class="control-label">E-Mail Subject:</label>
                    <input type="text" class="form-control" id="mail_head" name="mail_head" required />
                  </div>
                  <div class="form-group">
                    <label for="content" class="control-label">E-Mail Body:</label>
                    <textarea class="form-control" rows="5" id="content" name="content" required></textarea>
                  </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" onclick="addMailTemplate()" name="action" id="action" class="btn btn-success" value="Add">SAVE</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Updated Mail Template Modal -->
<div id="update_mail_template_modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update E-Mail Template</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form method="post" id="update_mail_template_form">
            <div class="modal-body">

                  <div class="form-group">
                    <label class="col-md-6 m-t-15">E-Mail Category:</label>
                        <select name="cat_fk" id="update_cat_fk" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
                            <optgroup label="Select Category for this E-Mail">
                            </optgroup>
                        </select>
                    </div>

                  <div class="form-group">
                    <label for="template_name" class="control-label">Template Name:</label>
                    <input type="text" class="form-control" id="update_template_name" name="template_name" required />
                  </div>
                  <div class="form-group">
                    <label for="mail_head" class="control-label">E-Mail Subject:</label>
                    <input type="text" class="form-control" id="update_mail_head" name="mail_head" required />
                  </div>
                  <div class="form-group">
                    <label for="content" class="control-label">E-Mail Body:</label>
                    <textarea class="form-control" rows="5" id="update_content" name="content" required></textarea>
                  </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" onclick="updateMailTemplate()" name="action-update" id="action-update" class="btn btn-success" value="Update">UPDATE</button>
            </div>
            </form>
        </div>
    </div>
</div>