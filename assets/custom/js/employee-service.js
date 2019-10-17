var isFilter = 'false';
var selectManagedByName=$("#managed_by_name");
var selectManagedById=$("#managed_by_id");
var updateSelectManagedByName=$("#update_managed_by_name");
var updateSselectManagedById=$("#update_managed_by_id");
var employeeDataTable;
var customSendData = {};

function setCustomData(){
    customSendData.designation = $('#designationSearch').val();
    customSendData.user_type = $('#userTypeSearch').val();
    customSendData.name = $('#nameSearch').val();
    customSendData.startDate = $('#start_date').val();
    customSendData.endDate = $('#end_date').val();
    customSendData.managed_by_name = $('#managedBySearch').val();
    // For Session Wise Data
    customSendData.userType = userType;
	customSendData.empId = getFromStorage(EMPLOYEE_ID);
    customSendData.isFilter = isFilter;
}

function init(API_NAME){
    
    setCustomData();
    if(userType === 'ADMIN' || userType === 'DSH'){
        customTableDef = {
            columns: [
                {data: 'emp_id'},
                {data: 'name'},
                {data: 'designation'},
                {data: 'user_type'},
                {data: 'managed_by_name'},
                {data: 'managed_by_id'},
                {data: 'joining_date'},
                {data: 'mobile'},
                {data: 'email'},
                {data: 'address'},
                {data: 'lead_capacity'},
                {data: 'username'},
                {data: 'password'},
                {
                    "data": null,
                    "defaultContent": "<button class='btn btn-warning btn-xs editActiveEmp jsr-cmd-btn'>EDIT</button><button class='btn btn-info btn-xs viewStatsEmp jsr-cmd-btn'>VIEW STATS</button><button class='btn btn-danger btn-xs inactiveActiveEmp jsr-cmd-btn'>INACTIVE</button>"
                }
            ]
        };
    }
    else{
        $('#commands-th').hide();
        customTableDef = {
            columns: [
                {data: 'emp_id'},
                {data: 'name'},
                {data: 'designation'},
                {data: 'user_type'},
                {data: 'managed_by_name'},
                {data: 'managed_by_id'},
                {data: 'joining_date'},
                {data: 'mobile'},
                {data: 'email'},
                {data: 'address'},
                {data: 'lead_capacity'},
                {data: 'username'},
                {data: 'password'}
            ]
        };
    }
    

    employeeDataTable = createListDataTable('employee_table', API_NAME, customSendData, 10, customTableDef);

    $('.input-daterange').datepicker({
		todayBtn:'linked',
		format: "yyyy/mm/dd",
		autoclose: true
    });
    
    if (userType != undefined) {
        if (userType === 'ADMIN' || userType === 'DSH') {
            $("#add_emp_button").show();
        } else {
            $("#add_emp_button").hide();
        }
    } else {
        console.log("No userType Found");
    }
    
    //employeeDataTable = createDataTable('employee_table', API_NAME, customSendData, 10);
    
    // $('.search-input-select').on( 'change', function () {   // for select box
    // 	var i =$(this).attr('data-column');
    // 	var v =$(this).val();
    // 	employeeDataTable.columns(i).search(v).draw();  
    // });  
    
    //EDIT Button Operations
	$('#employee_table tbody').on( 'click', '.editActiveEmp', function () {
        var data = employeeDataTable.row( $(this).parents('tr') ).data();
        
		var tempSelectedEmpID = data.managed_by_id;
		console.log("Emp Managed By Id:" +tempSelectedEmpID);
		console.log(data);
	
		//Checking User Type for Managed By Dropdown Data
		var selectedUserType = data.user_type;
		console.log("Selected Employee UserType: "+selectedUserType);
	
		if(selectedUserType === 'DSH' || selectedUserType === 'LEADMANAGER'){
			$("#update_managed_by_name option[value='ADMIN']").attr("selected","selected");
			//$("#update_managed_by_id").val("ADMIN");
		}
		else{
            $('#update_managed_by_name').find('option').remove().end();
			if(selectedUserType === 'MANAGER'){
				var updateDropdownDataType = 'DSH';
				
				//$("update_managed_by_name option[value=" + tempSelectedEmpID + "]").attr("selected","selected");
				console.log('Executed...');
				// $('select option[value="1"]').attr("selected",true);
			}
			else{
				var updateDropdownDataType = 'MANAGER';
				//$("update_managed_by_name option[value=" + tempSelectedEmpID + "]").attr("selected","selected");
				//$("#update_managed_by_name option[value=" + data[5] + "]").attr("selected","selected");
			}
	
			fillUpdateDropdownData(updateDropdownDataType);
	
            // $('#update_managed_by_name').find('option').remove().end();
            console.log("THis block executed...");
			// Change this !!!
            var oldOptionManagedByName = $("<option/>").attr("value", data.managed_by_id).text(data.managed_by_name);
            console.log(oldOptionManagedByName);
            $('#update_managed_by_name').append(oldOptionManagedByName);
            console.log("Managed by ID in Data: "+data.managed_by_id);
            $("#update_managed_by_name option[value=" + data.managed_by_id + "]").attr("selected","selected");
	
		}
	
		$('#update_employee_modal').modal('show');
		$('#update_employee_id').val(data.emp_id);
		$('#update_user_type').val(data.user_type);
		//$('#update_managed_by_name').val(data.managed_by_id);
		$('#update_managed_by_id').val(data.managed_by_id);
		$('#update_designation').val(data.designation);
		$('#update_name').val(data.name);
		$('#update_mobile').val(data.mobile);
		$('#update_email').val(data.email);
		$('#update_joining_date').val(data.joining_date);
		$('#update_address').val(data.address);
		$('#update_lead_capacity').val(data.lead_capacity);
		$('#update_username').val(data.username);
		$('#update_password').val(data.password);
	
    });
    
	//INACTIVE Button Operations	
	$('#employee_table tbody').on( 'click', '.inactiveActiveEmp', function () {
		var data = employeeDataTable.row( $(this).parents('tr') ).data();
		console.log(data[1]);
		console.log(data);
	
		$('#update_employee_status_modal').modal('show');
		$('#update_employee_status_id').val(data.emp_id);
		$('#update_employee_status_name').val(data.name);
		$('#update_employee_status_type').val(data.user_type);
	
    });
    
    //VIEW STATS Button Operations
	$('#employee_table tbody').on( 'click', '.viewStatsEmp', function () {
		var data = employeeDataTable.row( $(this).parents('tr') ).data();
		console.log(data.emp_id);
        console.log(data);
        alert("Coming Soon :)");
	
		// $('#update_employee_status_modal').modal('show');
		// $('#update_employee_status_id').val(data[1]);
	
	});
}


