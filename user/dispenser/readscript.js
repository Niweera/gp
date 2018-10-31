$(document).ready(function(){
	read_data();
	function read_data(query)
	{
		$.ajax({
			url:"readdate.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#readresult').html(data);
			}/*,
			complete: function() {
				// Schedule the next request when the current one's complete
				setTimeout(load_data, 20000); //the load_data function will execute every two seconds
			}*/
		});
	}
	
	$('#readdate').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			read_data(search);
		}
		else
		{
			read_data();			
		}
	});
	
	$("#newButton").click(function(){
		var search = $('#readdate').val();
		if(search != '')
		{
			read_data(search);
		}
		else
		{
			read_data();			
		}
	});
	
	$("#readButton").click(function(){
		var search = $('#readdate').val();
		if(search != '')
		{
			read_data(search);
		}
		else
		{
			read_data();			
		}
	});
});
//this file is for selecting the viewed/read sys msgs from ajax calls
