$(document).ready(function () {  
    $("#filter-by-priority").click(function() {
        location.pathname = '/filter/priority';    
    });
    $("#filter-by-date").click(function() {
        location.pathname = '/filter/date';
    });
    $("#filter-reset").click(function() {
        location.pathname = '/';
    });
});