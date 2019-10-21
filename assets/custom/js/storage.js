function saveInStorage(key,value) {
	// body...
	localStorage.setItem(key,value);
}

function saveMapInStorage(dataMap){
	for (const [key, value] of dataMap.entries()) {
		localStorage.setItem(key, value);
	}
}

function getFromStorage(key) {
	// body...
	return localStorage.getItem(key);
}

function clearAllStorage() {
	// body...
	localStorage.clear();
}
