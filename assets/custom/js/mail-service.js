var isFilter = 'false';
var mailCategoryDataTable;
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
			$("#add_mail_category_button").show();
			$("#add_email_template_button").show();
        } else {
			$("#add_mail_category_button").hide();
			$("#add_email_template_button").hide();
        }
    } else {
        console.log("No userType Found");
	}

	mailCategoryDataTable = createDataTable(tableIdName, API_NAME, customSendData, 10);

	//Edit Mail Category Button Function
	$('#'+tableIdName).on( 'click', '.editMailCategory', function () {
		data = mailCategoryDataTable.row( $(this).parents('tr') ).data();
		console.log(data);
		$('#update_mail_category_modal').modal('show');

		$('#update_category').val(data[2]);
	
	});

	//Delete mail Category Button Function
	$('#'+tableIdName).on( 'click', '.delMailCategory', function () {
		data = mailCategoryDataTable.row( $(this).parents('tr') ).data();
		console.log(data);

		if (confirm("Are you sure you want to Delete this category?")) {
			deleteGlobal('mail_category', tableIdName, 'cat_id', data[1] );
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
            mailCategoryDataTable.columns(i).search(v).draw();
        }else if(v === ''){
            mailCategoryDataTable.ajax.reload();
        }	
    }
});

//Add New Mail Category
function addMailCategory(){
	event.preventDefault(); //For AJAX
	var sendForm =document.getElementById('add_category_form');
    var dataForm =  new FormData(sendForm);

	postFormData(dataForm, ADD_MAIL_CATEGORY_API).then(function(response){
		console.log("recieved"+response);
		let result = JSON.parse(response);
		console.log(result);
		console.log(result.message);
		
		if(result.status === 200){
			$('#add_category_form')[0].reset();
			$('#add_mail_category_modal').modal('hide');

			toastr.success(result.message);

            $('#'+tableIdName).DataTable().ajax.reload();
			
		}else{
			alert(result.message);
		}
	}).catch(function(err){
		console.log(err.responseText);
	});
}

//Update Mail Category
function updateMailCategory(){
	event.preventDefault(); //For AJAX
	var sendForm =document.getElementById('update_category_form');
	var dataForm =  new FormData(sendForm);
	dataForm.append('cat_id',data[1]);
	console.log(dataForm);
	var url = UPDATE_MAIL_CATEGORY_API + "/" + data[1];
	console.log(url);
	postFormData(dataForm, url).then(function(response){
		console.log("recieved"+response);
		let result = JSON.parse(response);
		console.log(result);
		console.log(result.message);
		
		if(result.status === 200){
			$('#update_category_form')[0].reset();
			$('#update_mail_category_modal').modal('hide');

			toastr.success(result.message);

            $('#'+tableIdName).DataTable().ajax.reload();
			
		}else{
			alert(result.message);
		}
	}).catch(function(err){
		console.log(err.responseText);
	});
}