var customSendData = {};

var customTableDef;

var isFilter = 'false';

var leadDataTable;

var assignLeadids;

var tableIdName;

var uploadLeadType;

function setCustomData(){

	if($('#lastCallStartTime').val() != '')
		customSendData.lastCallStartTime = $('#lastCallStartTime').val() + " 00:00:00";
	if($('#lastCallEndTime').val() != '')
		customSendData.lastCallEndTime = $('#lastCallEndTime').val() + " 00:00:00";;
	
	customSendData.name = $('#nameSearch').val();
	customSendData.lead_type = $('#leadTypeSearch').val();
	customSendData.mobile = $('#mobileSearch').val();
	customSendData.state = $('#stateSearch').val();
	customSendData.city = $('#citySearch').val();
	customSendData.status = $('#leadStatusSearch').val();
	customSendData.assigned_to = $('#assignedToSearch').val();
	customSendData.startDate = $('#creationStartDate').val();
	customSendData.endDate = $('#creationEndDate').val();

	// customSendData.managed_by_name = $('#managedBySearch').val();
	customSendData.isFilter = isFilter;
	customSendData.userType = userType;
	customSendData.empId = getFromStorage(EMPLOYEE_ID);

}

//============ init() Begins ============
function init(tableIdName,methodName, uploadLeadType){

	this.tableIdName = tableIdName;

	this.uploadLeadType = uploadLeadType;
	
	setCustomData();

	if (userType === 'LEADMANAGER') {
		$('#commands-th').hide();
		customTableDef = {
			columns: [
				{
					targets: 0,
					data: null,
					defaultContent: ' <input type="checkbox" class="active-cb">',
					orderable: false,
				},
				{data: 'lead_id'},
				{data: 'lead_type'},
				{data: 'name'},
				{data: 'mobile'},
				{data: 'alternate_mobile'},
				{data: 'segment'},
				{data: 'investment'},
				{data: 'lastCallStatus'},
				{data: 'lastCallTime'},
				{data: 'email'},
				{data: 'country'},
				{data: 'state'},
				{data: 'city'},
				{data: 'address'},
				{data: 'pan_num'},
				{data: 'aadhar_num'},
				{data: 'dob'},
				{data: 'status'},
				{data: 'assigned_to'},
				{data: 'creation_date'},
				{data: 'assigning_date'},
				{data: 'lead_added_by_id'}
			],
				columnDefs: [
					{
						"targets": 1,
						"visible": false
					}
				] 
		};
	}
	else{

		if(tableIdName =='lead_unassigned_table'){
			customTableDef = {
				columns: [
					{
						targets: 0,
						data: null,
						defaultContent: ' <input type="checkbox" class="active-cb">',
						orderable: false,
					},
					{data: 'lead_id'},
					{data: 'lead_type'},
					{data: 'name'},
					{data: 'mobile'},
					{data: 'alternate_mobile'},
					{data: 'segment'},
					{data: 'investment'},
					{data: 'lastCallStatus'},
					{data: 'lastCallTime'},
					{data: 'email'},
					{data: 'country'},
					{data: 'state'},
					{data: 'city'},
					{data: 'address'},
					{data: 'pan_num'},
					{data: 'aadhar_num'},
					{data: 'dob'},
					{data: 'status'},
					{data: 'assigned_to'},
					{data: 'creation_date'},
					{data: 'assigning_date'},
					{data: 'lead_added_by_id'},
					{
						"data": null,
						"defaultContent": "<button class='btn btn-danger btn-xs editBtn jsr-cmd-btn'>Edit</button>"
					}
				],
					columnDefs: [
						{
							"targets": 1,
							"visible": false
						}
					]
			};
		}
		else{
			customTableDef = {
				columns: [
					{
						targets: 0,
						data: null,
						defaultContent: ' <input type="checkbox" class="active-cb">',
						orderable: false,
					},
					{data: 'lead_id'},
					{data: 'lead_type'},
					{data: 'name'},
					{data: 'mobile'},
					{data: 'alternate_mobile'},
					{data: 'segment'},
					{data: 'investment'},
					{data: 'lastCallStatus'},
					{data: 'lastCallTime'},
					{data: 'email'},
					{data: 'country'},
					{data: 'state'},
					{data: 'city'},
					{data: 'address'},
					{data: 'pan_num'},
					{data: 'aadhar_num'},
					{data: 'dob'},
					{data: 'status'},
					{data: 'assigned_to'},
					{data: 'creation_date'},
					{data: 'assigning_date'},
					{data: 'lead_added_by_id'},
					{
						"data": null,
						"defaultContent": "<button class='btn btn-warning btn-xs viewDetailsBtn jsr-cmd-btn'>View</button><button class='btn btn-danger btn-xs editBtn jsr-cmd-btn'>Edit</button><button class='btn btn-info btn-xs callResponseBtn jsr-cmd-btn'>Call Response</button><button class='btn btn-success btn-xs getCallDescriptionBtn jsr-cmd-btn'>View Call Response</button>"
					}
				],
					columnDefs: [
						{
							"targets": 1,
							"visible": false
						}
					] 
			};
		}
		
	}

	leadDataTable = createListDataTable(tableIdName, methodName, customSendData, 10,customTableDef);

	// new $.fn.dataTable.FixedColumns( leadDataTable, {
	// 	rightColumns: 1
	// } );

	$('#'+tableIdName).on('click', 'tr', function () {			
		
		$(this).toggleClass('selected');

        if (event.target.type !== 'checkbox') {
			if($(':checkbox', this).prop('checked') === true)
				$(':checkbox', this).prop('checked', false);
			else
				$(':checkbox', this).prop('checked', true);

        }
		
	});

	// jQuery('.mydatepicker').datepicker();
	$('#daterange').datepicker({
		todayBtn:'linked',
		format: "yyyy/mm/dd",
		autoclose: true
	});

	$('#datetimerange').datepicker({
		todayBtn:'linked',
        format: 'yyyy-mm-dd',
		autoclose: true
	});


	if (userType != undefined) {
		console.log(userType);
		if (userType === 'ADMIN') {
			//ADMIN
			$("#download_format_button").show();
			$("#import_leads_button").show();
			$("#assign_leads_button").show();

		} else {

			if (userType === 'DSH') {
				//DSH
				$("#download_format_button").show();
				$("#import_leads_button").show();
				$("#assign_leads_button").show();

			} else {

				if (userType === 'MANAGER') {
					//MANAGER
					$("#download_format_button").hide();
					$("#import_leads_button").hide();
					$("#assign_leads_button").show();
				} else {

					if (userType === 'LEADMANAGER') {
						//LEADMANAGER
						$("#download_format_button").show();
						$("#import_leads_button").show();
						$("#assign_leads_button").show();

					} else {
						//TELECALLER
							$("#download_format_button").hide();
							$("#import_leads_button").hide();
							$("#assign_leads_button").hide();

					}
				}

			}
		}
	} else {
		console.log("No userType Found");
	}

	$('#search').click(function(){

		var creationStartDate = $('#creationStartDate').val();
		var creationEndDate = $('#creationEndDate').val();
		var lastCallStartTime = $('#lastCallStartTime').val();
		var lastCallEndTime = $('#lastCallEndTime').val();
		if(creationStartDate != '' && creationEndDate !='')
		{
			isFilter = 'true';
			setCustomData();
			// employeeDataTable.destroy();
			leadDataTable.ajax.reload();
			// createTable();
		}else if(lastCallStartTime != '' && lastCallEndTime !=''){
			isFilter = 'true';
			setCustomData();
			// employeeDataTable.destroy();
			leadDataTable.ajax.reload();
		}
		else
		{
			alert("Both Date is Required");
		}
	});

	$('#reset').click(function(){
		isFilter = false;
		$('#creationStartDate').val('');
		$('#creationEndDate').val('');
		$('#lastCallStartTime').val('');
		$('.search-input-text').val('');
		$('#lastCallEndTime').val('');
		setCustomData();
		leadDataTable.ajax.reload();
	});

	

	fillNestedDropdownData($('#assign_lead_select'), 'assign_lead_select');
	//Add Lead Button Function
	$('#add_button').on( 'click', function () {
		$('#add_lead_form')[0].reset();

		$('#action').show();
		$('#action-update').hide();
		

		$('#leadType').attr('disabled',false);
		$('#mobile').attr('readonly',false);
		$('#lead_modal_title').text('Add New Lead');
		$('#secondlist').find('option').remove().end();
		$('#edit_country').val('India');
	});

	//View Button Function
	$('#'+tableIdName).on( 'click', '.viewDetailsBtn', function () {
		data = leadDataTable.row( $(this).parents('tr') ).data();
		console.log(data.lead_id);
		console.log(data);

		//Hiding Sales Order Panel For Leads Section
		if(data.contact_account=='YES'){
			$('#salesorder_main_view').show();
			$('#salesorder_alternate_view').hide();
			$('#transfer_account_view').show();
			$('#transfer_lead_view').hide();
		}
		else{
			$('#salesorder_main_view').hide();
			$('#salesorder_alternate_view').show();
			$('#transfer_account_view').hide();
			$('#transfer_lead_view').show();
		}
	
		$('#leads_view_action_modal').modal('show');

		//Fill Data For Contact Panel/Tab
		$('#contact_name').val(data.name);
		$('#contact_mobile').val(data.mobile);
		$('#contact_alternate_mobile').val(data.alternate_mobile);
		$('#contact_email').val(data.email);
		$('#contact_segment').val(data.segment);
		$('#contact_investment').val(data.investment);
		$('#contact_country').val(data.country);
		$('#contact_state').val(data.state);
		$('#contact_city').val(data.city);
		$('#contact_address').val(data.address);
		$('#contact_pan_num').val(data.pan_num);
		$('#contact_aadhar_num').val(data.aadhar_num);
		$('#datepicker_autoclose_contact_dob').val(data.dob);

		//Fill Data For Sales Order Panel/Tab
		$('#sales_name').val(data.name);
		$('#sales_mobile').val(data.mobile);

		//Fill Data For Free Trials Panel/Tab
		//fillFreeTrialsServicesDropdownData('services');
	
	});

	//Call Response Button Function
	$('#'+tableIdName).on( 'click', '.callResponseBtn', function () {
		data = leadDataTable.row( $(this).parents('tr') ).data();
		console.log(data.lead_id);
		console.log(data);
	
		$('#add_call_description_modal').modal('show');
	
	});

	//View Lead's Call Response Button Function
	$('#'+tableIdName).on( 'click', '.getCallDescriptionBtn', function () {
		data = leadDataTable.row( $(this).parents('tr') ).data();
		console.log(data.lead_id);
		console.log(data);
	
		$('#view_call_description_timeline_modal').modal('show');
		createCallDesriptionTimelineView('timeline');
	
	});

	//Edit Button Function
	$('#'+tableIdName).on( 'click', '.editBtn', function () {
		data = leadDataTable.row( $(this).parents('tr') ).data();
		console.log(data.lead_id);
		console.log(data);
		
		$('#action').hide();
		$('#action-update').show();

		$('#leadType').attr('disabled',true);
		$('#mobile').attr('readonly',true);
		$('#add_lead_modal').modal('show');
		$('#lead_modal_title').text('Edit Lead Details');

		$('#leadType').val(data.lead_type);
		$('#edit_name').val(data.name);
		$('#mobile').val(data.mobile);
		$('#alternate_mobile').val(data.alternate_mobile);
		$('#edit_email').val(data.email);
		$('#add_segment').val(data.segment);
		$('#add_investment').val(data.investment);
		$('#edit_country').val(data.country);
		$('#listBox').val(data.state);
		//$('#secondlist').val(data.city);
		$('#edit_address').val(data.address);
		$('#edit_pan_num').val(data.pan_num);
		$('#edit_aadhar_num').val(data.aadhar_num);
		$('#datepicker-autoclose').val(data.dob);
		
		//FIX This
		var oldOptionCity = $("<option/>").attr("value", data.city).text(data.city);
		$('#secondlist').append(oldOptionCity);
	
	});
	
	//Fill Data For Services Dropdown in Free Trials Panel/Tab
	fillServicesDropdownData('services','free_trial_service');
	fillServicesDropdownData('services','sales_service_fk');

	//Fill Data For Bank Accounts Dropdown in Sales Order Panel/Tab
	fillBankAccountDropdownData('company_accounts','payment_bank_fk');

	//Fill SMS Category Dropdown in SMS Panel /Tab
	fillSMSCategoryDropdownData('sms_category','sms_category_select');
	
	//Fill Email Category Dropdown in SMS Panel /Tab
	fillMailCategoryDropdownData('mail_category','mail_category_select');


}
//============ init() Ends ============

