$(document).ready(function () {  
    $("form").on("submit", (e) => {
        e.preventDefault();
        $("form")[0].reset();
        $(".add-container").css({visibility : "hidden"});
    });
     $("#submit").on("click", function() {
         $.ajax({
             type: "GET", 
             url : "/insert/" + $("#description").val() + "/" + $("#priorities").val() 
         }).done((response) => $("#notAssigned").append(response))
         .fail((request) => alert("something went wrong " + request.status));
     });
});