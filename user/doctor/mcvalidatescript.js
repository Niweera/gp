$(function(){
    $("#mcform").submit(function(){

        var valid=0;
        $(this).find('input[type=number]').each(function(){
            if($(this).val() != "") valid+=1;
        });

        if(valid){
            return true;
        }
        else {
            alert("Error: At least one drug must be filled out.");
            return false;
        }
    });
});
//this file is to validate the form of mc prescription sheet