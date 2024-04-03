//document.addEventListener("DOMContentLoaded", function(event){
 // })*/
  /*function switchpage()
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
}*/
document.addEventListener("DOMContentLoaded", function() {
    var form = document.getElementById("survey-form");
    var dateInput = document.getElementById("datedebut");
    var dateErreur = document.getElementById("dateerreur");

    function validateDate() {
        var inputDate = new Date(dateInput.value);
        var currentDate = new Date();

        if (inputDate < currentDate) {
            alert("La date doit être supérieure à la date d'aujourd'hui");
            dateErreur.innerHTML = "La date doit être supérieure à la date d'aujourd'hui";
        } else {
            dateErreur.innerHTML = ""; // Efface le message d'erreur s'il n'y a pas d'erreur
        }
    }

    dateInput.addEventListener("change", function() {
        validateDate();
    });
    form.addEventListener("submit", function(e) {
        // Ajoutez ici d'autres validations si nécessaire
        validateDate();

        // Empêche la soumission du formulaire si la validation échoue
        if (dateErreur.innerHTML !== "") {
            e.preventDefault();
        }
    });
});
