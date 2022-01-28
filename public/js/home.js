$("#demo").on("click", function() {
    console.log("lol");
    $.ajax({
        type: "GET",
        url : "/demo"
    }).done(() => alert("done"))
    .fail((request) => alert("something went wrong " + request.status));
   });