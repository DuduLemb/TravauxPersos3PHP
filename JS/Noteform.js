// JavaScript pour afficher la fenêtre modale pour l'ajout
var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");

btn.onclick = function() {
  modal.style.display = "block";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

// JavaScript pour envoyer les données du formulaire au serveur
var form = document.getElementById("note-form");
form.addEventListener("submit", function(event) {
   event.preventDefault(); // Empêche le rechargement de la page

   var noteint = document.getElementById("noteint").value;
   var notecont = document.getElementById("notecont").value;

   // Création de l'objet de données à envoyer
   var data = {
      noteint  : noteint,
      notecont : notecont,
   };
   // Envoi des données via AJAX
   var xhr = new XMLHttpRequest();
   xhr.open("POST", "./Notesave.php", true);
   xhr.setRequestHeader("Content-Type", "application/json");
   xhr.onreadystatechange = function() {
       if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
           alert("Produit enregistré avec succès !");
           form.reset(); // Réinitialise le formulaire
           modal.style.display = "none"; // Ferme la fenêtre modale
           transfererTableau(); 
       }
   };
   xhr.send(JSON.stringify(data));
});

//Appeller la fonction au chargement de la page
window.addEventListener("load", transfererTableau);



function transfererTableau()
{
  var xhr = new XMLHttpRequest();
    xhr.open("POST", "./Notebase.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function(response) {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            document.getElementById("tableau2").innerHTML = response.currentTarget.response;
            AddDeleteListeners();
            AddUpdateListeners();
        }
    };
    xhr.send();
}


function AddDeleteListeners() {
  var deleteButtons = document.querySelectorAll('.deleteBtn');
      
  deleteButtons.forEach(function(button) {
  button.addEventListener('click', function() {
      var row = this.closest('tr'); // Trouve la ligne parente du bouton cliqué
      var id = row.cells[0].textContent.trim(); // Récupère l'ID (et enlève les espaces)
      // Envoyer une requête AJAX pour supprimer la ligne
      deleteRow(id);
    });
  });

  // Fonction pour envoyer la requête AJAX
  function deleteRow(rowId) {
    // Créer une nouvelle requête AJAX
    const xhr = new XMLHttpRequest();

    // Définir la méthode et l'URL de la requête
    xhr.open('POST', 'Notedelete.php', true);

    // Définir l'en-tête de la requête
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // Définir la fonction de callback pour la réponse de la requête
    xhr.onreadystatechange = function(response) {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        // Supprimer la ligne du tableau
        /*const row = btn.closest('tr');
        row.remove();*/
        console.log('Ligne supprimée avec succès !');
        console.log(response.currentTarget.response)
      }
    };

    // Envoyer la requête avec l'ID de la ligne à supprimer
    xhr.send('row_id=' + rowId);
  }
     }

function AddUpdateListeners() {
  // JavaScript pour afficher la fenêtre modale pour la modification     
var updateButtons = document.querySelectorAll('.updateBtn');
var modalu = document.getElementById("modalupdate");

updateButtons.forEach(function(button) {
  button.addEventListener('click', function() {
    modalu.style.display = "block";
    });
  });

window.onclick = function(event) {
  if (event.target == modalu ) {
    modalu.style.display = "none";
  }
}
}
