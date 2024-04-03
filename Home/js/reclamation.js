
  var btn = document.getElementById('btn');

btn.addEventListener('click', function(e) {
    e.preventDefault();
    var titre = document.getElementById('sujet').value;
    var subject = document.getElementById('subject').value;
    var email = 'chouaia.mohamedaziz@esprit.tn';
    var body = 'Name: ' + titre + '<br/> Email: ' +'chouaia.mohamedaziz@esprit.tn' + '<br/> Subject: ' + subject;

    Email.send({
        Host: "smtp.elasticemail.com",
        Username: "chouaia.mohamedaziz@esprit.tn",
        Password: "053F230DA3CD7EAE31D3F342B98D73035615", // Replace with your Elastic Email API key
        To: 'medazizchouaia786@gmail.com',
        From: 'chouaia.mohamedaziz@esprit.tn',
        Subject: name,
        Body: body,
        SecureToken: "true",
        Port: 2525
    }).then(
        function(response) {
            // Check if the email was sent successfully
            if (response === 'OK') {
                // If successful, proceed to store data in the database
                storeDataInDatabase();
            } else {
                // Handle the case where the email sending failed
                alert('Email sending failed. Please try again.');
            }
        }
    );
});

function storeDataInDatabase(titre, type_reclamation, etat, subject) {
  var titre = document.getElementById('sujet').value;
    var type_r = document.getElementById('type_reclamation').value;
    var etat ='en cours de traitement';
    var subject = document.getElementById('subject').value;
  $(document).ready(function() {
    $("#rec").load(".../View/front/recBase.php",{
            titre: titre,
            type_reclamation : type_r,
            etat: etat,
            subject : subject
          })
  })
   
    
}



