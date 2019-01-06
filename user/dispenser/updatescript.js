$("#updateButton").click( function() {
	$.post( $("#myForm").attr("action"), 
			$("#myForm :input").serializeArray(), 
			function(info){ $("#result").html(info); 
	  });
	clearInput();
});
	
$("#myForm").submit( function() {
	return false;	
});

function clearInput() {
	$("#myForm :input").each( function() {
		$(this).val('');
	});
}


$(document).ready(function(){
	$('#drugid').blur(function(){
	   var value = $(this).val(); 
	   liveCheckID(value);
	});
 });
 
 function liveCheckID(val) {
	 $.post('process.php',{'drugid':val}, function(data){
		 if(data == "Found") {
			 $('#search-result').html("<p style='color:red;'>X</p>");
		 } else {
			 $('#search-result').html("<p style='color:green;'>OK</p>");
		 }
	 }).fail(function(xhr, ajaxOptions, throwError) {
	 alert(throwError);
	 });
 }
 //this file is for ajax support in adddrugs.php