$('#upload_csv').on('submit', function(event){

	event.preventDefault();

	$('#uploadCsvLeads').prop('disabled', true);

	console.log("clicked");

	var dataForm =  new FormData(this);

	dataForm.append('lead_added_by_id',getFromStorage(EMPLOYEE_ID));

	dataForm.append('lead_added_by_name',getFromStorage(EMPLOYEE_NAME));

	if(uploadLeadType === '' || uploadLeadType === undefined){

		alert('Lead upload not allowed here!');

		return;
	}

	dataForm.append('lead_type',uploadLeadType);

	postFormData(dataForm,UPLOAD_CSV_LEAD_API).then(function(response){

		$('#uploadCsvLeads').prop('disabled', false);
		
		$('#import_modal').modal('hide');	

		$('#import_result_modal').modal({
			backdrop: 'static',
			keyboard: false
		});

		let result = JSON.parse(response);

		$('#total_count_results').text('Total Leads- '+result.ExtraMessage.totalCount);

		$('#total_count_failed').text('Total Leads Failed -'+result.ExtraMessage.failureCount);

		$('#total_count_success').text('Total Leads Success -'+result.ExtraMessage.successCount);

		i =0;

		$.each(result.ExtraMessage, function() {
			if(result.ExtraMessage[i] != undefined)
				$('#div_result').append('<label class="form-control" >'+ result.ExtraMessage[i] + '</label>');
			i++;
		});

		$('#import_result_modal').modal('show');

		console.log(result.ExtraMessage);

	}).catch(function(err){

		console.log(err);

		$('#uploadCsvLeads').prop('disabled', false);
		
	});

		
});

