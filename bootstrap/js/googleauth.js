function onSuccess(googleUser) {
  var profile = googleUser.getBasicProfile();
  var idtoken = gapi.auth2.getAuthInstance().id_token;
   //Envío de datos rescatados a través de JSON
  var xhr= new XMLHttpRequest();
  //Se inicializa 
  xhr.open('POST','gauth');
  //Se configura el XHR
  xhr.setRequestHeader("Content-Type", 'application/x-www-form-urlencoded');
  //Se genera el json, nombre de json es user.
  const jsonAEnviar = "user=" + JSON.stringify({token:idtoken,nombre:profile.getGivenName(), apellido:profile.getFamilyName(),email:profile.getEmail()});
  xhr.send(jsonAEnviar);

  
  //Cuando cambia el estado de la petición, se realiza el encoding de json
  xhr.onreadystatechange = function() 
	{

  		if (this.readyState == 4 && this.status == 200) 
  		{
  			var usuario=sessionStorage.getItem("user");
   			document.getElementById("nomUsuario").placeholder = profile.getGivenName()+" "+profile.getFamilyName();
   			document.getElementById("email").placeholder = profile.getEmail();
		}
	}

	
}
function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      alert("Desconectado");
    });
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
	'onsuccess': onSuccess,
	'onfailure': onFailure
	});
}

