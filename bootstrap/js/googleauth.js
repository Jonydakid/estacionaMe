function onSignIn(googleUser) {
	var token = googleUser.getAuthResponse().id_token;

	var xhr = new XMLHttpRequest();
	
    xhr.open('POST', "gauth/index");
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	
	
	xhr.onload = function() {
	  console.log('Signed in as: ' + xhr.responseText);
	}

	xhr.send('idtoken=' + token);
}

function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
}


function onSuccess(googleUser) {
	var profile= googleUser.getBasicProfile().g;
	}

function onFailure(error) {
	console.log(error);
}

function renderButton() {
	gapi.signin2.render('my-signin2', {
	'scope': 'profile email',
	'width': 150,
	'height': 50,
	'longtitle': false,
	'X-Requested-With': 'XMLHttpRequest',
	'theme': 'dark',
	'onsuccess': onSignIn,
	'onfailure': onFailure
	});
}