$('#reloadPage').click(function() {
    location.reload();
});

$("#mass_select_all").change(function() {

	$('#'+tableIdName+' tr').removeClass('selected');

    if(this.checked) {

		$('#'+tableIdName+' tr').toggleClass('selected');
		
        $('.active-cb').prop('checked', true);

    }else{

        $('.active-cb').prop('checked', false);

	}

});

$('#assign_leads_button').click(function(){

	assignLeadids = $.map(leadDataTable.rows('.selected').data(), function (item) {

		return item['lead_id'];

	});

	console.log(assignLeadids);

	$('#assign_leads_modal').modal('show');

	$('#assign_leads_count').text('Assign ('+assignLeadids.length+') Leads');

	if(assignLeadids.length === 0)
		$('#submitAssignLeads').prop('disabled', true);
	else
		$('#submitAssignLeads').prop('disabled', false);


});

$('#submitAssignLeads').click(function(){

	event.preventDefault();

	$('#submitAssignLeads').prop('disabled', true);

	var assignLeadMap = new Map();

	assignLeadMap.set("leadIds", assignLeadids);
	assignLeadMap.set("assigned_by", getFromStorage(EMPLOYEE_NAME));
	assignLeadMap.set("assigned_by_id", getFromStorage(EMPLOYEE_ID));
	assignLeadMap.set("emp_id", $('#assign_lead_select option:selected').val());
	assignLeadMap.set("assigned_to", $('#assign_lead_select option:selected').text());
	
	var assignLeadForm = createForm(assignLeadMap);

	postFormData(assignLeadForm, ASSIGN_LEADS_API).then(function(response){

		console.log("recieved"+response);
		let result = JSON.parse(response);
		console.log(result);
		
		if(result.status === 200){

			$('#assign_result').append('<label>Success Count - '+result.body.successCount+'</label><br>');
			$('#assign_result').append('<label>Failure Count - '+result.body.failureCount+'</label><br>');
			$('#assign_result').append('<label>Total Count - '+result.body.totalCount+'</label><br>');
			$('#assign_result').append('<label>Note:- </lable> If you see failed count more than 0 contact admin to check the log.');

			leadDataTable.ajax.reload();

		}else{
			alert(result.message);
		}
	}).catch(function(err){
		console.log(err.responseText);
	});

});

