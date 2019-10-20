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

function createForm(formMap){
	var form = new FormData();
	for (const [key, value] of formMap.entries()) {
		form.append(key, value);
	}
	return form;
}

