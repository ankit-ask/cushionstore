var selectEmployeeId=$("#emp_fk");
var updateOptionVarData;
var tableIdName;
var dropdownDataType;

var isFilter = 'false';
var targetDataTable;
var customSendData = {};

function setCustomData(){
    customSendData.emp_name = $('#nameSearch').val();
    customSendData.month = $('#monthSearch').val();
    customSendData.assigned_by_name = $('#assignedBySearch').val();
    customSendData.isFilter = isFilter;
    // For Session Wise Data
    customSendData.userType = userType;
	customSendData.empId = getFromStorage(EMPLOYEE_ID);
}

function init(tableIdName,methodName){
    
    this.tableIdName = tableIdName;

    setCustomData();

    customTableDef = {
		columns: [
            {data: 'emp_name'},
			{data: 'emp_fk'},
			{data: 'target_assigned'},
			{data: 'assigned_by'},
			{data: 'month'},
			{data: 'achieved_percent'},
            {data: 'achieved_value'},
			{
				"data": null,
				"defaultContent": "<button class='btn btn-danger btn-xs deleteTargetBtn jsr-cmd-btn'>DELETE</button>"
			}
		]
	};

    targetDataTable = createListDataTable(tableIdName, methodName, customSendData, 10,customTableDef);

    dropdownDataType = 'DSH'; //Change as per Session User Type

	//fillTargetEmployeeDropdownData('employee');
	//fillTargetEmployeeDropdownData(userType, getFromStorage(EMPLOYEE_ID));
	
	getFormattedEmployeeDropdown(userType, getFromStorage(EMPLOYEE_ID));


    //Edit Target Button Function
	// $('#'+tableIdName).on( 'click', '.editTargetBtn', function () {
	// 	data = dropdownDataType.row( $(this).parents('tr') ).data();
	// 	console.log(data);

	// 	$('#update_target_modal').modal('show');
	// 	$('#update_template_name').val(data.target_assigned);
    // });
    
    // Delete SMS Template Button Function
	$('#'+tableIdName).on( 'click', '.deleteTargetBtn', function () {
		data = targetDataTable.row( $(this).parents('tr') ).data();
		console.log(data);

		if (confirm("Are you sure you want to Delete this target?")) {
			deleteGlobal('target', tableIdName, 'id', data.id );
		}
	
	});
}

$('.search-input-text').on( 'keypress', function (e) {   // for text boxes
    
    if(e.keyCode == 13){
        var i =$(this).attr('data-column');
        var v =$(this).val(); 
        isFilter = v === '' ? 'false' : 'true';
        setCustomData();
        if(isFilter === 'true'){
            targetDataTable.columns(i).search(v).draw();
        }else if(v === ''){
            targetDataTable.ajax.reload();
        }	
    }
});

//Employee Dropdown
// function fillTargetEmployeeDropdownData(userType, empId){

//    fetch_full_table_global(dbTableName).then(function(dropdownResultData){

//         console.log(dropdownResultData);
        
//         $('#emp_fk').find('option').remove().end();

//         dropdownResultData.forEach(function(data, index){
            
//             console.log(data.emp_id);
//             console.log(data.name);
            
//             var updateOptionVarData = $("<option/>").attr("value", data.emp_id).text(data.name);
            
//             $('#emp_fk').append(updateOptionVarData);
            
//         });

//     }).catch(function(err){

//     });
// }

//Add New Target
function addTarget(){
	event.preventDefault(); //For AJAX
	var sendForm =document.getElementById('add_target_form');
	var dataForm =  new FormData(sendForm);
	dataForm.append('emp_name',$('#emp_fk option:selected').text());
	dataForm.append('assigned_by',getFromStorage(EMPLOYEE_ID));
	dataForm.append('assigned_by_name',getFromStorage(EMPLOYEE_NAME));
	
	console.log(dataForm);

	postFormData(dataForm, ADD_TARGET_API).then(function(response){
		console.log("recieved"+response);
		let result = JSON.parse(response);
		console.log(result);
		console.log(result.message);
		
		if(result.status === 200){
			$('#add_target_form')[0].reset();
			$('#add_target_modal').modal('hide');

			toastr.success(result.message);

            $('#'+tableIdName).DataTable().ajax.reload();
			
		}else{
			alert(result.message);
		}
	}).catch(function(err){
		console.log(err.responseText);
	});
}

// Datepicker For Target Month
$('#datepicker_freetrial_month').datepicker({
	autoclose: true,
    todayHighlight: true,
    minViewMode: 1,
    format: "mm/yyyy"
});


//Get Formatted Dropdown Data

function getFormattedEmployeeDropdown(userType, empId){

	//event.preventDefault(); //For AJAX
	var fetchFormattedEmployeeMap = new Map();
	fetchFormattedEmployeeMap.set("userType", userType);
	fetchFormattedEmployeeMap.set("empId", empId );

    console.log(fetchFormattedEmployeeMap);
	var fetchFormattedEmpForm = createForm(fetchFormattedEmployeeMap);
    console.log(fetchFormattedEmpForm);

	postFormData(fetchFormattedEmpForm, EMPLOYEE_FORMATTED_DROPDOWN_GET_API).then(function(response){
		console.log("recieved"+response);
		let result = JSON.parse(response);
		console.log("Formatted Dropdown Data:-")
		console.log(result);
		console.log("===============");
		
		if(result.status === 200){
			console.log(response);
			console.log(result.body.length);
			console.log(result.body[0]);

			var item = result.body;
        
			$('#emp_fk').find('option').remove().end();

			item.forEach(function(value, index){
				
			console.log(value);
				
			var updateOptionVarData = $("<option/>").attr("value", value.emp_id).text(value.name);
				
				 $('#emp_fk').append(updateOptionVarData);
				
			});
			
		}else{
			alert(result.message);
		}
	}).catch(function(err){
		console.log(err.responseText);
	});
	return false;
}