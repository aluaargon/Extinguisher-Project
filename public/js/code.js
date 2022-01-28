$(document).ready(function () {
   let bugTest = {
        id: 1,
        description: $("#description")[0].innerHTML,
        tag: $(".tag")[0].innerHTML,
        user: "user1"
   }
   
   $("#user").on("click", function() {
       $.ajax({
           type: "GET",
           url : "/bug/" + JSON.stringify(bugTest)
       }).done((response) => $("#droppable").append(response))
       .fail((request) => alert("something went wrong " + request.status));
   });
});