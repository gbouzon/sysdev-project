<head>
    <title>Products</title>
    <link rel="stylesheet" type="text/css" href="/app/public/css/products.css"> 
    <link rel="stylesheet" type="text/css" href="/app/public/css/force.css"> 
        
</head>

<body style = "background-color: #302c3c;overflow:scroll;">
    <h2 class = "text-center" style="text-align:center;white-space:pre-wrap;color:white;">Our Products:</h2><br><br>
    <p style="text-align:center;white-space:pre-wrap;color:white;">Feel great, have a fresh scent with sophisticated aroma, and keep your beard healthy.</p> <br> <br>
    <div class="row" style='text-align:center;'>
        <?php
            $this->view('subviews/productsList', $data);
        ?>
    </div>
</body>