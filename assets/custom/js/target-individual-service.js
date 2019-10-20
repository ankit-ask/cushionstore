var tableIdName;
var isFilter = 'false';
var targetDataTable;
var customSendData = {};

function setCustomData(){
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
            {data: 'achieved_value'}
		]
	};

    targetDataTable = createListDataTable(tableIdName, methodName, customSendData, 10,customTableDef);

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