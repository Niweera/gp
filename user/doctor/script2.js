function validateForm() {
    var val = 0;
    var x1 = document.forms["doclog"]["aspd"].value;
    var x2 = document.forms["doclog"]["atod"].value;
    var x3 = document.forms["doclog"]["clod"].value;
    var x4 = document.forms["doclog"]["enad"].value;
    var x5 = document.forms["doclog"]["glid"].value;
    var x6 = document.forms["doclog"]["losd"].value;
    var x7 = document.forms["doclog"]["metd"].value;
    var x8 = document.forms["doclog"]["mixd"].value;
    var x9 = document.forms["doclog"]["piod"].value;
    var x10 = document.forms["doclog"]["sitd"].value;
    var x11 = document.forms["doclog"]["told"].value;
    
    if (x1 == "") {
        val = val + 1;
    } 

    if (x2 == ""){
        val = val + 1;
    }
    if (x3 == ""){
        val = val + 1;
    }
    if (x4 == ""){
        val = val + 1;
    }
    if (x5 == ""){
        val = val + 1;
    }
    if (x6 == ""){
        val = val + 1;
    }
    if (x7 == ""){
        val = val + 1;
    }
    if (x8 == ""){
        val = val + 1;
    }
    if (x9 == ""){
        val = val + 1;
    }
    if (x10 == ""){
        val = val + 1;
    }
    if (x11 == ""){
        val = val + 1;
    }
    
    if (val == 11){
        alert("At least one drug must be filled out");
        return false;
    }
   

    
    
}