$(document).ready(function () {  
    $("#user").on("click", () => {
        sacardatos("/user-info")
    }); 
    $("#exit").on("click", function name(params) {
        $(".user-container").remove(); 
    });
});
function sacardatos(datos) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        console.log(this.responseText);
        document.body.innerHTML += this.responseText;
    }
    
    xhttp.open("GET", datos);
    xhttp.send(); 
   
}
