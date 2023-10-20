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
		<div id="msg">
		</div>
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
						accept: 'application/json',
						success:function(response)
						{
							$(form).trigger("reset");	
							$('#msg').html('Done!');
							$('#msg').css('color', 'green');
						},
						error: function(data) {
							let parsedErrors = data.responseJSON.errors;
							let output = "Error!";
							for (element in parsedErrors)
							{
								output += " " + parsedErrors[element];
							}
							$('#msg').html(output);
							$('#msg').css('color', 'red');

						}
					});
				});
			});
		</script>
	</body>
</html>