$('.search-input-text').on( 'keypress', function (e) {   // for text boxes
    
    if(e.keyCode == 13){
        var i =$(this).attr('data-column');
        var v =$(this).val(); 
        isFilter = v === '' && ($('#start_date').val() === '' && $('#end_date').val() ==='' ) && ($('#lastCallStartTime').val() === '' && $('#lastCallEndTime').val() ==='' )  ? 'false' : 'true';
        setCustomData();
        if(isFilter === 'true'){
            leadDataTable.columns(i).search(v).draw();
        }else if(v === ''){
            leadDataTable.ajax.reload();
        }	
	}
	
});
    
/*datepicker*/
jQuery('.mydatepicker').datepicker();
jQuery('#datepicker-autoclose').datepicker({
    autoclose: true,
    todayHighlight: true,
    format: 'yyyy/mm/dd'
});

//Add New Lead
function addLead(){
	
	var sendForm =document.getElementById('add_lead_form');
	var dataForm =  new FormData(sendForm);
	dataForm.append('lead_added_by_id',getFromStorage(EMPLOYEE_ID));
	dataForm.append('lead_added_by_name',getFromStorage(EMPLOYEE_NAME));

	postFormData(dataForm, ADD_LEAD_API).then(function(response){
		console.log("recieved"+response);
		let result = JSON.parse(response);
		console.log(result);
		
		if(result.status === 200){
			$('#add_lead_form')[0].reset();
			$('#add_lead_modal').modal('hide');
			$('#'+tableIdName).DataTable().ajax.reload();

			toastr.success(result.message);
			
		}else{
			alert(result.message);
		}
	}).catch(function(err){
		console.log(err.responseText);
	});
}

//Update Lead
function updateLead(){
	
	var sendForm =document.getElementById('add_lead_form');
	var dataForm =  new FormData(sendForm);

	dataForm.append('status_changed_by',getFromStorage(EMPLOYEE_NAME));

	var update_lead_id = data.lead_id;

	console.log(update_lead_id);

	var url = UPDATE_LEAD_API + "/" + update_lead_id;
	console.log(url);

	postFormData(dataForm, url).then(function(response){
		console.log("recieved"+response);
		let result = JSON.parse(response);
		console.log(result);
		
		if(result.status === 200){
			$('#add_lead_form')[0].reset();
			$('#add_lead_modal').modal('hide');
			$('#'+tableIdName).DataTable().ajax.reload();

			toastr.success(result.message);
			
		}else{
			alert(result.message);
		}
	}).catch(function(err){
		console.log(err.responseText);
	});
}

//Convert Lead To Contact/Account
function convertLeadToContact(){
	event.preventDefault(); //For AJAX
	var sendForm =document.getElementById('convert_lead_to_contact_form');
	var dataForm =  new FormData(sendForm);
	dataForm.append('status_changed_by',getFromStorage(EMPLOYEE_NAME));

	var convert_to_contact_lead_id = data.lead_id;

	console.log(convert_to_contact_lead_id);

	var url = CONVERT_LEAD_TO_CONTACT_API + "/" + convert_to_contact_lead_id;
	console.log(url);

	postFormData(dataForm, url).then(function(response){
		console.log("recieved"+response);
		let result = JSON.parse(response);
		console.log(result);
		
		if(result.status === 200){
			$('#convert_lead_to_contact_form')[0].reset();
			$('#leads_view_action_modal').modal('hide');
			$('#'+tableIdName).DataTable().ajax.reload();

			toastr.success(result.message);
			
		}else{
			alert(result.message);
		}
	}).catch(function(err){
		console.log(err.responseText);
	});
}

//Change Lead Status to DND/DISPOSED
function updateLeadStatus(){
	event.preventDefault(); //For AJAX
	var leadStatusMap = new Map();

	var lead_status = $('#lead_status').val();
	var update_lead_id = data.lead_id;
	
	console.log("Lead to be updated:"+update_lead_id);
	console.log("Sending status:"+lead_status);
	
	leadStatusMap.set("lead_id", update_lead_id);
	leadStatusMap.set("status_changed_by", getFromStorage(EMPLOYEE_NAME));


	console.log(lead_status);
	console.log(leadStatusMap);

	var updateLeadStatusForm = createForm(leadStatusMap);

    console.log(updateLeadStatusForm);

	var url = UPDATE_LEAD_STATUS_API + "/" + lead_status;
	console.log(url);
	postFormData(updateLeadStatusForm, url).then(function(response){
		console.log("recieved"+response);
		let result = JSON.parse(response);
		console.log(result);

		if(result.status === 200){
			$('#form_leads_view_action_modal')[0].reset();
			$('#leads_view_action_modal').modal('hide');
			$('#'+tableIdName).DataTable().ajax.reload();

			toastr.success(result.message);

		}else{
			alert(result.message);
		}
	}).catch(function(err){
		console.log(err.responseText);
	});
	return false;
}

