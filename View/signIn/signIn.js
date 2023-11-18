const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

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


