function getPopoverData() {
    $('#empName').text((getFromStorage(EMPLOYEE_NAME))+' ('+(getFromStorage(USER_TYPE))+')');
}

// PREVENT INSIDE MEGA DROPDOWN
$('.dropdown-menu').on("click.bs.dropdown", function (e) {
    e.stopPropagation();
});

$(document).ready(function(){

	// $('#lock_modal').modal('hide');

	// alert(getFromStorage(LOCK_ENABLED));
	if(getFromStorage(LOCK_ENABLED) == 1){
		showLock();
	}

	$(function() {
		$('#toggle-one').bootstrapToggle();
	  })

});

$(document).keydown(function(e) {
	if ( e.altKey && ( e.which === 76 ) ) {
		showLockPassword();
		// showLock();
		// $('#lock_modal').modal('show');
	}if( e.ctrlKey && e.shiftKey && (e.which === 73 )){
		alert("Respect developer's privacy");
		e.preventDefault();
	}
});

function showLockPassword(){
	$('#crm_password_modal').modal('show');
}

function lockCrmPassword(){

	if($('#lockCrmPasswordText').val() ===  ''){
		alert('Enter at least one character');
		return;
	}

	saveInStorage(LOCK_CRM_PSWD,$('#lockCrmPasswordText').val());
	$('#crm_password_modal').modal('hide');
	showLock();
	saveInStorage(LOCK_ENABLED, 1);
}

function lockPasswordVerify(){

	if($('#locakPasswordText').val() == getFromStorage(LOCK_CRM_PSWD)){
		saveInStorage(LOCK_ENABLED, 0);
		$('#lock_modal').modal('hide');
	}
}

function showLock(){
	$('#lock_modal').modal({
		backdrop: 'static',
		keyboard: false
	});
}

function doLogout() {
    if (confirm("Are you sure you want to Log Out?")) {
		window.location.href = "http://jsr.technomize.com/login";
		clearAllStorage();
    }
}

//Global Fetch - Get Complete Table Data
function fetch_full_table_global(dbTableName){
	
	// event.preventDefault(); //For AJAX

	return new Promise(function(resolve, reject) {
		var fetchGlobalMap = new Map();
		fetchGlobalMap.set("tableName", dbTableName );

		console.log(fetchGlobalMap);	

		getFromServer(fetchGlobalMap, GLOBAL_FETCH_API).then(function(response){
			console.log("recieved"+response);
			let result = JSON.parse(response);
			console.log(result);
			
			if(result.status === 200){
				resolve(result.body);
			}else{
				reject(result.message);
				
			}
		}).catch(function(err){
			console.log(err.responseText);
		});
	});
	
}

//Global Fetch With Where Condition
function fetch_table_with_where_global(dbTableName, columKey, columnValue){

	event.preventDefault(); //For AJAX

	return new Promise(function(resolve, reject) {
		var fetchGlobalWhereMap = new Map();
		fetchGlobalWhereMap.set(columKey, columnValue);

		var fetchWhereGlobalForm = createForm(fetchGlobalWhereMap);
		console.log(fetchWhereGlobalForm);
		var url = GLOBAL_FETCH_WHERE_API + '/' + dbTableName ;
		console.log(url);
		postFormData(fetchWhereGlobalForm, url).then(function(response){
			console.log("recieved"+response);
			let result = JSON.parse(response);
			console.log(result);
			
			if(result.status === 200){
				resolve(result.body);
				
			}else{
				reject(result.message);
			}
		}).catch(function(err){
			console.log(err.responseText);
		});
	});
	
}