//Book Free Trial
function bookFreeTrial(){
	event.preventDefault(); //For AJAX
	var sendForm =document.getElementById('add_freetrial_form');
	var dataForm =  new FormData(sendForm);
	var free_trial_lead_id = data.lead_id;
	var days = '1';

	dataForm.append('emp_fk',getFromStorage(EMPLOYEE_ID));
	dataForm.append('booked_by',getFromStorage(EMPLOYEE_NAME));
	dataForm.append('lead_fk',free_trial_lead_id);
	dataForm.append('service_name',$('#free_trial_service option:selected').text());
	dataForm.append('days',days);

	console.log(dataForm);
	
	console.log("Booking free trial for Lead: "+free_trial_lead_id);

	var url = BOOK_FREE_TRIAL_API + "/" + free_trial_lead_id;
	console.log("url:"+url);

	postFormData(dataForm, url).then(function(response){
		console.log("recieved"+response);
		let result = JSON.parse(response);
		console.log(result);
		
		if(result.status === 200){
			$('#add_freetrial_form')[0].reset();
			$('#leads_view_action_modal').modal('hide');
			$('#'+tableIdName).DataTable().ajax.reload();

			toastr.success(result.message);
			
		}else{
			alert(result.message);
		}
	}).catch(function(err){
		console.log(err.responseText);
	});
}

function addCallDescription(){

	var sendForm =document.getElementById('add_call_description_form');
	var dataForm =  new FormData(sendForm);

	console.log("Lead Id: "+data.lead_id);

	var calling_time = generateCurrentTimestamp();

	console.log(calling_time);

	dataForm.append('lead_fk',data.lead_id);
	dataForm.append('calling_time',calling_time);
	dataForm.append('latest','1');
	dataForm.append('emp_fk',data.emp_fk);

	console.log("Data Form: "+dataForm);

	var url = ADD_CALL_DESCRIPTION_API + "/" + data.lead_id;

	console.log(url);

	postFormData(dataForm, url).then(function(response){
		console.log("recieved"+response);
		let result = JSON.parse(response);
		console.log(result);
		
		if(result.status === 200){
			$('#add_call_description_form')[0].reset();
			$('#add_call_description_modal').modal('hide');
			$('#'+tableIdName).DataTable().ajax.reload();

			toastr.success(result.message);

		}else{
			alert(result.message);
		}
	}).catch(function(err){
		console.log(err.responseText);
	});

}

//Submit Sales Order Function
function submitSalesOrder(){
	event.preventDefault();
	var sendForm =document.getElementById('form_sales_order');
	var dataForm =  new FormData(sendForm);

	console.log("Lead Id: "+data.lead_id);

	var payment_timestamp = generateCurrentTimestamp();

	console.log(payment_timestamp);

	dataForm.append('lead_fk',data.lead_id);
	dataForm.append('payment_timestamp',payment_timestamp);
	
	dataForm.append('order_status','PENDING');

	dataForm.append('service_name',$('#sales_service_fk option:selected').text());
	dataForm.append('payment_acc',$('#payment_bank_fk option:selected').text());

	dataForm.append('booked_by_id',getFromStorage(EMPLOYEE_ID));
	dataForm.append('booked_by_name',getFromStorage(EMPLOYEE_NAME));

	console.log("Data Form: "+dataForm);

	postFormData(dataForm, ADD_SALESORDER_API).then(function(response){
		console.log("recieved"+response);
		let result = JSON.parse(response);
		console.log(result);
		
		if(result.status === 200){
			$('#form_sales_order')[0].reset();
			$('#leads_view_action_modal').modal('hide');
			$('#'+tableIdName).DataTable().ajax.reload();

			toastr.success(result.message);

		}else{
			alert(result.message);
		}
	}).catch(function(err){
		console.log(err.responseText);
		toastr.error("Something went wrong. Please try again.");
	});

}

//Send SMS
function sendSms(){
	event.preventDefault(); //For AJAX
	var sendForm =document.getElementById('send_sms_form');
	var dataForm =  new FormData(sendForm);
	
	dataForm.append('mobile',data.mobile)

	postFormData(dataForm, SEND_SMS_API).then(function(response){
		console.log("recieved"+response);
		let result = JSON.parse(response);
		console.log(result);
		console.log(result.message);
		
		if(result.status === 200){
			$('#send_sms_form')[0].reset();
			$('#leads_view_action_modal').modal('hide');
			$('#'+tableIdName).DataTable().ajax.reload();

			toastr.success(result.message);
			
		}else{
			alert(result.message);
		}
	}).catch(function(err){
		console.log(err.responseText);
	});
}

