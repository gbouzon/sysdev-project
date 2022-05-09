<html>
	<head>
		<!-- CSS only -->
		<link rel="stylesheet" type="text/css" href="/app/public/css/register.css">
			<title>Registration</title>
	</head>
	<body>
	<div class='container'>

<h1 id="title"><?= _("Register Here!") ?></h1>
<form method='post' action=''>
<div id="name">
<?= _("Username") ?></div><label class='form-label'><input type='text' name='username' class='form-control' required/></label><br>
<div id="password">
<?= _("Password") ?></div><label class='form-label'><input type='password' name='password' class='form-control' required/></label><br>
<div id="password">
<?= _("Password confirmation") ?></div><label class='form-label'><input type='password' name='password_confirm' class='form-control' required/></label><br>
<div id="email">
<?= _("Email") ?></div><label class='form-label'><input type='email' name='email' class='form-control'required /></label><br>
<div id="Contact">
<?= _("Contact") ?></div><label class='form-label'><input type='tel' name='contact' class='form-control' required/></label><br>
	<input type="submit" name='action' value='Register!' class='form-control' />
</form>
<div class='signup-link'>
<?= _("Already have an account? ") ?> <a href="/User/login"><?= _("Login here!") ?></a> <br>
<?php
				if ($data)
					echo "<div class='alert alert-danger' role='alert'> $data</div>";
			?>
</div>
</div>
		

	</body>
</html>