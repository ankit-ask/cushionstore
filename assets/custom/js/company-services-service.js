var isFilter = 'false';
var companyServicesDataTable;
var tableIdName;
var customSendData = {};

function setCustomData(){
	customSendData.service_name = $('#nameSearch').val();
    customSendData.isFilter = isFilter;
}

function init(tableIdName, API_NAME){

	this.tableIdName = tableIdName;
	
	setCustomData();

	companyServicesDataTable = createDataTable(tableIdName, API_NAME, customSendData, 10);

}

$('.search-input-text').on( 'keypress', function (e) {   // for text boxes
    
    if(e.keyCode == 13){
        var i =$(this).attr('data-column');
        var v =$(this).val(); 
        isFilter = v === '' ? 'false' : 'true';
        setCustomData();
        if(isFilter === 'true'){
            companyServicesDataTable.columns(i).search(v).draw();
        }else if(v === ''){
            companyServicesDataTable.ajax.reload();
        }	
    }
});