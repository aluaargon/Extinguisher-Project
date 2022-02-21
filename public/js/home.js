$(document).ready(function () {  
    // En este script mediante ajax le pido a symfony que me haga el 
    // login, el logout o el registro dependiendo de lo que quiera el usuario
    $("#log-in").click(function() {
        $.ajax({
            type: "GET", 
            url : "/login" 
        }).done((response) => {
           $(".user-container").html(response);
           $("#get-back").on( "click", function() {
            location.reload();
            });
        });
    });

    $("#register").click(function() {
        $.ajax({
            type: "GET", 
            url : "/register" 
        }).done((response) => {
           $(".user-container").html(response);
           $("[name='registration_form']").prop("action", "/register")
           $("#get-back").on( "click", function() {
            location.reload();
            });
        });
    });

    $("#log-out").click(function() {
        $.ajax({
            type: "GET", 
            url : "/logout" 
        }).done(() => location.reload())
    });
   
});