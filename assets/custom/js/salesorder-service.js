var customSendData = {};

var isFilter = 'false';

var tableId;

var salesorderTable;

function setCustomData(){
	customSendData.isFilter = isFilter;
	customSendData.userType = userType;
	customSendData.empId = getFromStorage(EMPLOYEE_ID);
}

function init(METHOD_NAME, TABLE_ID){

	this.tableId = TABLE_ID;

	setCustomData();

	if(userType === 'ADMIN'){

		customTableDef = {
			columns: [
				{data: 'lead_fk'},
				{data: 'lead_name'},
				{data: 'service_name'},
				{data: 'package_name'},
				{data: 'package_amt'},
				{data: 'received_amt'},
				{data: 'service_start_date'},
				{data: 'service_end_date'},
				{data: 'total_days'},
				{data: 'remark'},
				{data: 'payment_date'},
				{data: 'payment_timestamp'},
				{data: 'payment_mode'},
				{data: 'payment_acc'},
				{data: 'reference_num'},
				{data: 'order_status'},
				{data: 'booked_by_id'},
				{data: 'booked_by_name'},
				{data: 'admin_comment'},
				{
					"data": null,
					"defaultContent": "<button class='btn btn-warning btn-xs editSalesOrderStatus jsr-cmd-btn'>Edit Response</button>"
				}
			],
				columnDefs: [
					{
						"targets": 1,
						"visible": false
					}
				]   
		};

	}else{

		customTableDef = {
			columns: [
				{data: 'lead_fk'},
				{data: 'lead_name'},
				{data: 'service_name'},
				{data: 'package_name'},
				{data: 'package_amt'},
				{data: 'received_amt'},
				{data: 'service_start_date'},
				{data: 'service_end_date'},
				{data: 'total_days'},
				{data: 'remark'},
				{data: 'payment_date'},
				{data: 'payment_timestamp'},
				{data: 'payment_mode'},
				{data: 'payment_acc'},
				{data: 'reference_num'},
				{data: 'order_status'},
				{data: 'booked_by_id'},
				{data: 'booked_by_name'},
				{data: 'admin_comment'},
				{
					"data": null,
					"defaultContent": "Only For Admin"
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

	salesorderTable = createListDataTable(tableId, METHOD_NAME, customSendData, 10, customTableDef);


	//Edit Response Button Function
	$('#'+tableId).on( 'click', '.editSalesOrderStatus', function () {
		data = salesorderTable.row( $(this).parents('tr') ).data();
		console.log(data.id);
		console.log(data);
		
		$('#edit_salesorder_response_modal').modal('show');
	
	});

}

//Edit Sales Order Status
function editSalesorderStatus() {
	event.preventDefault(); //For AJAX
	var sendForm =document.getElementById('edit_salesorder_response_form');
	var dataForm =  new FormData(sendForm);

	var month = generateMonth();


	dataForm.append('acc_fk',data.acc_fk);
	dataForm.append('booked_by_id',data.booked_by_id);
	dataForm.append('booked_by_name',data.booked_by_name);
	dataForm.append('lead_fk',data.lead_fk);
	dataForm.append('lead_name',data.lead_name);
	dataForm.append('package_amt',data.package_amt);
	dataForm.append('package_name',data.package_name);
	dataForm.append('payment_acc',data.payment_acc);
	dataForm.append('payment_date',data.payment_date);
	dataForm.append('payment_mode',data.payment_mode);
	dataForm.append('payment_timestamp',data.payment_timestamp);
	dataForm.append('received_amt',data.received_amt);
	dataForm.append('reference_num',data.reference_num);
	dataForm.append('remark',data.remark);
	dataForm.append('service_end_date',data.service_end_date);
	dataForm.append('service_start_date',data.service_start_date);
	dataForm.append('service_fk',data.service_fk);
	dataForm.append('service_name',data.service_name);
	dataForm.append('total_days',data.total_days);
	
	dataForm.append('month',month);

	console.log(dataForm);

	var update_salesorder_id = data.sales_order_id;
	console.log(update_salesorder_id);

	var url = UPDATE_SALESORDER_STATUS_API + "/" + update_salesorder_id;
	console.log(url);

	postFormData(dataForm, url).then(function(response){
		console.log("recieved"+response);
		let result = JSON.parse(response);
		console.log(result);
		
		if(result.status === 200){
			$('#edit_salesorder_response_form')[0].reset();
			$('#edit_salesorder_response_modal').modal('hide');
			$('#'+tableId).DataTable().ajax.reload();

			toastr.success(result.message);
			
		}else{
			alert(result.message);
		}
	}).catch(function(err){
		console.log(err.responseText);
	});
}