//Global Delete Function
function deleteGlobal(tableName, tableIdName, columKey, columnValue){
	event.preventDefault(); //For AJAX
	var deleteMap = new Map();
	deleteMap.set(columKey, columnValue);

	var deleteGlobalForm = createForm(deleteMap);
	console.log(deleteGlobalForm);
	var url = GLOBAL_DELETE_API + '/' + tableName ;
	console.log(url);
	postFormData(deleteGlobalForm, url).then(function(response){
		console.log("recieved"+response);
		let result = JSON.parse(response);
		console.log(result);
		
		if(result.status === 200){
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

//Global Count WHERE  Function
function countGlobal(tableName, columKey, columnValue, viewID){
	
	//event.preventDefault(); //For AJAX

		var countMap = new Map();
		countMap.set(columKey, columnValue);

		var countGlobalForm = createForm(countMap);
		console.log(countGlobalForm);
		var url = GLOBAL_REPORT_COUNT_API + '/' + tableName ;
		console.log(url);
		postFormData(countGlobalForm, url).then(function(response){
			
			//console.log("recieved"+response);
			
			let result = JSON.parse(response);
			
			if(result.status === 200){
				console.log(result.body);
				$('#'+viewID+'').text(result.body);
				return result.body;
				
			}else{
				alert(result.message);
			}

		}).catch(function(err){
			
			console.log(err.responseText);

		});
}

//Global Count WHERE  Function
function countAllGlobal(tableName, viewID){
	
	//event.preventDefault(); //For AJAX

		var countMap = new Map();
		//countMap.set(columKey, columnValue);

		var countAllGlobalForm = createForm(countMap);
		console.log(countAllGlobalForm);
		var url = GLOBAL_REPORT_COUNT_API + '/' + tableName ;
		console.log(url);
		postFormData(countAllGlobalForm, url).then(function(response){
			
			//console.log("recieved"+response);
			
			let result = JSON.parse(response);
			
			if(result.status === 200){
				console.log(result.body);
				$('#'+viewID+'').text(result.body);
				return result.body;
				
			}else{
				alert(result.message);
			}

		}).catch(function(err){
			
			console.log(err.responseText);

		});
}

function addEmployee(){
	// if($('#username').val().length <= 0 || $('#password').val().length <= 0 ){
	// 	alert("Enter username and password first!");
	// 	return;
	// }
	event.preventDefault(); //For AJAX
	var empMap = new Map();
	empMap.set("user_type", $('#user_type').val());
	empMap.set("managed_by_name", $('#managed_by_name option:selected').text());
    empMap.set("managed_by_id", $('#managed_by_id').val());
    empMap.set("designation", $('#designation').val());
    empMap.set("name", $('#name').val());
    empMap.set("mobile", $('#mobile').val());
    empMap.set("email", $('#email').val());
    empMap.set("joining_date", $('#joining_date').val());
    empMap.set("address", $('#address').val());
    empMap.set("lead_capacity", $('#lead_capacity').val());
    empMap.set("user_ip", $('#user_ip').val());
    empMap.set("username", $('#username').val());
    empMap.set("password", $('#password').val());

    console.log(empMap);
	var addEmpForm = createForm(empMap);
    console.log(addEmpForm);

	postFormData(addEmpForm, EMPLOYEE_ADD_API).then(function(response){
		console.log("recieved"+response);
		let result = JSON.parse(response);
		console.log(result);
		
		if(result.status === 200){
			$('#addEmployee_Form')[0].reset();
			$('#add_employee_modal').modal('hide');
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

function updateEmployee(){
	// if($('#username').val().length <= 0 || $('#password').val().length <= 0 ){
	// 	alert("Enter username and password first!");
	// 	return;
	// }
	event.preventDefault(); //For AJAX
	var empMap = new Map();
	empMap.set("emp_id", $('#update_employee_id').val());
	empMap.set("user_type", $('#update_user_type').val());
	empMap.set("managed_by_name", $('#update_managed_by_name option:selected').text());
    empMap.set("managed_by_id", $('#update_managed_by_id').val());
    empMap.set("designation", $('#update_designation').val());
    empMap.set("name", $('#update_name').val());
    empMap.set("mobile", $('#update_mobile').val());
    empMap.set("email", $('#update_email').val());
    empMap.set("joining_date", $('#update_joining_date').val());
    empMap.set("address", $('#update_address').val());
    empMap.set("lead_capacity", $('#update_lead_capacity').val());
    empMap.set("username", $('#update_username').val());
    empMap.set("password", $('#update_password').val());

    console.log(empMap);
	var updateEmpForm = createForm(empMap);
    console.log(updateEmpForm);

	postFormData(updateEmpForm, EMPLOYEE_UPDATE_API).then(function(response){
		console.log("recieved"+response);
		let result = JSON.parse(response);
		console.log(result);
		
		if(result.status === 200){
			$('#updateEmployee_Form')[0].reset();
			$('#update_employee_modal').modal('hide');
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

function createDataTable(tableId, methodName, customSendDataFn, perPageLimit){

	return dataTable = $('#'+tableId).DataTable({
		"searching" : false,
		"processing" : true,
		"pageLength" : perPageLimit,
		"serverSide" : true,
		// "scrollX": true, //to enable fixed column
		"order" : [],
		"ajax" : {
			url : BASE_URL+methodName,
			type : 'POST',
			headers : {
				"Authorization": getFromStorage(USER_TOKEN),
				},
			data : function(d){
				d.customData = customSendDataFn;
			}
		},
			"columnDefs": [
		{ 
			"targets": [ 0 ], //first column / numbering column
			"orderable": false, //set not orderable
		},
		]
		
	});

}

function createListDataTable(tableId, methodName, customSendDataFn, perPageLimit, tableDefs){

	return dataTable = $('#'+tableId).DataTable({
		"searching" : false,
		"processing" : true,
		"pageLength" : perPageLimit,
		"serverSide" : true,
		// "scrollX": true, //to enable fixed column
		"order" : [],
		"ajax" : {
			url : BASE_URL+methodName,
			type : 'POST',
			headers : {
				"Authorization": getFromStorage(USER_TOKEN),
				},
			data : function(d){
				d.customData = customSendDataFn;
			}
		},
		"columns": tableDefs.columns,
		
		"columnDefs": [
		{ 
			"targets": [ 0 ], //first column / numbering column
			"orderable": false, //set not orderable
		},
		]
		
	});

}


//Dropdown
function fetch_dropdown(dropdownDataType){
	
	event.preventDefault(); //For AJAX

	return new Promise(function(resolve, reject) {
		var getDropdownMap = new Map();
		getDropdownMap.set("user_type", dropdownDataType );

		console.log(getDropdownMap);
		var addEmpForm = createForm(getDropdownMap);
		console.log(getDropdownMap);

		getFromServer(getDropdownMap, EMPLOYEE_DROPDOWN_GET_API).then(function(response){
			console.log("recieved"+response);
			let result = JSON.parse(response);
			console.log(result);
			
			if(result.status === 200){
				resolve(result.body);
			}else{
				reject(result.message);
				
			}
		}).catch(function(err){
			console.log(err.responseText);
		});
	});
	
}
// call function and get result
function fetch_nested_dropdown(){

	return new Promise(function(resolve, reject) {

		var getDropdownMap = new Map();

		getDropdownMap.set("user_type", getFromStorage(USER_TYPE) );

		getDropdownMap.set("managed_by_id", getFromStorage(EMPLOYEE_ID) );

		console.log(getDropdownMap);

		getFromServer(getDropdownMap, EMPLOYEE_DROPDOWN_GET_API).then(function(response){
			console.log("recieved"+response);
			let result = JSON.parse(response);
			console.log(result);
			
			if(result.status === 200){
				resolve(result.body);
			}else{
				reject(result.message);
				
			}
		}).catch(function(err){
			console.log(err.responseText);
		});
	});
	
}


function fillNestedDropdownData(dropdownVar, dropdownId){

    fetch_nested_dropdown(event).then(function(dropdownResultData){

        console.log(dropdownResultData);
        
        $('#update_managed_by_name').find('option').remove().end();

        dropdownResultData.forEach(function(data, index){
            
            console.log(data.emp_id);
            
            var updateOptionVarData = $("<option/>").attr("value", data.emp_id).text(data.name+'('+data.mobile+')');
            
            dropdownVar.append(updateOptionVarData);
            
        });
        
        $("#"+dropdownId+" option[value=" + data[5] + "]").attr("selected","selected");

    }).catch(function(err){

    });
}

function generateCurrentTimestamp(){
	var d = new Date();

	var month = d.getMonth()+1;
	var day = d.getDate();
	var hour = d.getHours();
	var minute = d.getMinutes();
	var second = d.getSeconds();

	var output = d.getFullYear() + '-' +
		((''+month).length<2 ? '0' : '') + month + '-' +
		((''+day).length<2 ? '0' : '') + day +  ' ' +
		((''+hour).length<2 ? '0' : '') + hour +  ':' +
		((''+minute).length<2 ? '0' : '') + minute +  ':' +
		((''+second).length<2 ? '0' : '') + second ;

	return output;
}

//Calculate Days Differene Between 2 Dates
function calcuclateDays(startDate, endDate){
	   
	var date_1 = startDate;
	   
	date_1 = new Date(date_1.split('/')[2],date_1.split('/')[1]-1,date_1.split('/')[0]);

	var date_2 = endDate;

	date_2 = new Date(date_2.split('/')[2],date_2.split('/')[1]-1,date_2.split('/')[0]);

	var timeDiff = Math.abs(date_1.getTime() - date_2.getTime());

	var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 

	return diffDays;
}

//Return month in MM/YYYY format from a given date in DD/MM/YYYY format
function generateMonth(){
	var d = new Date();

	var month = d.getMonth()+1;
	var day = d.getDate();

	var output =
		((''+month).length<2 ? '0' : '') + month + '/' + d.getFullYear() ;

	return output;
}
