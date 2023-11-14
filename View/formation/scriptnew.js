var myApp = angular.module('myApp', []);

myApp.controller('namesCtrl', function ($scope, $http) {
    $scope.triggerForm = false;
    $scope.editForm = false;
    $scope.addForm = false;
    $scope.order = 'Nom'; // Adjusted the default order property
    $scope.formations = [];

    // Fetch formations from the server
    $scope.getFormations = function () {
        $http.get('api.php?action=afficherFormation')
            .then(function (response) {
                $scope.formations = response.data;
            })
            .catch(function (error) {
                console.error('Error fetching formations:', error);
            });
    };

    $scope.orderBy = function (filter) {
        $scope.order = filter;
    };

    $scope.editFormation = function (formation) {
        $scope.triggerForm = true;
        $scope.editForm = true;
        $scope.addForm = false;
        $scope.emailExisted = false;
        $scope.editFormationId = formation.id_formation;
        $scope.crudFormNom = formation.Nom;
        $scope.crudFormPaiement = formation.paiement;
        $scope.crudFormDomaine = formation.Domaine;
        $scope.crudFormNiveau = formation.niveau;
        $scope.crudFormImageUrl = formation.image_url;
        $scope.crudFormDescription = formation.description;
    };

    $scope.saveEdit = function () {
        var formData = {
            Nom: $scope.crudFormNom,
            paiement: $scope.crudFormPaiement,
            Domaine: $scope.crudFormDomaine,
            niveau: $scope.crudFormNiveau,
            image_url: $scope.crudFormImageUrl,
            description: $scope.crudFormDescription
        };

        if ($scope.editFormationId) {
            $http.post('api.php?action=updateFormation&id=' + $scope.editFormationId, formData)
                .then(function (response) {
                    $scope.getFormations();
                    $scope.clearForm();
                })
                .catch(function (error) {
                    console.error('Error updating formation:', error);
                });
        } else {
            $http.post('api.php?action=addFormation', formData)
                .then(function (response) {
                    $scope.getFormations();
                    $scope.clearForm();
                })
                .catch(function (error) {
                    console.error('Error adding formation:', error);
                });
        }

        $scope.triggerForm = false;
        $scope.editForm = false;
        $scope.editFormationId = null;
    };
    $scope.deleteFormation = function (formation) {
        var confirmation = confirm('Are you sure you want to delete this formation?');

        if (confirmation) {
            $http.post('api.php?action=deleteFormation&id=' + formation.id_formation)
                .then(function (response) {
                    $scope.getFormations();
                })
                .catch(function (error) {
                    console.error('Error deleting formation:', error);
                });
        }
    };

    $scope.addFormation = function() {
        var formationData = {
            id_formation: $scope.crudFormIdFormation,
            nom: $scope.crudFormNom,
            paiement: $scope.crudFormPaiement,
            domaine: $scope.crudFormDomaine,
            niveau: $scope.crudFormNiveau,
            image_url: $scope.crudFormImageUrl,
            description: $scope.crudFormDescription
        };

        $http.post('addformation.php', formationData)
            .then(function(response) {
                // Gérer la réponse après l'ajout de la formation
                console.log(response.data);
                // Peut-être mettre à jour la liste des formations ou effectuer d'autres actions nécessaires
            })
            .catch(function(error) {
                console.error('Erreur lors de l\'ajout de la formation:', error);
            });
    };
    function submitForm(id_formation) {
        document.getElementById("id_formation_input").value = id_formation;
        document.forms[0].submit();
    };
    // Fetch formations on page load
    $scope.getFormations();
});
   