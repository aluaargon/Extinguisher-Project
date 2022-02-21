$(document).ready(function () {  
    // Este script hace que las ventanas de la barra de navegación aparezcan y desaparezcan
    $("#user").on("click", () => {
        $(".user-container").css({visibility : "visible"});
        $(".info-container").css({visibility : "hidden"}); 
        $(".add-container").css({visibility : "hidden"}); 
        $(".filter-container").css({visibility : "hidden"}); 
    }); 
    $("#exit-user").on("click", function() {
        $(".user-container").css({visibility : "hidden"}); 
    });

    $("#info").on("click", () => {
        $(".info-container").css({visibility : "visible"});
        $(".user-container").css({visibility : "hidden"}); 
        $(".add-container").css({visibility : "hidden"}); 
        $(".filter-container").css({visibility : "hidden"}); 
    }); 
    $("#exit-info").on("click", function() {
        $(".info-container").css({visibility : "hidden"}); 
    });

    $("#add").on("click", () => {
        $(".add-container").css({visibility : "visible"});
        $(".user-container").css({visibility : "hidden"}); 
        $(".info-container").css({visibility : "hidden"}); 
        $(".filter-container").css({visibility : "hidden"}); 
    }); 
    $("#exit-add").on("click", function() {
        $(".add-container").css({visibility : "hidden"}); 
    });
    $("#filter").on("click", () => {
        $(".filter-container").css({visibility : "visible"});
        $(".add-container").css({visibility : "hidden"});
        $(".user-container").css({visibility : "hidden"}); 
        $(".info-container").css({visibility : "hidden"}); 
    }); 
    $("#exit-filter").on("click", function() {
        $(".filter-container").css({visibility : "hidden"}); 
    });
    // En esta parte nos le pide los datos de un usuario concreto al php
    $(".info-user").on("click", function() {
        // Aquí cojemos de un atributo de html que he creado yo el id del bug 
        let id = parseInt($(this).attr("data-bug-id")); 
        $.ajax({
            type: "GET",
            url : "/user-info/" + id // Aquí le solicito al servidor que me de los datos del usuario que le paso
        }).done((response) => {
            alert("El usuario de este bug es: " + response)
        }).fail((request) => alert("something went wrong " + request.status));
    })
});

