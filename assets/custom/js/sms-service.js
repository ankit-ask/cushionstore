//Service JS For SMS Cateogry

var isFilter = 'false';
var smsCategoryDataTable;
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
        if (userType === 'ADMIN' || userType === 'DSH') {
			$("#add_sms_category_button").show();
        } else {
			$("#add_sms_category_button").hide();
        }
    } else {
        console.log("No userType Found");
	}

	smsCategoryDataTable = createDataTable(tableIdName, API_NAME, customSendData, 10);

	//Edit Button Function
	$('#'+tableIdName).on( 'click', '.editSMSCategory', function () {
		data = smsCategoryDataTable.row( $(this).parents('tr') ).data();
		console.log(data);
		$('#update_sms_category_modal').modal('show');

		$('#update_category').val(data[2]);
	
	});
	
	//Delete Button Function
	$('#'+tableIdName).on( 'click', '.delSMSCategory', function () {
		data = smsCategoryDataTable.row( $(this).parents('tr') ).data();
		console.log(data);

		if (confirm("Are you sure you want to Delete this category?")) {
			deleteGlobal('sms_category', tableIdName, 'cat_id', data[1] );
		}
	
	});

}

// Search for SMS category
$('.search-input-text').on( 'keypress', function (e) {   // for text boxes
    
    if(e.keyCode == 13){
        var i =$(this).attr('data-column');
        var v =$(this).val(); 
        isFilter = v === '' ? 'false' : 'true';
        setCustomData();
        if(isFilter === 'true'){
            smsCategoryDataTable.columns(i).search(v).draw();
        }else if(v === ''){
            smsCategoryDataTable.ajax.reload();
        }	
    }
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

//Add New SMS Category
function addSMSCategory(){
	event.preventDefault(); //For AJAX
	var sendForm =document.getElementById('add_category_form');
    var dataForm =  new FormData(sendForm);

	postFormData(dataForm, ADD_SMS_CATEGORY_API).then(function(response){
		console.log("recieved"+response);
		let result = JSON.parse(response);
		console.log(result);
		console.log(result.message);
		
		if(result.status === 200){
			$('#add_category_form')[0].reset();
			$('#add_sms_category_modal').modal('hide');

			toastr.success(result.message);
            //Make Function to SHow Toaster and Call with Message
            $('#'+tableIdName).DataTable().ajax.reload();
			
		}else{
			alert(result.message);
		}
	}).catch(function(err){
		console.log(err.responseText);
	});
}

//Update SMS Category
function updateSMSCategory(){
	event.preventDefault(); //For AJAX
	var sendForm =document.getElementById('update_category_form');
	var dataForm =  new FormData(sendForm);
	dataForm.append('cat_id',data[1]);

	var url = UPDATE_SMS_CATEGORY_API + "/" + data[1];

	postFormData(dataForm, url).then(function(response){
		console.log("recieved"+response);
		let result = JSON.parse(response);
		console.log(result);
		console.log(result.message);
		
		if(result.status === 200){
			$('#update_category_form')[0].reset();
			$('#update_sms_category_modal').modal('hide');

			toastr.success(result.message);

            $('#'+tableIdName).DataTable().ajax.reload();
			
		}else{
			alert(result.message);
		}
	}).catch(function(err){
		console.log(err.responseText);
	});
}