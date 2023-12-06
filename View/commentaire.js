

function verif() {
    let contenu = document.getElementById("contenu").value;
    let id_forum = document.getElementById("id_forum").value;
  
    if (contenu === "") {
      alert("Veuillez saisir le contenu.");
      return false;
    }
  
    if (id_forum === "") {
      alert("Veuillez choisir le forum.");
      return false;
    }
  
    return true;
  }
  