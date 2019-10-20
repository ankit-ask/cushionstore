var isFilter = 'false';
var smsTemplateDataTable;
var tableIdName;
var customSendData = {};

function setCustomData(){
	customSendData.category = $('#categorySearch').val();
	customSendData.template_name = $('#templateSearch').val();
    customSendData.isFilter = isFilter;
}

function init(tableIdName, API_NAME){

	this.tableIdName = tableIdName;
	
	setCustomData();
    
    if (userType != undefined) {
        console.log(userType);
        if (userType === 'ADMIN') {
			$("#add_sms_template_button").show();
			$("#commands-th").show();

			customTableDef = {
				columns: [
					{data: 'smstemp_id'},
					{data: 'category'},
					{data: 'template_name'},
					{data: 'content'},
					{
						"data": null,
						"defaultContent": "<button class='btn btn-warning btn-xs editSmsTemplate jsr-cmd-btn'>EDIT</button><button class='btn btn-danger btn-xs delSmsTemplate jsr-cmd-btn'>DELETE</button>"
					}
				]
			};

        } else {
			$("#add_sms_template_button").hide();
			$("#commands-th").hide();

			customTableDef = {
				columns: [
					{data: 'smstemp_id'},
					{data: 'category'},
					{data: 'template_name'},
					{data: 'content'}
				]
			};
        }
    } else {
        console.log("No userType Found");
	}

    smsTemplateDataTable = createListDataTable(tableIdName, API_NAME, customSendData, 10, customTableDef);

	//Edit SMS Template Button Function
	$('#'+tableIdName).on( 'click', '.editSmsTemplate', function () {
		data = smsTemplateDataTable.row( $(this).parents('tr') ).data();
		console.log(data);

		fillUpdateDropdownData('sms_category');

		$('#update_sms_template_modal').modal('show');
		$('#update_template_name').val(data.template_name);
		$('#update_content').val(data.content);
	});

	// Delete SMS Template Button Function
	$('#'+tableIdName).on( 'click', '.delSmsTemplate', function () {
		data = smsTemplateDataTable.row( $(this).parents('tr') ).data();
		console.log(data);

		if (confirm("Are you sure you want to Delete this template?")) {
			deleteGlobal('sms_template', tableIdName, 'smstemp_id', data.smstemp_id );
		}
	
	});

}

//Add SMS Template Buttons Operations
$('#add_sms_template_button').on( 'click', function (e) {
	fillDropdownData('sms_category');
});

//Search for SMS template
$('.search-input-text').on( 'keypress', function (e) {   // for text boxes
    
    if(e.keyCode == 13){
        var i =$(this).attr('data-column');
        var v =$(this).val(); 
        isFilter = v === '' ? 'false' : 'true';
        setCustomData();
        if(isFilter === 'true'){
            smsTemplateDataTable.columns(i).search(v).draw();
        }else if(v === ''){
            smsTemplateDataTable.ajax.reload();
        }	
    }
});

//Add New SMS Template
function addSMSTemplate(){
	event.preventDefault(); //For AJAX
	var sendForm =document.getElementById('add_sms_template_form');
	var dataForm =  new FormData(sendForm);
	dataForm.append('category',$('#cat_fk option:selected').text());
	
	console.log(dataForm);

	postFormData(dataForm, ADD_SMS_TEMPLATE_API).then(function(response){
		console.log("recieved"+response);
		let result = JSON.parse(response);
		console.log(result);
		console.log(result.message);
		
		if(result.status === 200){
			$('#add_sms_template_form')[0].reset();
			$('#add_sms_template_modal').modal('hide');

			toastr.success(result.message);

            $('#'+tableIdName).DataTable().ajax.reload();
			
		}else{
			alert(result.message);
		}
	}).catch(function(err){
		console.log(err.responseText);
	});
}

//Update SMS Template
function updateSMSTemplate(){
	event.preventDefault(); //For AJAX
	var sendForm =document.getElementById('update_sms_template_form');
	var dataForm =  new FormData(sendForm);
	dataForm.append('category',$('#update_cat_fk option:selected').text());
	
	console.log(dataForm);
	var url = UPDATE_SMS_TEMPLATE_API +'/'+ data.smstemp_id;
	postFormData(dataForm, url).then(function(response){
		console.log("recieved"+response);
		let result = JSON.parse(response);
		console.log(result);
		console.log(result.message);
		
		if(result.status === 200){
			$('#update_sms_template_form')[0].reset();
			$('#update_sms_template_modal').modal('hide');

			toastr.success(result.message);

            $('#'+tableIdName).DataTable().ajax.reload();
			
		}else{
			alert(result.message);
		}
	}).catch(function(err){
		console.log(err.responseText);
	});
}

//Fill SMS Category Dropdown
function fillDropdownData(dbTableName){

    fetch_full_table_global(dbTableName).then(function(dropdownResultData){

        console.log(dropdownResultData);
        
        $('#cat_fk').find('option').remove().end();

        dropdownResultData.forEach(function(data, index){
            
            console.log(data.cat_id);
            console.log(data.category);
            
            var updateOptionVarData = $("<option/>").attr("value", data.cat_id).text(data.category);
            
            $('#cat_fk').append(updateOptionVarData);
            
        });

    }).catch(function(err){

    });
}

//Fill Update Mail Category Dropdown
function fillUpdateDropdownData(dbTableName){

    fetch_full_table_global(dbTableName).then(function(dropdownResultData){

        console.log(dropdownResultData);
        
        $('#update_cat_fk').find('option').remove().end();

        dropdownResultData.forEach(function(data, index){
            
            console.log(data.cat_id);
            console.log(data.category);
            
            var updateOptionVarData = $("<option/>").attr("value", data.cat_id).text(data.category);
            
            $('#update_cat_fk').append(updateOptionVarData);
            
        });

		//Selecting previous option by .text() instead of .val()
		$("#update_cat_fk option").filter(function() {
		return $(this).text() == data.category;
		}).prop('selected', true);

    }).catch(function(err){

    });
}