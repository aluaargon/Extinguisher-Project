$(document).ready(function () {  
    // Aquí en vez de pedirle al servidor por ajax cosas simplemente cargo la página 
    // con una url que symfony interpreta y me ordena los bugs según el filtro
    // por priordidad o por fecha o por defecto
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