//Send SMS
function sendMail(){
	event.preventDefault(); //For AJAX
	var sendForm =document.getElementById('send_mail_form');
	var dataForm =  new FormData(sendForm);
	
	dataForm.append('userType',userType);
	dataForm.append('empId',getFromStorage(EMPLOYEE_ID));
	dataForm.append('email_to',data.email);
	dataForm.append('name',COMAPNY_NAME);

	postFormData(dataForm, SEND_MAIL_API).then(function(response){
		console.log("recieved"+response);
		let result = JSON.parse(response);
		console.log(result);
		console.log(result.message);
		
		if(result.status === 200){
			$('#send_mail_form')[0].reset();
			$('#leads_view_action_modal').modal('hide');
			$('#'+tableIdName).DataTable().ajax.reload();

			toastr.success(result.message);
			
		}else{
			alert(result.message);
		}
	}).catch(function(err){
		console.log(err.responseText);
	});
}



//Toggle Callback Input Fields
$('select[name=call_status]').change(function(){

    if($(this).val() === 'CALLBACK'){
        $('#datepicker_autoclose_callback_date').attr('disabled', false);
        $('#callback_time').attr('disabled', false);
    }else{
        $('#datepicker_autoclose_callback_date').attr('disabled', true);
        $('#callback_time').attr('disabled', true);
    }
    
});

//Fill SMS Category Dropdwon data
function fillSMSCategoryDropdownData(dbTableName, inputSelectId){

    fetch_full_table_global(dbTableName).then(function(dropdownResultData){

        console.log(dropdownResultData);
        
		$('#'+inputSelectId+'').find('option').remove().end();
		
		//Adding No Selection Option

		$('#'+inputSelectId+'').append($("<option/>").attr("value", "0").text("Select a category"));

        dropdownResultData.forEach(function(data, index){
            
            console.log(data.cat_id);
            console.log(data.category);
            
            var updateOptionVarData = $("<option/>").attr("value", data.cat_id).text(data.category);
            
            $('#'+inputSelectId+'').append(updateOptionVarData);
            
		});

    }).catch(function(err){

    });
}

//Fetching SMS Template dropdown on change of SMS Categroy
$('#sms_category_select').on('change', function() {

	var selectedOptionValue = $('#sms_category_select').val();

	console.log(selectedOptionValue);

	//Clear any previous Content
	$('#message').text('');

	fillSMSTemplateDropdownData('sms_template', 'sms_template_select', selectedOptionValue);

  });


//Fill SMS Template Dropdown Data
function fillSMSTemplateDropdownData(dbTableName, inputSelectId, selectedOptionValue){

    fetch_table_with_where_global(dbTableName, 'cat_fk', selectedOptionValue).then(function(dropdownResultData){

        console.log(dropdownResultData);
        
        $('#'+inputSelectId+'').find('option').remove().end();

		//Adding No Selection Option

		$('#'+inputSelectId+'').append($("<option/>").attr("value", "0").text("Select a template"));

        dropdownResultData.forEach(function(data, index){
            
            console.log(data.smstemp_id);
            console.log(data.template_name);
            
            var updateOptionVarData = $("<option/>").attr("value", data.smstemp_id).text(data.template_name);
            
            $('#'+inputSelectId+'').append(updateOptionVarData);
            
		});

    }).catch(function(err){

    });
}

//Fetch SMS Content
$('#sms_template_select').change(function(){

	console.log("Fetch SMS content here...");
	var selectedTemplateID = $('#sms_template_select').val();
	console.log(selectedTemplateID);
	//Fetch SMS Content
	fetchDropdownBasedContent('sms_template','message', selectedTemplateID);
    
});

//Fetch SMS Content Function
function fetchDropdownBasedContent(dbTableName,smsElementID, selectedOptionValue){

	fetch_table_with_where_global(dbTableName, 'smstemp_id', selectedOptionValue).then(function(contentResultData){

        console.log(contentResultData);
        
        $('#'+smsElementID+'').text(contentResultData[0].content);

    }).catch(function(err){

	});
	
}

//=========== Email Tab Begin ================

//Fill Mail Category Dropdwon data
function fillMailCategoryDropdownData(dbTableName, inputSelectId){

    fetch_full_table_global(dbTableName).then(function(dropdownResultData){

        console.log(dropdownResultData);
        
		$('#'+inputSelectId+'').find('option').remove().end();
		
		//Adding No Selection Option

		$('#'+inputSelectId+'').append($("<option/>").attr("value", "0").text("Select a category"));

        dropdownResultData.forEach(function(data, index){
            
            console.log(data.cat_id);
            console.log(data.category);
            
            var updateOptionVarData = $("<option/>").attr("value", data.cat_id).text(data.category);
            
            $('#'+inputSelectId+'').append(updateOptionVarData);
            
		});

    }).catch(function(err){

    });
}

//Fetching Email Template dropdown on change of SMS Categroy
$('#mail_category_select').on('change', function() {

	var selectedOptionValue = $('#mail_category_select').val();

	console.log(selectedOptionValue);

	//Clear any previous Content
	$('#mail_subject').val('');
	$('#mail_body').text('');

	fillMailTemplateDropdownData('mail_template', 'mail_template_select', selectedOptionValue);

});

