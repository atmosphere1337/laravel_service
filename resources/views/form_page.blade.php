<html>
	<head>
		
	</head>
	<body>
		<div>
			Form page
		</div>
		<form method="POST" action="/process" id="ajax_form">
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
	</body>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function(){
			let form = '#ajax_form';
			$(form).on('submit', function(event){
				event.preventDefault();
				let url = $(this).attr('data-action');
				$.ajax({
					url: url,
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
					}
					error:function(response)
					{
					
					}

					
				});
			});
		});
	</script>
</html>
