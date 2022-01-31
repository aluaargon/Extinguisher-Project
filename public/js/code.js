$(document).ready(function () {  
    $("#user").on("click", () => {
        $(".user-container").css({visibility : "visible"});
        $("#user").addClass("active");
    }); 
    $("#exit-user").on("click", function() {
        $(".user-container").css({visibility : "hidden"}); 
        $("#user").removeClass("active");
    });
    $("#info").on("click", () => {
        $(".info-container").css({visibility : "visible"});
        $("#info").addClass("active");
    }); 
    $("#exit-info").on("click", function() {
        $(".info-container").css({visibility : "hidden"}); 
        $("#info").removeClass("active");
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
