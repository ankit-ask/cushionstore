var isFilter = 'false';
var freeTrialsDataTable;
var tableIdName;
var customSendData = {};

function setCustomData(){
	customSendData.service_name = $('#nameSearch').val();
	customSendData.booked_by = $('#bookedBySearch').val();
    customSendData.isFilter = isFilter;
    // For Session Wise Data
    customSendData.userType = userType;
	customSendData.empId = getFromStorage(EMPLOYEE_ID);
}

function init(tableIdName, API_NAME){

	this.tableIdName = tableIdName;
	
	setCustomData();

	freeTrialsDataTable = createDataTable(tableIdName, API_NAME, customSendData, 10);

}

$('.search-input-text').on( 'keypress', function (e) {   // for text boxes
    
    if(e.keyCode == 13){
        var i =$(this).attr('data-column');
        var v =$(this).val(); 
        isFilter = v === '' ? 'false' : 'true';
        setCustomData();
        if(isFilter === 'true'){
            freeTrialsDataTable.columns(i).search(v).draw();
        }else if(v === ''){
            freeTrialsDataTable.ajax.reload();
        }	
    }
});
