$(document).ready(function () {  
    $("#move-right").on("click", function() {
        let id = $(this).parent().parent().parent().attr('id');
        $.ajax({
             type: "GET",
             url : "/move/" + id
        }).done((response) => {
            alert(response)
            location.reload()
        }).fail((request) => alert("something went wrong " + request.status));
    });
});