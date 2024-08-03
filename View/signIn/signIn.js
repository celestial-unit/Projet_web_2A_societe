

const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');
const email=document.getElementById("email").value;
const pwd=document.getElementById("pwd").value;
//authentification
/*
const store = {};
store.setJWT = function (data) {
    this.JWT = data;
  };


  loginForm.addEventListener('submit', async (e) => { // Mise à jour ici
    e.preventDefault();

    const res = await fetch('../../Model/authenticate.php', {
        method: 'POST',
        headers: {
            'Content-type': 'application/x-www-form-urlencoded; charset=UTF-8'
        },
        body: JSON.stringify({
            username: email,
            password: pwd,
        })
    });

    if (res.status >= 200 && res.status <= 299) {
        const jwt = await res.text();
        store.setJWT(jwt);
        loginForm.style.display = 'none';
        //btnGetResource.style.display = 'block';
    } else {
        // Handle errors
        console.log(res.status, res.statusText);
    }
});
*/



signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});


function verifierRole(event) 
{ 
    var b=document.getElementById("button");
    b.addEventListener('click', function(e)
    {
    event.preventDefault();
    var role = document.getElementById('role').value;
    var pwd=document.getElementById('pwd').value;
    var nom=document.getElementById('name').value;
    var email=document.getElementById('email').value;
    var erreurMessage = "";
    if (nom === "" && email === "" && pwd === "" && role === "") {
        alert("Veuillez remplir ces champs");
    } else if (nom === "") {
        alert("Veuillez entrer votre nom.");
    } else if (email === "") {
        alert("Veuillez entrer votre adresse email.");
    } else if (pwd === "") {
        alert("Veuillez entrer votre mot de passe.");
    } else if (role === "" || (role !== "etudiant" && role !== "formateur" && role !== "recruteur")) {
        alert("Le champ 'rôle' doit être rempli avec 'etudiant', 'formateur' ou 'recruteur'.");
    }
    
    });
}


