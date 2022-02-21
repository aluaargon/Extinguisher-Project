$(document).ready(function () {  
    // Este script me controla lo que hace el formulario que me añade los bugs
    $("#add-form").on("submit", (e) => {
        // Hago que el formulario se limpie y desaparezca cuando hago un sumbit
        e.preventDefault();
        $("form")[0].reset();
        $(".add-container").css({visibility : "hidden"});
    });

     $("#submit").on("click", function() {
         // al mismo tiempo del sumbit le envió al php los datos para que me inserte el bug en la base de datos
         $.ajax({
             type: "GET", 
             url : "/insert/" + $("#description").val() + "/" + $("#priorities").val() 
         }).done((response) => {
            $("#notAssigned").append(response);
            window.location.reload(true);
         })
         .fail((request) => alert("something went wrong " + request.status));
     });
});