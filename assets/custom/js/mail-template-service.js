var isFilter = 'false';
var mailTemplateDataTable;
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
            $("#add_email_template_button").show();
            $("#commands-th").show();
            
            customTableDef = {
				columns: [
					{data: 'mailtemp_id'},
					{data: 'category'},
					{data: 'template_name'},
					{data: 'mail_head'},
					{data: 'content'},
					{
						"data": null,
						"defaultContent": "<button class='btn btn-warning btn-xs editMailTemplate jsr-cmd-btn'>EDIT</button><button class='btn btn-danger btn-xs delMailTemplate jsr-cmd-btn'>DELETE</button>"
					}
				]
            };
            
        } else {
            $("#add_email_template_button").hide();
            $("#commands-th").hide();
            
            customTableDef = {
				columns: [
					{data: 'mailtemp_id'},
					{data: 'category'},
					{data: 'template_name'},
					{data: 'mail_head'},
					{data: 'content'}
				]
			};
        }
    } else {
        console.log("No userType Found");
	}

	mailTemplateDataTable = createListDataTable(tableIdName, API_NAME, customSendData, 10, customTableDef);

	//Edit Mail Template Button Function
	$('#'+tableIdName).on( 'click', '.editMailTemplate', function () {
		data = mailTemplateDataTable.row( $(this).parents('tr') ).data();
		console.log(data);

		fillUpdateDropdownData('mail_category');

		$('#update_mail_template_modal').modal('show');
		$('#update_template_name').val(data.template_name);
		$('#update_mail_head').val(data.mail_head);
		$('#update_content').val(data.content);
	});

	// Delete Mail Template Button Function
	$('#'+tableIdName).on( 'click', '.delMailTemplate', function () {
		data = mailTemplateDataTable.row( $(this).parents('tr') ).data();
		console.log(data);

		if (confirm("Are you sure you want to Delete this template?")) {
			deleteGlobal('mail_template', tableIdName, 'mailtemp_id', data.mailtemp_id );
		}
	
	});

}

//Add Email Template Buttons Operations
$('#add_email_template_button').on( 'click', function (e) {
	fillDropdownData('mail_category');
});

$('.search-input-text').on( 'keypress', function (e) {   // for text boxes
    
    if(e.keyCode == 13){
        var i =$(this).attr('data-column');
        var v =$(this).val(); 
        isFilter = v === '' ? 'false' : 'true';
        setCustomData();
        if(isFilter === 'true'){
            mailTemplateDataTable.columns(i).search(v).draw();
        }else if(v === ''){
            mailTemplateDataTable.ajax.reload();
        }	
    }
});

//Add New Mail Template
function addMailTemplate(){
	event.preventDefault(); //For AJAX
	var sendForm =document.getElementById('add_mail_template_form');
	var dataForm =  new FormData(sendForm);
	dataForm.append('category',$('#cat_fk option:selected').text());
	
	console.log(dataForm);

	postFormData(dataForm, ADD_MAIL_TEMPLATE_API).then(function(response){
		console.log("recieved"+response);
		let result = JSON.parse(response);
		console.log(result);
		console.log(result.message);
		
		if(result.status === 200){
			$('#add_mail_template_form')[0].reset();
			$('#add_mail_template_modal').modal('hide');

			toastr.success(result.message);

            $('#'+tableIdName).DataTable().ajax.reload();
			
		}else{
			alert(result.message);
		}
	}).catch(function(err){
		console.log(err.responseText);
	});
}

//Update Mail Template
function updateMailTemplate(){
	event.preventDefault(); //For AJAX
	var sendForm =document.getElementById('update_mail_template_form');
	var dataForm =  new FormData(sendForm);
	dataForm.append('category',$('#update_cat_fk option:selected').text());
	
	console.log(dataForm);
	var url = UPDATE_MAIL_TEMPLATE_API +'/'+ data.mailtemp_id;
	postFormData(dataForm, url).then(function(response){
		console.log("recieved"+response);
		let result = JSON.parse(response);
		console.log(result);
		console.log(result.message);
		
		if(result.status === 200){
			$('#update_mail_template_form')[0].reset();
			$('#update_mail_template_modal').modal('hide');

			toastr.success(result.message);

            $('#'+tableIdName).DataTable().ajax.reload();
			
		}else{
			alert(result.message);
		}
	}).catch(function(err){
		console.log(err.responseText);
	});
}

//Fill Mail Category Dropdown
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
		return $(this).text() == data.template_name;
		}).prop('selected', true);

    }).catch(function(err){

    });
}

