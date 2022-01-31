$(document).ready(function () {  
    $("#user").on("mouseover", function() {
       $("#user").addClass("active");
    }); 
    $("#user").on("mouseout", function() {
        $("#user").removeClass("active");
    });

    $("#add").on("mouseover", function() {
        $("#add").addClass("active");
    }); 
    $("#add").on("mouseout", function() {
        $("#add").removeClass("active");
    });

    $("#info").on("mouseover", function() {
        $("#info").addClass("active");
    }); 
    $("#info").on("mouseout", function() {
        $("#info").removeClass("active");
    });
});