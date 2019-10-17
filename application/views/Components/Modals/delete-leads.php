<!-- Delete Leads Modal -->
<div id="delete_leads_modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete (Count) Leads Permanently</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form   name="form_delete_leads" id="form_delete_leads" enctype="multipart/form-data">
            <div class="modal-body">
                    <div>
                       <label class="col-md-12 m-t-15"><strong>Warning:</strong> This action cannot be undone and will delete all the selected leads from the CRM database.</label>
                    </div>   
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" name="delete" id="submit" class="btn btn-success">I Agree</button>
            </div>
            </form>
        </div>
    </div>
</div>