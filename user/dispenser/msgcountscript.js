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
				setTimeout(load_data("msgcount"), 2000); //the load_data function will execute every two seconds
			}
		});
    }

    load_data("msgcount");
});