window.onload = function() {
   
    var XMLHttpRequestObject =  new XMLHttpRequest();
    // Inserta en el html principal la página de aviso legal por ajax puro
    document.getElementById("avisoLegal").addEventListener("click", function(e) {
        e.preventDefault();
        if(XMLHttpRequestObject) {
            var objeto = document.getElementsByTagName("main")[0];
            XMLHttpRequestObject.open("GET", "../avisoLegal.html");
            XMLHttpRequestObject.onreadystatechange = function(){
                if (XMLHttpRequestObject.readyState == 4 && XMLHttpRequestObject.status == 200) {
                    objeto.innerHTML = XMLHttpRequestObject.responseText;
                }
            }
        XMLHttpRequestObject.send(null);
        } 
            
    });
}