<head>
	<script src="jquery-3.6.0.min.js"></script>	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function() {
     
		    $(".fa-search").click(function() {
		       $(".search-box").toggle();
		       $("input[type='text']").focus();
		     });
 
 		});		
	</script>
</head>
<link rel="stylesheet" type="text/css" href="/app/styles/header.css">

<div class="header">
	<div class="left">
		<a class="link" href='/Main/index'>The Gentlemen's Touch</a>
	</div>

	<div class="right">
		
		<?php 
			if (!isset($_SESSION['user_id'])) { ?>
			<a class="link" href='/User/register'>Register</a>
			<a class="link" href='/User/login'>Log in</a>
			<a class="link" href='/User/register'>Discover</a>
		<?php } else { ?>
			<a class="link" href='/User/logout'>Log out</a>
			
			<?php $user_id = $_SESSION['user_id']; ?> 
			
			<a class="account" href='/User/index'>
			<?php 
				$user = new \app\models\User();
				$username = $user->getFromUserId($_SESSION['user_id'])->username;
				echo $username;
			?>
			</a>
			<a class="link" href='/Wishlist/index'>Wishlist</a>	
			<a class="link" href='/Sales_Details/index'>Cart</a>
			<?php } ?>
			

	</div>
	<div class="searchBox">	
					<form method="post" action='/Items/search'>
					<input type="text" name="search" />
					<input type="submit" value="Search!" />
				</form>
				</div>
</div> 



