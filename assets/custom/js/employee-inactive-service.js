var isFilter = 'false';
var employeeDataTable;
var tableIdName;
var customSendData = {};

function setCustomData(){

    this.tableIdName = 'employee_table';
    customSendData.designation = $('#designationSearch').val();
    customSendData.user_type = $('#userTypeSearch').val();
    customSendData.name = $('#nameSearch').val();
    customSendData.startDate = $('#start_date').val();
    customSendData.endDate = $('#end_date').val();
    customSendData.managed_by_name = $('#managedBySearch').val();
    customSendData.isFilter = isFilter;
}

function init(API_NAME){
    
    setCustomData();

    employeeDataTable = createDataTable('employee_table', API_NAME, customSendData, 10);

    $('.input-daterange').datepicker({
		todayBtn:'linked',
		format: "yyyy/mm/dd",
		autoclose: true
    });

    // Delete SMS Template Button Function
	$('#employee_table').on( 'click', '.deleteInActiveEmp', function () {
		data = employeeDataTable.row( $(this).parents('tr') ).data();
		console.log(data);

		if (confirm("Are you sure you want to Delete this employee record? Note that this action cannot be undone. Proceed anyway?")) {
			deleteGlobal('employee', tableIdName, 'id', data[0] );
		}
	
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
