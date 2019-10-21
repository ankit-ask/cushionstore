function doLogin(){
	if($('#userId').val().length <= 0 || $('#password').val().length <= 0 ){
		alert("Enter userId and password first!");
		return;
	}

	var loginMap = new Map();
	loginMap.set("userId", $('#userId').val());
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
		console.log(userDetailMap);
		saveMapInStorage(userDetailMap);
		
		if(result.status === 200){
			window.location.href = DASHBOARD_URL;
		}else{
			alert(result.message);
		}
	}).catch(function(err){
		alert(err.responseText);
	});
	
}
