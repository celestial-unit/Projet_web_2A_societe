/*document.addEventListener("DOMContentLoaded", function () {
    const checkboxes = document.querySelectorAll(".filter__content input[type=checkbox]");

    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener("change", updateURL);
    });

    function updateURL() {
        const filters = {};
        checkboxes.forEach(function (checkbox) {
            filters[checkbox.id] = checkbox.checked;
        });

        const queryString = Object.keys(filters)
            .filter(key => filters[key])
            .map(key => key + "=" + filters[key])
            .join("&");

        const newURL = window.location.pathname + "?" + queryString;
        window.history.pushState({ path: newURL }, "", newURL);
    }
});*/
document.addEventListener("DOMContentLoaded", function () {
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
});