$(function() {

    $(".card button").click(function(e){
    
        e.stopPropagation();

    	$(this).siblings(".card-text").toggleClass("active");
        $(this).toggleClass("active");

    });

    $(".card .card-picture , .card-content h2").click(function(){

        alert("affichage de la popup");

    });

    //MODAL
    const modal = document.getElementById('modal');
    document.getElementById('close').addEventListener('click', () => modal.classList.remove('show-modal'));
    window.addEventListener('click', e =>
         e.target === modal ? modal.classList.remove('show-modal'): false
    );
    $(".tooltip").click(function(){
        var modalContent = $(this).siblings(".info-securite").html();
        $("#modal .modal-content").html(modalContent);
        $("#modal").toggleClass("show-modal")
    });

});