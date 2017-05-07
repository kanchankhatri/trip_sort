$(document).ready(function(){
	$('#arrange_trip').click(function(){
		// $('#trip_plan').replaceWith('Loading...')
		$.ajax({
			method: "GET",
			'url':"/index.php/arrange_tickets",
		}).done(function(res){
			$('#trip_plan').replaceWith(res);
			$('#arrange_trip').addClass('disabled');
		});
	})
});