/*var form = document.querySelector("form");
var nom=document.getElementById("name");
var email=document.getElementById("email");
form.addEventListener("submit",function(e)
{
    e.preventDefault();
    validernom();  
   // validemail()
});
function validernom()
{
    const nomc=/^[A-Za-z]+$/;
    var erreurnom= document.getElementById("erreurnom");
    if(nom.value.length<1 || !nom.value.match(nomc))
    {
        erreurnom.innerHTML=" veuiller entrer un nom valide ";
        console.log('erreur');
    }
    else
{
    erreurmail.innerHTML="";
}
}

/*function validemail()
{
 var erreurmail=document.getElementById("erreurmail");
if(!email.value.includes('@gmail.com'))
{
   erreurmail.innerHTML="Email incorrect veuiller entrer un email valide";
   console.log('erreur');
}
else
{
    erreurmail.innerHTML="";
}
}*/
/*function validemail() {
    var erreurmail=document.getElementById("erreurmail");
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(email.value)) {
        erreurmail.innerHTML = "Email incorrect, veuillez entrer un email valide";
        console.log('erreur');
    } else {
        erreurmail.innerHTML = ""; 
    }
}

email.addEventListener("keyup",function(e)
{
   e.preventDefault();
    validemail();
});*/
//var form = document.getElementById("form");
var nom = document.getElementById("name");
var email = document.getElementById("email");

nom.addEventListener("input", validernom);
email.addEventListener("input", validemail);
form.addEventListener("submit", function (e) {
    e.preventDefault();
});

function validernom() {
    const nomc = /^[A-Za-z]+$/;
    var erreurnom = document.getElementById("erreurnom");
    if (nom.value.length < 1 || !nom.value.match(nomc)) {
        erreurnom.innerHTML = "Veuillez entrer un nom valide";
    } else {
        erreurnom.innerHTML = "";
    }
}

function validemail() {
    var erreurmail = document.getElementById("erreurmail");
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(email.value)) {
        erreurmail.innerHTML = "Email incorrect, veuillez entrer un email valide";
    } else {
        erreurmail.innerHTML = "";
    }
}
function switchpage()
{
    var b = document.getElementById("submit");
    b.addEventListener("submit", function (e) {
        e.preventDefault();
        header('Location: process.php');
    });

}