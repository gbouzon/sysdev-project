<html>
    <head>
        <!-- CSS only -->
        <link rel="stylesheet" type="text/css" href="/app/public/css/navbar.css">  
        <link rel="stylesheet" type="text/css" href="/app/public/css/update.css">   
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <title><?= $data->first_name . " " . $data->last_name?></title>
    </head>
    <body> 
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
            <?php } }?> 

       
</ul>

        <div class='containers'>
            
            <div style = 'text-align:center;'>
                <h1 id="title">Your Profile</h1>
                <form method='post' action=''>
                <div id="name">
                First name:</div><label class='form-labels'><input  disabled type='text' name='first_name' class='form-control' value = '<?= $data->first_name?>' /></label>
                <div id="Contact">
                Last name:</div><label class='form-labels'><input  disabled type='text' name='last_name' class='form-control'value = '<?= $data->last_name?>'  /></label> <br>
                <div id="email">
                Email:</div><label class='form-labels'><input  disabled type='email' name='email' class='form-control' value = '<?= $data->email?>' /></label><br>
                    
                </form> 
                <div class="">
                <?php

                    if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $data->user_id) {
                        echo "<a class=\"update-link\" href='/User/update/$data->user_id' class='update-link' >". "Update User" ." </a>";

                        if (isset($_SESSION['role']) && $_SESSION['role'] != '1') 
                            echo "&ensp;<a class=\"delete-link\" href='/User/delete/$data->user_id' class='delete-link' >". "Delete User" ."</a>";
                    }
                   
            echo "</div>"; 
            
                ?>
            </div>
        </div>
    </body>
</html>