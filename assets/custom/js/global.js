function getPopoverData() {
    $('#empName').text((getFromStorage(EMPLOYEE_NAME))+' ('+(getFromStorage(USER_TYPE))+')');
}

// PREVENT INSIDE MEGA DROPDOWN
$('.dropdown-menu').on("click.bs.dropdown", function (e) {
    e.stopPropagation();
});

$(document).ready(function(){

	// $('#lock_modal').modal('hide');

	// alert(getFromStorage(LOCK_ENABLED));
	if(getFromStorage(LOCK_ENABLED) == 1){
		showLock();
	}

	// $(function() {
	// 	$('#toggle-one').bootstrapToggle();
	//   })

});

function doLogout() {
    if (confirm("Are you sure you want to Log Out?")) {
		window.location.href = "http://jsr.technomize.com/login";
		clearAllStorage();
    }
}

function createForm(formMap){
	var form = new FormData();
	for (const [key, value] of formMap.entries()) {
		form.append(key, value);
	}
	return form;
}

function postFormData(form,methodName) {
	// body...
	  return new Promise(function(resolve, reject) { $.ajax({
	  "async": false,
	  "crossDomain": true,
	  "url": BASE_URL+methodName,
	  "method": "POST",
	  "headers": {
		"Authorization": getFromStorage(USER_TOKEN),
	  },
	  "processData": false,
	  "contentType": false,
	  "mimeType": "multipart/form-data",
		  "data": form,
		  success : function(response){
			  resolve(response);
		  },
		  error: function(err){
			  reject(err);
		  }
	  });
	  
	  });	
  }
  
  function getFromServer(formMap, methodName){
	  var url = BASE_URL + methodName;
	  for (const [key, value] of formMap.entries()) {
		  var url = url + "/" + value;
	  }
	  return new Promise(function(resolve, reject) { $.ajax({
	  "async": false,
	  "crossDomain": true,
	  "url": url,
	  "method": "GET",
	  "headers": {
		"Authorization": getFromStorage(USER_TOKEN),
	  },
	  "processData": false,
	  "contentType": false,
	  "mimeType": "multipart/form-data",
		  success : function(response){
			  resolve(response);
		  },
		  error: function(err){
			  reject(err);
		  }
	  });
	  
	  });	
  }
  
   

function generateCurrentTimestamp(){
	var d = new Date();

	var month = d.getMonth()+1;
	var day = d.getDate();
	var hour = d.getHours();
	var minute = d.getMinutes();
	var second = d.getSeconds();

	var output = d.getFullYear() + '-' +
		((''+month).length<2 ? '0' : '') + month + '-' +
		((''+day).length<2 ? '0' : '') + day +  ' ' +
		((''+hour).length<2 ? '0' : '') + hour +  ':' +
		((''+minute).length<2 ? '0' : '') + minute +  ':' +
		((''+second).length<2 ? '0' : '') + second ;

	return output;
}

//Calculate Days Differene Between 2 Dates
function calcuclateDays(startDate, endDate){
	   
	var date_1 = startDate;
	   
	date_1 = new Date(date_1.split('/')[2],date_1.split('/')[1]-1,date_1.split('/')[0]);

	var date_2 = endDate;

	date_2 = new Date(date_2.split('/')[2],date_2.split('/')[1]-1,date_2.split('/')[0]);

	var timeDiff = Math.abs(date_1.getTime() - date_2.getTime());

	var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 

	return diffDays;
}

//Return month in MM/YYYY format from a given date in DD/MM/YYYY format
function generateMonth(){
	var d = new Date();

	var month = d.getMonth()+1;
	var day = d.getDate();

	var output =
		((''+month).length<2 ? '0' : '') + month + '/' + d.getFullYear() ;

	return output;
}
