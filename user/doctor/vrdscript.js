$(document).ready(function(){
    $('.search-box2 input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal2 = $(this).val();
        var resultDropdown2 = $(this).siblings(".result2");
        if(inputVal2.length){
            $.get("vrd-search.php", {term: inputVal2}).done(function(data){
                // Display the returned data in browser
                resultDropdown2.html(data);
            });
        } else{
            resultDropdown2.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result2 p", function(){
        $(this).parents(".search-box2").find('input[type="text"]').val($(this).text());
        $(this).parent(".result2").empty();
    });
});


//this script5.js file is the script file for backend-search4.php file only for view patient medical records 