<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
	<div class="collapse navbar-collapse" >
		<ul class="navbar-nav">
			<li class="nav-item active"><a class="nav-link" href='/Main/home' style = "color:white;font-family:'Times New Roman', Times, serif; font-size:25px;text-align:center;white-space:pre-wrap;">The Gentlemen's Touch</a></li>
			<?php
				if (!isset($_SESSION['user_id'])) {
					//registration
					echo "<li class= \"nav-item active\" ><a class= \"nav-link\" href='/User/register'>Register</a></li>";
					//login
					echo "<li class= \"nav-item active\" ><a class= \"nav-link\" href='/User/login'>Log in</a></li>";
					
				} 
				else if (isset($_SESSION['role'])) {
					echo "<li class=\"nav-item active\"><a class= \"nav-link\" href='/User/index/".$_SESSION['user_id']."'>My Profile</a></li>";
					echo "<li class=\"nav-item active\"><a class= \"nav-link\" href='/User/logout'>Log out</a></li>";
					echo "<li class=\"nav-item active\"><a class= \"nav-link\" onclick='window.print();'>Print Page</a></li>";

					if ($_SESSION['role'] == '0') {
						echo "<li class=\"nav-item active\"><a class= \"nav-link\" href='/Cart/index'>Cart</a></li>";
					}
					else if ($_SESSION['role'] == '1') {
						echo "<li class=\"nav-item active\"><a class= \"nav-link\" href='/Main/products'>Manage Products</a></li>";
						echo "<li class=\"nav-item active\"><a class= \"nav-link\" href='/Main/summary'>View Inventory</a></li>";
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