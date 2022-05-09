<!DOCTYPE html>
<html>
	<head>
		<!-- CSS only -->
		<link rel="stylesheet" type="text/css" href="/app/public/css/login.css">
		
		
	<title>Login</title>
	</head>
	<body>
		<div class='container'>
			
			<h1 id="title">Log into your user account</h1>
			<form method='post' action=''>
			<div id="name">
			Email:</div><label class='form-label'><input type='text' name='email' class='form-control' /></label><br>
			<div id="password">
			Password:</div><label class='form-label'><input type='password' name='password' class='form-control' /></label><br>
			<input class = 'btn btn-primary' type="submit" name='action' value='Login!' class='form-control' /><br>
			</form>
			<div class='signup-link'>
			No account?<a href="/User/register">Register here!</a> <br>
			</div>
			<?php
				if ($data)
					echo "<div class='alert alert-danger' role='alert'> $data</div>";
			?>	
		</div>
	</body>
</html>