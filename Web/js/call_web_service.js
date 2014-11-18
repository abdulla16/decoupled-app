function callService() {
	$.ajax({
		type: $("#requestType").val(),
		data: $("#data").val(),
		url: "/api/" + $("#serviceName").val()
	}).done(function(result) {
		
		$("#results").html(JSON.stringify(result));
	});
}
