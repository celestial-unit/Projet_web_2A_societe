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


//jdyd new new 
const rangeInput = document.querySelector('input[type = "range"]');
const imageList = document.querySelector(".image-list");
const searchInput = document.querySelector('input[type="search"]');
const btns = document.querySelectorAll(".view-options button");
const photosCounter = document.querySelector(".toolbar .counter span");
const imageListItems = document.querySelectorAll(".image-list li");
const captions = document.querySelectorAll(".image-list figcaption p:first-child");
const myArray = [];
let counter = 1;
const active = "active";
const listView = "list-view";
const gridView = "grid-view";
const dNone = "d-none";

// SET VIEW
for (const btn of btns) {
  btn.addEventListener("click", function() {
    const parent = this.parentElement;
    document.querySelector(".view-options .active").classList.remove(active);
    parent.classList.add(active);
    this.disabled = true;
    document.querySelector('.view-options [class^="show-"]:not(.active) button').disabled = false;

    if (parent.classList.contains("show-list")) {
      parent.previousElementSibling.previousElementSibling.classList.add(dNone);
      imageList.classList.remove(gridView);
      imageList.classList.add(listView);
    } else {
      parent.previousElementSibling.classList.remove(dNone);
      imageList.classList.remove(listView);
      imageList.classList.add(gridView);
    }
  });
}

// SET THUMBNAIL VIEW - CHANGE CSS VARIABLE
rangeInput.addEventListener("input", function() {
  document.documentElement.style.setProperty("--minRangeValue",`${this.value}px`);
});

// SEARCH FUNCTIONALITY
for (const caption of captions) {
  myArray.push({
    id: counter++,
    text: caption.textContent
  });
}

searchInput.addEventListener("keyup", keyupHandler);

function keyupHandler() {
  for (const item of imageListItems) {
    item.classList.add(dNone);
  }
  const text = this.value;
  const filteredArray = myArray.filter(el => el.text.includes(text));
  if (filteredArray.length > 0) {
    for (const el of filteredArray) {
      document.querySelector(`.image-list li:nth-child(${el.id})`).classList.remove(dNone);
    }
  }
  photosCounter.textContent = filteredArray.length;
}

//add button
function redirectToAnother() {
    window.location.href = 'clubView.php';
}