//Fill Mail Template Dropdown Data
function fillMailTemplateDropdownData(dbTableName, inputSelectId, selectedOptionValue){

    fetch_table_with_where_global(dbTableName, 'cat_fk', selectedOptionValue).then(function(dropdownResultData){

        console.log(dropdownResultData);
        
        $('#'+inputSelectId+'').find('option').remove().end();

		//Adding No Selection Option
		$('#'+inputSelectId+'').append($("<option/>").attr("value", "0").text("Select a template"));

        dropdownResultData.forEach(function(data, index){
            
            console.log(data.mailtemp_id);
            console.log(data.template_name);
            
            var updateOptionVarData = $("<option/>").attr("value", data.mailtemp_id).text(data.template_name);
            
            $('#'+inputSelectId+'').append(updateOptionVarData);
            
		});

    }).catch(function(err){

    });
}

//Fetch Mail Content
$('#mail_template_select').change(function(){

	console.log("Fetch Mail content here...");
	var selectedTemplateID = $('#mail_template_select').val();
	console.log(selectedTemplateID);
	
	//Fetch Mail Content
	fetchDropdownBasedMailContent('mail_template', selectedTemplateID);
    
});

//Fetch Mail Content Function
function fetchDropdownBasedMailContent(dbTableName, selectedOptionValue){

	fetch_table_with_where_global(dbTableName, 'mailtemp_id', selectedOptionValue).then(function(contentResultData){

        console.log(contentResultData);
        
        $('#mail_subject').val(contentResultData[0].mail_head);
        $('#mail_body').text(contentResultData[0].content);

    }).catch(function(err){

	});	
}
//=========== Email Tab End ================

// ========================================
// Free Trials Tab

//Fill Free Trials Services Dropdown
//var inputSelectId = 'free_trial_service';

function fillServicesDropdownData(dbTableName, inputSelectId){

    fetch_full_table_global(dbTableName).then(function(dropdownResultData){

        console.log(dropdownResultData);
        
		$('#'+inputSelectId+'').find('option').remove().end();
		
		//Adding No Selection Option
		$('#'+inputSelectId+'').append($("<option/>").attr("value", "0").text("Choose an option"));

        dropdownResultData.forEach(function(data, index){
            
            console.log(data.service_id);
            console.log(data.service_name);
            
            var updateOptionVarData = $("<option/>").attr("value", data.service_id).text(data.service_name);
            
            $('#'+inputSelectId+'').append(updateOptionVarData);
            
        });

    }).catch(function(err){

    });
}

// ========================================
// Saleorder Tab - Package Amount

$('#sales_service_fk').change(function(){

	var selectedServiceID = $('#sales_service_fk').val();
	console.log(selectedServiceID);

	//Clear any previous pacage amount and reset to 0
	$('#sales_package_amt').val(0);

	$('#sales_package_name').val(0);

	console.log("============"+selectedServiceID);

	//Toggle Package Types Disabled Property
	if(selectedServiceID != 0){
		$('#sales_package_name').attr('disabled',false);
	}
	else{
		$('#sales_package_name').attr('disabled',true);
	}
	
    
});

//Fetch Package Amount
$('#sales_package_name').change(function(){

	console.log("Fetch Package Amt. here...");

	var selectedServiceID = $('#sales_service_fk').val();
	console.log(selectedServiceID);

	var package_type = $('#sales_package_name').val();
	
	//Fetch Mail Content
	fetchDropdownBasedPackageAmount('services', selectedServiceID, package_type);
    
});

//Fetch Package Amount Function
function fetchDropdownBasedPackageAmount(dbTableName, selectedOptionValue, package_type){

	fetch_table_with_where_global(dbTableName, 'service_id', selectedOptionValue).then(function(contentResultData){

        console.log(contentResultData);
		if(package_type == 'MONTHLY'){
			$('#sales_package_amt').val(contentResultData[0].package_monthly);
		}
		else{
			if(package_type == 'QUATERLY'){
				$('#sales_package_amt').val(contentResultData[0].package_quaterly);
			}
			else{
				if(package_type == 'HALFYEARLY'){
					$('#sales_package_amt').val(contentResultData[0].package_halfyearly);
				}
				else{
					if(package_type == 'YEARLY'){
						$('#sales_package_amt').val(contentResultData[0].package_yearly);
					}
					else{
						$('#sales_package_amt').val(0);
					}
				}
			}
		}	
		

    }).catch(function(err){

	});	
}

//Calculate total service days Begins
$('#datepicker_service_start_date').change(function(){

	var startDate =$('#datepicker_service_start_date').val();
	var endDate = $('#datepicker_service_end_date').val();

	var total_days = calcuclateDays(startDate, endDate);

	$('#sales_total_days').val(total_days+1);
    
});

$('#datepicker_service_end_date').change(function(){

	var startDate =$('#datepicker_service_start_date').val();
	var endDate = $('#datepicker_service_end_date').val();

	var total_days = calcuclateDays(startDate, endDate);

	$('#sales_total_days').val(total_days+1);
    
});
//Calculate total service days Ends


//Fill Bank Account Dropdown
function fillBankAccountDropdownData(dbTableName, inputSelectId){

    fetch_full_table_global(dbTableName).then(function(dropdownResultData){

        console.log(dropdownResultData);
        
        $('#'+inputSelectId+'').find('option').remove().end();

        dropdownResultData.forEach(function(data, index){
            
            console.log(data.acc_id);
            console.log(data.bank_name);
            
            var updateOptionVarData = $("<option/>").attr("value", data.acc_id).text(data.bank_name);
            
            $('#'+inputSelectId+'').append(updateOptionVarData);
            
        });

    }).catch(function(err){

    });
}

