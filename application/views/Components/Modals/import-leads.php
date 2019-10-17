<!-- Import Leads Modal -->
<div id="import_modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Import Leads From Excel (CSV)</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form name="export_excel" method="POST"   id="upload_csv" enctype="multipart/form-data">
            <div class="modal-body">
                    <div>
                        <label>Choose Excel (CSV) File</label>
                        <input type="file" class="form-control" name="file" id="file" accept=".csv">
                    </div>   
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" name="Upload" id="uploadCsvLeads" class="btn btn-success">Import</button>
            </div>
            </form>
        </div>
    </div>
</div>
