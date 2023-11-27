
/*document.addEventListener("DOMContentLoaded", function () {
    const allButton = document.getElementById("all");

    allButton.addEventListener("click", function () {
        window.location.href = "all.php";
    });
});
document.addEventListener("DOMContentLoaded", function () {
    const allButton = document.getElementById("paid");

    allButton.addEventListener("click", function () {
        window.location.href = "paidformation.php";
    });
});
document.addEventListener("DOMContentLoaded", function () {
    const allButton = document.getElementById("free");

    allButton.addEventListener("click", function () {
        window.location.href = "freeformation.php";
    });
});
document.addEventListener("DOMContentLoaded", function () {
    const allButton = document.getElementById("accelere");

    allButton.addEventListener("click", function () {
        window.location.href = "accelere.php";
    });
});
document.addEventListener("DOMContentLoaded", function () {
    const allButton = document.getElementById("normale");

    allButton.addEventListener("click", function () {
        window.location.href = "normal.php";
    });
});
document.addEventListener("DOMContentLoaded", function () {
    const allButton = document.getElementById("normalclasses");

    allButton.addEventListener("click", function () {
        window.location.href = "normalclasses.php";
    });
});
document.addEventListener("DOMContentLoaded", function () {
    const allButton = document.getElementById("nightclasses");

    allButton.addEventListener("click", function () {
        window.location.href = "nightclasses.php";
    });
});
document.addEventListener("DOMContentLoaded", function () {
    const allButton = document.getElementById("weekendclasses");

    allButton.addEventListener("click", function () {
        window.location.href = "weekend.php";
    });
});*/
function filterFormations() {
    var showAll = document.getElementById("all").checked;

    if (showAll) {
        // Effectuer une requête AJAX pour récupérer toutes les formations
        $.ajax({
            url: 'http://localhost/1/views/all.php', // Nom du script PHP qui récupère toutes les formations
            type: 'GET',
            success: function(data) {
                // Mettre à jour la section des formations avec les données récupérées
                document.getElementById("formations-list").innerHTML = data;
            },
            error: function(error) {
                console.log('Erreur lors de la récupération des formations:', error);
            }
        });
    } else {
        // Masquer ou réinitialiser la section des formations si nécessaire
        document.getElementById("formations-list").innerHTML = '';
    }
}
function filterFormations1() {
    var showAll = document.getElementById("paid").checked;

    if (showAll) {
        // Effectuer une requête AJAX pour récupérer toutes les formations
        $.ajax({
            url: 'http://localhost/1/views/paidformation.php', // Nom du script PHP qui récupère toutes les formations
            type: 'GET',
            success: function(data) {
                // Mettre à jour la section des formations avec les données récupérées
                document.getElementById("formations-list").innerHTML = data;
            },
            error: function(error) {
                console.log('Erreur lors de la récupération des formations:', error);
            }
        });
    } else {
        // Masquer ou réinitialiser la section des formations si nécessaire
        document.getElementById("formations-list").innerHTML = '';
    }
}
function filterFormations2() {
    var showAll = document.getElementById("free").checked;

    if (showAll) {
        // Effectuer une requête AJAX pour récupérer toutes les formations
        $.ajax({
            url: 'http://localhost/1/views/freeformation.php', // Nom du script PHP qui récupère toutes les formations
            type: 'GET',
            success: function(data) {
                // Mettre à jour la section des formations avec les données récupérées
                document.getElementById("formations-list").innerHTML = data;
            },
            error: function(error) {
                console.log('Erreur lors de la récupération des formations:', error);
            }
        });
    } else {
        // Masquer ou réinitialiser la section des formations si nécessaire
        document.getElementById("formations-list").innerHTML = '';
    }
}function filterFormations3() {
    var showAll = document.getElementById("accelere").checked;

    if (showAll) {
        // Effectuer une requête AJAX pour récupérer toutes les formations
        $.ajax({
            url: 'http://localhost/1/views/accelere.php', // Nom du script PHP qui récupère toutes les formations
            type: 'GET',
            success: function(data) {
                // Mettre à jour la section des formations avec les données récupérées
                document.getElementById("formations-list").innerHTML = data;
            },
            error: function(error) {
                console.log('Erreur lors de la récupération des formations:', error);
            }
        });
    } else {
        // Masquer ou réinitialiser la section des formations si nécessaire
        document.getElementById("formations-list").innerHTML = '';
    }
}
function filterFormations4() {
    var showAll = document.getElementById("normale").checked;

    if (showAll) {
        // Effectuer une requête AJAX pour récupérer toutes les formations
        $.ajax({
            url: 'http://localhost/1/views/normal.php', // Nom du script PHP qui récupère toutes les formations
            type: 'GET',
            success: function(data) {
                // Mettre à jour la section des formations avec les données récupérées
                document.getElementById("formations-list").innerHTML = data;
            },
            error: function(error) {
                console.log('Erreur lors de la récupération des formations:', error);
            }
        });
    } else {
        // Masquer ou réinitialiser la section des formations si nécessaire
        document.getElementById("formations-list").innerHTML = '';
    }
}
function filterFormations5() {
    var showAll = document.getElementById("normalclasses").checked;
    if (showAll) {
        // Effectuer une requête AJAX pour récupérer toutes les formations
        $.ajax({
            url: 'http://localhost/1/views/normalclasses.php', // Nom du script PHP qui récupère toutes les formations
            type: 'GET',
            success: function(data) {
                // Mettre à jour la section des formations avec les données récupérées
                document.getElementById("formations-list").innerHTML = data;
            },
            error: function(error) {
                console.log('Erreur lors de la récupération des formations:', error);
            }
        });
    } else {
        // Masquer ou réinitialiser la section des formations si nécessaire
        document.getElementById("formations-list").innerHTML = '';
    }
}
function filterFormations6() {
    var showAll = document.getElementById("nightclasses").checked;
    if (showAll) {
        // Effectuer une requête AJAX pour récupérer toutes les formations
        $.ajax({
            url: 'http://localhost/1/views/nightclasses.php', // Nom du script PHP qui récupère toutes les formations
            type: 'GET',
            success: function(data) {
                // Mettre à jour la section des formations avec les données récupérées
                document.getElementById("formations-list").innerHTML = data;
            },
            error: function(error) {
                console.log('Erreur lors de la récupération des formations:', error);
            }
        });
    } else {
        // Masquer ou réinitialiser la section des formations si nécessaire
        document.getElementById("formations-list").innerHTML = '';
    }
}
function filterFormations7() {
    var showAll = document.getElementById("weekendclasses").checked;
    if (showAll) {
        // Effectuer une requête AJAX pour récupérer toutes les formations
        $.ajax({
            url: 'http://localhost/1/views/weekend.php', // Nom du script PHP qui récupère toutes les formations
            type: 'GET',
            success: function(data) {
                // Mettre à jour la section des formations avec les données récupérées
                document.getElementById("formations-list").innerHTML = data;
            },
            error: function(error) {
                console.log('Erreur lors de la récupération des formations:', error);
            }
        });
    } else {
        // Masquer ou réinitialiser la section des formations si nécessaire
        document.getElementById("formations-list").innerHTML = '';
    }
}