<html>
	<head>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
	</head>
	<body>
		<div>
			Form page
		</div>
		<form method="POST" action="/process" id="send_form">
			@csrf
			<div>
				<input name="name">
			</div>
			<div>
				<input name="number">
			</div>
			<div>
				<input name="mail">
			</div>
			<div>
				<input type="submit">
			</div>
		</form>
		<form method="POST" action="/process">
			@csrf
			<div>
				<input name="name">
			</div>
			<div>
				<input name="number">
			</div>
			<div>
				<input name="mail">
			</div>
			<div>
				<input type="submit">
			</div>
		</form>
		<script>
			$(document).ready(function(){
				let form = '#send_form';
				$(form).on('submit', function(event){
					event.preventDefault();
					$.ajax({
						url: $(this).attr('action'),
						method: 'POST',
						data: new FormData(this),
						dataType: 'JSON',
						contentType: false,
						cache: false,
						processData: false,
						success:function(response)
						{
							$(form).trigger("reset");	
							alert(response.success);
						},
						error: function(xhr, status, error) {
							alert('server_error');
						}
					});
				});
			});
		</script>
	</body>
</html>