$('.search-input-text').on( 'keypress', function (e) {   // for text boxes
    
    if(e.keyCode == 13){
        var i =$(this).attr('data-column');
        var v =$(this).val(); 
        isFilter = v === '' && ($('#start_date').val() === '' && $('#end_date').val() ==='' )  ? 'false' : 'true';
        setCustomData();
        if(isFilter === 'true'){
            employeeDataTable.columns(i).search(v).draw();
        }else if(v === ''){
            employeeDataTable.ajax.reload();
        }	
    }
});

$('#search').click(function(){
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();
    if(start_date != '' && end_date !='')
    {
        isFilter = 'true';
        setCustomData();
        // employeeDataTable.destroy();
        employeeDataTable.ajax.reload();
        // createTable();
    }
    else
    {
    alert("Both Date is Required");
}
});

$('#reset').click(function(){
    $('#start_date').val('');
    $('#end_date').val('');
    $('.search-input-text').val('');
    setCustomData();	
    employeeDataTable.ajax.reload();
});

//Change Managed By ID for Add Employee Modal on Managed By Name Change

$('select[name=managed_by_name]').change(function(){

    if($('#user_type').val() === 'DSH' || $('#user_type').val() === 'LEADMANAGER'){
        $('#managed_by_id').val('ADMIN');
    
    }else{
        var tempEmpId = $('select[name=managed_by_name]').val();
        console.log("-----"+tempEmpId);
        $('#managed_by_id').val(tempEmpId);
    }
    
});
    
    
//Change Managed By ID for Update Employee Modal on Managed By Name Change
$('select[name=update_managed_by_name]').change(function(){

    if($('#update_user_type').val() === 'DSH' || $('#update_user_type').val() === 'LEADMANAGER'){
        $('#update_managed_by_id').val('ADMIN');

    }else{
        var tempUpdateEmpId = $('select[name=update_managed_by_name]').val();
        $('#update_managed_by_id').val(tempUpdateEmpId);
    }

});
    
