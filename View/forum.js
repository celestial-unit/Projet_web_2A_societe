

function verif() {
    let titre = document.getElementById("titre").value;
    let description = document.getElementById("description").value;
  
    if (titre === "") {
      alert("Veuillez saisir le titre.");
      return false;
    }
  
    if (description === "") {
      alert("Veuillez saisir la description.");
      return false;
    }
  
    return true;
  }
  