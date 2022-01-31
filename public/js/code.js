$(document).ready(function () {  
    $("#user").on("click", () => sacardatos("/user-info"))    
});
function sacardatos(datos) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        console.log(this.responseText);
        document.getElementsByClassName("container")[0].innerHTML += this.responseText;
    }
    
    xhttp.open("GET", datos);
    xhttp.send(); 
   
}
