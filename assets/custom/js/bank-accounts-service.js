var tableIdName;
var isFilter = 'false';
var bankAccountsDataTable;
var customSendData = {};

function setCustomData(){
    customSendData.isFilter = isFilter;
}

function init(tableIdName,methodName){

    this.tableIdName = tableIdName;

    setCustomData();

    if(userType === 'ADMIN'){
        $("#add_bank_button").show();
        customTableDef = {
            columns: [
                {data: 'acc_id'},
                {data: 'bank_name'},
                {data: 'branch'},
                {data: 'acc_num'},
                {data: 'ifsc'},
                {
                    "data": null,
                    "defaultContent": "<button class='btn btn-warning btn-xs editBankBtn jsr-cmd-btn'>EDIT</button>"
                }
            ]
        };
    }
    else{
        $("#add_bank_button").hide();
        $('#commands-th').hide();
        customTableDef = {
            columns: [
                {data: 'acc_id'},
                {data: 'bank_name'},
                {data: 'branch'},
                {data: 'acc_num'},
                {data: 'ifsc'}
            ]
        };
    }

    bankAccountsDataTable = createListDataTable(tableIdName, methodName, customSendData, 10, customTableDef);

    //Edit Bank Account Button Function
	$('#'+tableIdName).on( 'click', '.editBankBtn', function () {
		data = bankAccountsDataTable.row( $(this).parents('tr') ).data();
		console.log(data);

		$('#update_bank_account_modal').modal('show');
		$('#update_bank_name').val(data.bank_name);
		$('#update_branch').val(data.branch);
		$('#update_acc_num').val(data.acc_num);
		$('#update_ifsc').val(data.ifsc);
    });

}

//Add Bank Account
function addBankAccount(){
	
	var sendForm =document.getElementById('add_bank_account_form');
	var dataForm =  new FormData(sendForm);

	postFormData(dataForm, ADD_BANK_ACCOUNT_API).then(function(response){
		console.log("recieved"+response);
		let result = JSON.parse(response);
		console.log(result);
		
		if(result.status === 200){
			$('#add_bank_account_form')[0].reset();
			$('#add_bank_account_modal').modal('hide');
			$('#'+tableIdName).DataTable().ajax.reload();

			toastr.success(result.message);
			
		}else{
			alert(result.message);
		}
	}).catch(function(err){
		console.log(err.responseText);
	});
}

//Update Bank Account
function updateBankAccount(){
	
	var sendForm =document.getElementById('update_bank_account_form');
	var dataForm =  new FormData(sendForm);

    var url = UPDATE_BANK_ACCOUNT_API + '/' + data.acc_id;
	postFormData(dataForm, url).then(function(response){
		console.log("recieved"+response);
		let result = JSON.parse(response);
		console.log(result);
		
		if(result.status === 200){
			$('#update_bank_account_form')[0].reset();
			$('#update_bank_account_modal').modal('hide');
			$('#'+tableIdName).DataTable().ajax.reload();

			toastr.success(result.message);
			
		}else{
			alert(result.message);
		}
	}).catch(function(err){
		console.log(err.responseText);
	});
}
