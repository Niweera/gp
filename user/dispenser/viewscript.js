$(document).ready(function(){
	view_data();
	function view_data(query)
	{
		$.ajax({
			url:"newdate.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#newresult').html(data);
				var neew = document.getElementById("newresult").innerText.trim();
				if (neew != '*No new system messages!'){
					$("#okButton").prop('disabled', false);
				}else{
					$("#okButton").attr('disabled','disabled');
				}
			}/*,
			complete: function() {
				// Schedule the next request when the current one's complete
				setTimeout(load_data, 20000); //the load_data function will execute every two seconds
			}*/
		});
	}

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

	viewed_data();
	function viewed_data(timestamp)
	{
		$.ajax({
			url:"vieweddata.php",
			method:"post",
			data:{timestamp:timestamp},
			success:function(data)
			{
				read_data();
				view_data();
			}
		});
	}
	
	$('#newdate').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			view_data(search);
		}
		else
		{
			view_data();			
		}
	});
	
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
		var search = $('#newdate').val();
		if(search != '')
		{
			read_data(search);
			view_data(search);
		}
		else
		{
			read_data();
			view_data();			
		}
	});
	
	$("#readButton").click(function(){
		var search = $('#readdate').val();
		if(search != '')
		{
			view_data(search);
			read_data(search);
		}
		else
		{
			view_data();
			read_data();			
		}
	});


	$("#okButton").click(function(){
		var timestamp = new Date();
		viewed_data(timestamp);
	});
	

	
	
});
//this file is for viewing the new sys msgs from ajax calls
