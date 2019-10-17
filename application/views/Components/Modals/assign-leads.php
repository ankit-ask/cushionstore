<!-- Assign Leads Modal -->
<div id="assign_leads_modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="assign_leads_count">Assign (count) Leads</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form   name="form_assign_leads" id="form_assign_leads" enctype="multipart/form-data">
            <div class="modal-body">
                    <div>
                       <label class="col-md-6 m-t-15">Select Employee</label>
                        <select id="assign_lead_select" name="search_employee" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
                            <optgroup label="Select Employee"></optgroup>
                        </select>
                    </div>
				<div id="assign_result"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" name="assign" id="submitAssignLeads" class="btn btn-success">Assign</button>
            </div>

            </form>
        </div>
    </div>
</div>
