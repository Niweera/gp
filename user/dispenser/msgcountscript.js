$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"mcfetch.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#msgCount').html(data);
			},
			complete: function() {
				// Schedule the next request when the current one's complete
				setTimeout(load_data("msgcount"), 60000); //the load_data function will execute every one minute
			}
		});
    }

	load_data("msgcount");
});