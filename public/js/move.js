$(document).ready(function () {  
    // Este script le pide a symfony que modifique los bugs según lo que quiera el usuario
    $(".assign").click(function() {
        let id = parseInt($(this).attr("data-bug-id")); // Saca el id del bug gracias a un atributo en el html
        let user = parseInt($(this).attr("data-user-id")); // Saca el usario que esta logeado al que asignar el bug
        $.ajax({
            type: "GET",
            url : "/assign/" + id + "/" + user
        }).done((response) => {
            // alert(response)
            location.reload()
        }).fail((request) => alert("something went wrong " + request.status));
    });
    $(".move-right").click(function() {
        let id = parseInt($(this).attr("data-bug-id")); // Saca el id del bug gracias a un atributo en el html
        let nextStatus = parseInt($(this).attr("data-next-status")); // Saca el estado siguiente al que hay que pasar el bug
        $.ajax({
            type: "GET",
            url : "/move/" + id + "/" + nextStatus
        }).done((response) => {
            // alert(response)
            location.reload()
        }).fail((request) => alert("something went wrong " + request.status));
    });
    $(".move-left").click(function() {
        let id = parseInt($(this).attr("data-bug-id")); // Saca el id del bug gracias a un atributo en el html
        let prevStatus = parseInt($(this).attr("data-prev-status"));// Saca el estado siguiente al que hay que pasar el bug
        $.ajax({
            type: "GET",
            url : "/move/" + id + "/" + prevStatus
        }).done((response) => {
            // alert(response)
            location.reload()
        }).fail((request) => alert("something went wrong " + request.status));
    });
});