<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
	<div class="collapse navbar-collapse" >
		<ul class="navbar-nav">
			<li class="nav-item active"><a class="nav-link" href='/Main/index'><?=_("Home")?></a></li>
			<?php
				if (!isset($_SESSION['user_id'])) {
					//registration
					echo "<li class= \"nav-item active\" ><a class= \"nav-link\" href='/User/register'>" . _("Register") ."</a></li>";
					//login
					echo "<li class= \"nav-item active\" ><a class= \"nav-link\" href='/User/login'>" . _("Log in") ."</a></li>";
				}else {
					if(!isset($_SESSION['store_id'])){
						echo "<li class=\"nav-item active\"><a class= \"nav-link\" href='/User/index/".$_SESSION['user_id']."'>" . _("My Profile") ."</a></li>";
						echo "<li class=\"nav-item active\"><a class= \"nav-link\" href='/Cart/index'>" . _("Cart") ."</a></li>";
						echo "<li class=\"nav-item active\"><a class= \"nav-link\" href='/User/logout'>" . _("Log out") ."</a></li>";
					} else{
						echo "<li class=\"nav-item active\"><a class= \"nav-link\" href='/User/index/".$_SESSION['user_id']."'>" . _("My Profile") ."</a></li>";
						echo "<li class=\"nav-item active\"><a class= \"nav-link\" href='/User/logout'>" . _("Log out") ."</a></li>";
					}
				}
				
				$this->view('Search/index');
			?>
		</ul>
	</div>
</nav>

<?php
	$searcher = new \app\controllers\Search();
	$searcher->searchProducts();
?>


