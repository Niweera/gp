$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"fetch.php",
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
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
	
	$("#thisButton").click(function(){
		var search = $('#search_text').val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
	
});

