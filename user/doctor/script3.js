function validateForm() {
    var val = 0;
    var x1 = document.forms["doclog"]["aspd"].value;
    var x2 = document.forms["doclog"]["losd"].value;
    var x3 = document.forms["doclog"]["clod"].value;
    var x4 = document.forms["doclog"]["htcd"].value;
    var x5 = document.forms["doclog"]["verd"].value;
    var x6 = document.forms["doclog"]["dild"].value;
    var x7 = document.forms["doclog"]["metod"].value;
    var x8 = document.forms["doclog"]["card"].value;
    var x9 = document.forms["doclog"]["ated"].value;
    var x10 = document.forms["doclog"]["lasd"].value;
    var x11 = document.forms["doclog"]["oled"].value;
    var x12 = document.forms["doclog"]["amld"].value;
    var x13 = document.forms["doclog"]["atod"].value;
    var x14 = document.forms["doclog"]["gtnd"].value;
    var x15 = document.forms["doclog"]["ismd"].value;
    var x16 = document.forms["doclog"]["nsrd"].value;
    
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
    if (x12 == ""){
        val = val + 1;
    }
    if (x13 == ""){
        val = val + 1;
    }
    if (x14 == ""){
        val = val + 1;
    }
    if (x15 == ""){
        val = val + 1;
    }
    if (x16 == ""){
        val = val + 1;
    }
    
    if (val == 16){
        alert("At least one drug must be filled out");
        return false;
    }
   

    
    
}

//this script2.js file is the validation script file for mc clinic prescription sheet