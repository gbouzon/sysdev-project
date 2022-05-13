<html>
    <head>
        <!-- CSS only -->
        <link rel="stylesheet" type="text/css" href="/app/public/css/navbar.css">
		<link rel="stylesheet" type="text/css" href="/app/public/css/adminupdate.css">
		
           <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <title id="pu">Profile update</title>
    </head>
    <body style = 'overflow:scroll;'>
        <?php
            $this->view("subviews/navbar");
        ?>
        <div class='container' >
            <h1 id="title">Update your profile</h1><br>
            <form method='post' action='' enctype = 'multipart/form-data'>
                <label class='form-label'>First name:<input type='text' name='first_name' class='form-control' value='<?= $data->first_name ?>' /></label>
                <label class='form-label'>Last name:<input type='text' name='last_name' class='form-control' value='<?= $data->last_name ?>' /></label> <br>
                <label class='form-label'>Email:<input type='text' name='email' class='form-control' value='<?= $data->email ?>' readonly /></label><br>
                <input class = 'signup-link' type="submit" name='action' value='Update!' class='form-control' />
            </form>
        </div>
    </body>
</html>