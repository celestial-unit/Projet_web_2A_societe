//document.addEventListener("DOMContentLoaded", function(event){
 // });
  function switchpage()
{
    var b = document.getElementById("save");
    b.addEventListener("save", function (e) {
        e.preventDefault();
        header('Location: newcrudview.php');
    });
}
function switchpage1()
{
    var b = document.getElementById("update");
    b.addEventListener("update", function (e) {
        e.preventDefault();
        header('Location: newcrudview.php');
    });
}
var form= document.getElementById("survey-form");
var date=document.getElementById("datedebut");
function validateDate ()
{
    var inputDate = new Date(document.getElementById("datedebut").value);
    var currentDate = new Date();
    if (inputDate < currentDate) {
        alert("la date doit etre supreieur a la date d'aujourd'hui");
        dateerreur.innerHTML="la date doit etre supreieur a la date d'aujourd'hui";
    } 
}
email.addEventListener("keyup",function(e)
{
    e.preventDefault();
    validateDate();
});