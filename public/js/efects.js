$(document).ready(function () {  
    $("#user").on("mouseover", function() {
       $("#user").css({color : "black"})
    }); 
    $("#user").on("mouseout", function() {
        $("#user").css({color : "#767676"})
    });

    $("#add").on("mouseover", function() {
        $("#add").css({color : "black"})
        console.log("dev1");
    }); 
    $("#add").on("mouseout", function() {
        $("#add").css({color : "#767676"})
    });
});