// Create Call Description Timeline
function createCallDesriptionTimelineView(parentClassName){


	return new Promise(function(resolve, reject) {
		var fetchCallDescriptionMap = new Map();
		fetchCallDescriptionMap.set("lead_id", data.lead_id );

		console.log(fetchCallDescriptionMap);	

		getFromServer(fetchCallDescriptionMap, GET_LEADS_CALL_DESCRIPTION_API).then(function(response){
			console.log("recieved"+response);
			let result = JSON.parse(response);
			console.log(result);
			var data = result.body;
			console.log(data.length);
			
			if(result.status === 200){
				
				//console.log(data[0]);
				$('.'+parentClassName+'').empty();
				if(data.length){
					
					$('#calling_timeline_title').text("Calling Timeline");
					var tempToggle = false;
					
					data.forEach(function(value, index){
						
						tempToggle = !tempToggle;
							
						var temp_calling_time = value.calling_time;
						var temp_call_status = value.call_status;
						var temp_description = value.description;
						var temp_callback_date = value.callback_date;
						var temp_callback_time = value.callback_time;

						//console.log(temp_calling_time);
						if(tempToggle){
							$('.'+parentClassName+'').prepend('<div class="container left"><div class="content"><h4 class="timeline_calling_time">'+temp_calling_time+'</h4><p><strong>Call Status:</strong><span class="timeline_call_status">'+temp_call_status+'</span></p><p><strong>Callback Date:</strong><span class="timeline_callback_date">'+temp_callback_date+'</span></p><p><strong>Callback Time:</strong><span class="timeline_callback_time">'+temp_callback_time+'</span></p><p class="timeline_call_description">'+temp_description+'</p></div></div>');
						}
						else{
							$('.'+parentClassName+'').prepend('<div class="container right"><div class="content"><h4 class="timeline_calling_time">'+temp_calling_time+'</h4><p><strong>Call Status:</strong><span class="timeline_call_status">'+temp_call_status+'</span></p><p><strong>Callback Date:</strong><span class="timeline_callback_date">'+temp_callback_date+'</span></p><p><strong>Callback Time:</strong><span class="timeline_callback_time">'+temp_callback_time+'</span></p><p class="timeline_call_description">'+temp_description+'</p></div></div>');
						}	
						
					});
				}
				else{
					$('#calling_timeline_title').text("It seems like you haven't made any calls to this number!");
				}
				
				resolve(result.body);

			}else{
				reject(result.message);	
			}
		}).catch(function(err){
			console.log(err.responseText);
		});
	});




	
}


// =======================================
// Datepicker For Call Back Date
$('#datepicker_autoclose_callback_date').datepicker({
	autoclose: true,
	todayHighlight: true,
	format: 'yyyy/mm/dd'
});

// Datepicker For DOB in Convert to Contact Form
$('#datepicker_autoclose_contact_dob').datepicker({
	autoclose: true,
	todayHighlight: true,
	format: 'yyyy/mm/dd'
});

// Datepicker For Free Trial Start Date
$('#free_trial_start_date').datepicker({
	autoclose: true,
	todayHighlight: true,
	format: 'yyyy/mm/dd'
});

// Datepicker For Free Trial End Date
$('#free_trial_end_date').datepicker({
	autoclose: true,
	todayHighlight: true,
	format: 'yyyy/mm/dd'
});

// Datepicker For Sales Service Start Date
$('#datepicker_service_start_date').datepicker({
	autoclose: true,
	todayHighlight: true,
	format: 'yyyy/mm/dd'
});

// Datepicker For Sales Service End Date
$('#datepicker_service_end_date').datepicker({
	autoclose: true,
	todayHighlight: true,
	format: 'yyyy/mm/dd'
});

// Datepicker For Sales Payment Date
$('#datepicker_payment_date').datepicker({
	autoclose: true,
	todayHighlight: true,
	format: 'yyyy/mm/dd'
});

// Self Assigned Leads 
function fetchSelfLeads(leadType){

	var self_assign_lead_limit;

	switch (leadType) {
	case "WEB":
		self_assign_lead_limit = 1; //Update Limit
		break;
	case "SMO":
		self_assign_lead_limit = 2; // Update Limit
		break;
	case  "AONE":
		self_assign_lead_limit = 3; // Update Limit
	}

	var dataForm =  new FormData();
	dataForm.append('emp_id',getFromStorage(EMPLOYEE_ID));
	dataForm.append('assigned_by',getFromStorage(EMPLOYEE_NAME));
	dataForm.append('assigned_to',getFromStorage(EMPLOYEE_NAME));
	dataForm.append('lead_type',leadType);
	dataForm.append('lead_count',self_assign_lead_limit);

	postFormData(dataForm,ASSIGN_LEADS_TO_SELF_API).then(function(response){

		toastr.info('Checking leads!!!');

		let result = JSON.parse(response);

		toastr.success(result.body);

		leadDataTable.ajax.reload();



	}).catch(function(err){

		console.log(err);
		
	});

	
}
