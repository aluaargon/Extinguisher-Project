$(document).ready(function () {  
    $(".move-right").click(function() {
        let id = parseInt($(this).attr("data-bug-id"));
        let nextStatus = parseInt($(this).attr("data-next-status"));
        $.ajax({
            type: "GET",
            url : "/move/" + id + "/" + nextStatus
        }).done((response) => {
            alert(response)
            location.reload()
        }).fail((request) => alert("something went wrong " + request.status));
    });
    $(".move-left").click(function() {
        let id = parseInt($(this).attr("data-bug-id"));
        let prevStatus = parseInt($(this).attr("data-prev-status"));

        $.ajax({
            type: "GET",
            url : "/move/" + id + "/" + prevStatus
        }).done((response) => {
            alert(response)
            location.reload()
        }).fail((request) => alert("something went wrong " + request.status));
    });
});