// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};
// compte.js

document.addEventListener('DOMContentLoaded', function () {
  var personalInfoLink = document.getElementById('viewPersonalInfo');
  var additionalInfoSection = document.querySelector('.additional-info-section');

  personalInfoLink.addEventListener('click', function () {
      // Afficher ou masquer la section d'informations personnelles supplémentaires
      additionalInfoSection.style.display = 'block'; 

      // Rediriger vers une autre page pour les informations personnelles (remplacez "autre_page.php" par votre URL)
      window.location.href = 'autre_page.php';
  });

  // Ajoutez ici le code pour revenir au tableau de bord après l'enregistrement des informations
});

