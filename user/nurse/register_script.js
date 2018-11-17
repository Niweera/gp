$(document).ready(function(){
	load_data("query");
	function load_data(query)
	{
		$.ajax({
			url:"register_getuser.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}/*,
			complete: function() {
				// Schedule the next request when the current one's complete
				setTimeout(load_data, 20000); //the load_data function will execute every two seconds
			}*/
		});
	}	
});
//register_script.js is the ajax file for register_getuser.php and the basic view inventory pages
