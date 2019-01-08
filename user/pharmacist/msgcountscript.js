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
			}
		});
    }

	load_data("msgcount");
});
//this file is to display new badge in pharmacist homepage in view reports card