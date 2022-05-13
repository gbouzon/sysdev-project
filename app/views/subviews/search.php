<html>
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
        <title>Home page</title>
    </head>
    <body style = "background-color:#302c3c;">
        <div class='container'>
            <br> <h1 style = 'color:white;' class="text-center">Search</h1> <br>
            <?php
                if ($data != null) {
                    $this->view('subviews/products', $data);
                }
                else 
                    echo "<h3 style = 'color:white;text-align:center;'>The search returned no results.</h3><br>";
            ?>
        </div>    
    </body>
</html>