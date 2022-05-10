<link rel="stylesheet" type="text/css" href="/app/public/css/navbar.css">
<ul class="menu">
    <li class="logo"><a href='/Main/home'>The Gentlemen's Touch</a></li>
    <?php if (!isset($_SESSION['user_id'])) { ?>
		<li class="item button"><a href='/User/login'>Log in</a></li>
            <li class="item button secondary"><a href='/User/register'>Register</a></li>
            
           
        <?php } else if (isset($_SESSION['role'])) { ?> 
        
            <li class="item"><a href='/User/index/<?=$_SESSION['user_id']?>'>My Profile</a></li>
            <li class="item"><a href='/User/logout'>Log out</a></li>
            <li class="item"><a onclick='window.print();'>Print Page</a></li>
            <?php if ($_SESSION['role'] == '0') { ?>
                        <li><a href='/Cart/index'>Cart</a></li>
            <?php } else if ($_SESSION['role'] == '1') { ?>
            
                    
                    <li><a href='/Main/products'>Manage Products</a></li>
                    <li><a href='/Main/summary'>View Inventory</a></li>
                    <li><a href='/Product/create'>Add Product</a></li>
            <?php } }?> 

       
</ul>