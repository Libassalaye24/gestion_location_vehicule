 
function addField(){
    var field = "<input type='file' name='file' value='' class='form-control-file image' aria-describedby='fileHelpId'/><br/>";
    document.getElementById('fields').innerHTML += field;
}
    function check(ele) {
    
        if (ele.checked == true ) {
            return true;
        }else{
            return false;
        }
        if (check(ele)==true) {
                var field = "<input type='file' name='file' value='' class='form-control-file image' aria-describedby='fileHelpId'/><br/>";
                document.getElementById('check').innerHTML += field;
         }
    
    }
   
 
function checkCheckBox(ele) {
 
    if (ele.checked == false ) {
        var div = document.getElementById("ajout");
        div.removeChild(div.firstChild);
    return false;
    }
    else {
        var input = document.createElement("input");
        input.type = "text";
        input.name = "name_de_l_input";
        document.getElementById("ajout").appendChild(input);
    }
    return true;
     
}
/* function myFunction() {
    if (  document.querySelector('#myradio2').checked ) {
        document.getElementById("myText").disabled = true;
       
    }else{
      document.getElementById("myText").disabled = false;
      
    }
       
  } */

  function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  } 

  function myFunction1() {
    var x = document.getElementById("Input");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  } 