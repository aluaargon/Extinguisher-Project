$(document).ready(function () {  
   $("#user").on("mouseover", function() {
       $("#user").css({color : "green"})
   }); 
   $("#user").on("mouseout", function() {
    $("#user").animate({color : "#767676"})
});
});