function doLogin(){
	if($('#username').val().length <= 0 || $('#password').val().length <= 0 ){
		alert("Enter username and password first!");
		return;
	}

	var loginMap = new Map();
	loginMap.set("username", $('#username').val());
	loginMap.set("password", $('#password').val());
	var loginForm = createForm(loginMap);
	postFormData(loginForm, LOGIN_API).then(function(response){
		console.log("recieved"+response);
		let result = JSON.parse(response);
		console.log(result);
		console.log(result.body.token);
		var userDetailMap = new Map();
		userDetailMap.set(USER_TOKEN, result.body.token);
		userDetailMap.set(EXPIRY_DATE, result.body.expiryDate);
		userDetailMap.set(EMPLOYEE_ID, result.body[0].emp_id);
		userDetailMap.set(EMPLOYEE_NAME, result.body[0].name);
		userDetailMap.set(USER_TYPE, result.body[0].user_type);
		console.log(userDetailMap);
		saveMapInStorage(userDetailMap);
		
		if(result.status === 200){
			window.location.href = "http://jsr.technomize.com/dashboard";
		}else{
			alert(result.message);
		}
	}).catch(function(err){
		alert(err.responseText);
	});
	
}
