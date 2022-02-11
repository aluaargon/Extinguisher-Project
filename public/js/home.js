$(document).ready(function () {  
    $("#log-in").click(function() {
        $.ajax({
            type: "GET", 
            url : "/login" 
        }).done((response) => {
           $(".user-container").html(response);
        }) 
    });

    $("#register").click(function() {
        $.ajax({
            type: "GET", 
            url : "/register" 
        }).done((response) => {
           $(".user-container").html(response);
        }) 
    });

    $("#log-out").click(function() {
        $.ajax({
            type: "GET", 
            url : "/logout" 
        }).done(() => location.reload())
    });
});