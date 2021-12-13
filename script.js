function verif {

    
var errorADH = document.getElementById('errorADH');

     
    var adhe = document.forms["clubForm"]["adhe"].value;

      var autre = document.forms["clubForm"]["desc"];
    if (document.getElementById("autre").checked = true) {
        autre.style.display = "";
    }
    else {
        autre.style.display = "none";

    }