function fillDropdownData(dropdownDataType){
    fetch_dropdown(dropdownDataType).then(function(userDropdownData){
        console.log(userDropdownData);
        selectManagedByName.find('option').remove().end();
        
        var flag = 0;
        userDropdownData.forEach(function(data, index){
            console.log(data.emp_id);
            var optionManagedByName = $("<option/>").attr("value", data.emp_id).text(data.name+'('+data.mobile+')');
            
            selectManagedByName.append(optionManagedByName);
            
            if(!flag){
                $('#managed_by_id').val(data.emp_id);
            }
            flag++;
    
        });
    }).catch(function(err){

    });
}
    
function fillUpdateDropdownData(updateDropdownDataType){

    fetch_dropdown(updateDropdownDataType).then(function(userDropdownData){
        console.log("Fetch Dropdown function executed...");
        console.log(userDropdownData);
        
        // $('#update_managed_by_name').find('option').remove().end();

        userDropdownData.forEach(function(data, index){
            
            console.log(data.emp_id);
            
            var updateOptionManagedByName = $("<option/>").attr("value", data.emp_id).text(data.name+'('+data.mobile+')');
            
            updateSelectManagedByName.append(updateOptionManagedByName);
            
        });
        
        $("#update_managed_by_name option[value=" + data.managed_by_id + "]").attr("selected","selected");
        console.log("...."+data.managed_by_id);

    }).catch(function(err){

    });
}

$('select[name=user_type]').change(function(){

    if($(this).val() === 'DSH' || $(this).val() === 'LEADMANAGER'){
        $('#managed_by_name').find('option').remove().end();
            var optionManagedByName = $("<option/>").attr("value", "admin").text("ADMIN");
            selectManagedByName.append(optionManagedByName);
    
        $('#managed_by_id').val('ADMIN');
    
    }else{
        if($(this).val() === 'MANAGER'){
            var dropdownDataType = 'DSH';
            fillDropdownData(dropdownDataType);
    
        }else{
            var dropdownDataType = 'MANAGER';
            fillDropdownData(dropdownDataType);
    
        }
    }
    
});


//Set Employee Status to Inactive
function updateEmployeeStatus(){
	event.preventDefault(); //For AJAX
	var empStatusMap = new Map();
	empStatusMap.set("status", "INACTIVE");

	console.log(empStatusMap);

	var updateEmpStatusForm = createForm(empStatusMap);

    console.log(updateEmpStatusForm);

	var tempEmpID = $('#update_employee_status_id').val();

	var url = EMPLOYEE_UPDATE_STATUS_API + "/" + tempEmpID;
	 console.log(url);
	postFormData(updateEmpStatusForm, url).then(function(response){
		console.log("recieved"+response);
		let result = JSON.parse(response);
		console.log(result);

		if(result.status === 200){
			$('#form_update_employee_status')[0].reset();
			$('#update_employee_status_modal').modal('hide');
            $('#employee_table').DataTable().ajax.reload();
            toastr.success(result.message);
		}else{
			alert(result.message);
		}
	}).catch(function(err){
		console.log(err.responseText);
	});
	return false;
}

jQuery('.mydatepicker').datepicker();
jQuery('#joining_date').datepicker({
    autoclose: true,
    todayHighlight: true,
    format: 'yyyy/mm/dd'
});
