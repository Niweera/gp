$( function() {
    $( "#dialog" ).dialog();
} );
$(document).ready(function () {
    $('#submitButton').click(function() {
    checked = $("input[type=checkbox]:checked").length;
    radiocheck = $("input[type=radio]:checked").length;

    if(!checked) {
        alert("You must check at least one clinic!");
        return false;
    }
    if(!radiocheck) {
        alert("You must check at least one gender!");
        return false;
    }

    });
});