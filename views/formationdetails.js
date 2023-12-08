function showMenu(event){
            
    event.preventDefault();

    let element = document.getElementById('header');

    if(element.classList.contains('active')){
        element.className ="";
        } else {
            element.className = "active";
        }
}