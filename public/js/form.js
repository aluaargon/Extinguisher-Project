$(document).ready(function () {  
    $("#add-form").on("submit", (e) => {
        e.preventDefault();
        $("form")[0].reset();
        $(".add-container").css({visibility : "hidden"});
    });
     $("#submit").on("click", function() {
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