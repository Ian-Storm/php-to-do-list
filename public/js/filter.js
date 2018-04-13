var inputFilter = document.getElementById("inputFilter");
var searchButton = document.getElementById("searchButton");
var filterValue, baseURL, newURL;

function filter() {
	splitURL();
	newURL = baseURL[0];
	if (baseURL[1] != undefined) {
		if (!newURL.includes("sort")) {
			for (var i = 0; i < baseURL[1].length; i++) {		
				if (baseURL[1][i].includes("sort")) {
					if (!newURL.includes("?")) {
						newURL += "?";
					} else {
						newURL += "&";
					}
					newURL += baseURL[1][i];
				}
			}
		}
	}
	if (filterValue != "") {
		if (!newURL.includes("?")) {
			newURL += "?";
		} else {
			newURL += "&";
		} 
		newURL += "filter=" + filterValue;
	}
	location.href = newURL;
}

function getValues() {
	filterValue = inputFilter.value;
	baseURL = location.href;
}

function splitURL() {
	getValues();
	baseURL = baseURL.split("?");
	if (baseURL[1] != undefined) {
		baseURL[1] = baseURL[1].split("&");
	}
}

searchButton.addEventListener("click", filter);