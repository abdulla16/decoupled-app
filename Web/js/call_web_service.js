function callService() {
	var data = null;
	
	switch($("#requestType").val().toLowerCase()) {
		case "get":
		case "post":
			data = "data=" + $("#data").val();
			break;
		case "put":
		case "delete":
			data = $("#data").val();
			break;
	}
	
	$.ajax({
		type: $("#requestType").val(),
		data: data,
		url: "/api/" + $("#serviceName").val()
	}).done(function(result) {
		
		$("#results").html(JSON.stringify(result));
	});

}
