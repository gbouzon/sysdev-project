<html>
	<head>
	   
		<!-- CSS only -->
		<link rel="stylesheet" type="text/css" href="/app/public/css/navbar.css">
		<link rel="stylesheet" type="text/css" href="/app/public/css/register.css">
			<title>Registration</title>
	</head>
	<body style = 'overflow:scroll;'>
		<?php
			$this->view("subviews/navbar");
		?>
		<div class='container'>
			<h1 id="title">Register Here!</h1>
			<form method='post' action=''>
				<div id="name">
					First Name:</div><label class='form-label'><input type='text' name='first_name' class='form-control' required/></label><br>
				<div id="Contact">
					Last Name:</div><label class='form-label'><input type='tel' name='last_name' class='form-control' required/></label><br>
				<div id="password">
				<div id="email">
					Email:</div><label class='form-label'><input type='email' name='email' class='form-control'required /></label><br>
					Password:</div><label class='form-label'><input type='password' name='password' class='form-control' required/></label><br>
				<div id="password">
				Password Confirmation:</div><label class='form-label'><input type='password' name='password_confirm' class='form-control' required/></label><br>

				<input type="submit" name='action' value='Register!' class='form-control' />
			</form>
			<div class='signup-link'>
			Already have an account?<a href="/User/login">Login</a> <br>
			<?php
				if ($data)
					echo "<div style='color:red;'class='alert alert-danger' role='alert'> $data</div>";
				?>
			</div>
		</div>
	</body>
</html>