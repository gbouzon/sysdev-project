<html>    
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/app/public/css/navbar.css"> 
        <link rel="stylesheet" type="text/css" href="/app/public/css/summary.css">    
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>  
        <title>Summary Report</title>
    </head>
    <body>
            <?php
                $this->view('subviews/navigation');
            ?>
           <div class='container' >
                <br><h1 id="title">Summary Report of Product Inventory</h1> <br>
                <table class="table" style="text-align:center;">
                    <thead>
                        <tr>
                        <th scope="col" id="title">#</th>
                        <th scope="col" id="title">Image</th>
                        <th scope="col" id="title">Name</th>
                        <th scope="col" id="title">Description</th>
                        <th scope="col" id="title">Price</th>
                        <th scope="col" id="title">Quantity</th>
                        <td><img alt = '' src = '\\pictures\\$product->product_image' style = 'max-width:200px;max-height:200px;' ></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($data as $product) {
                                echo "<tr>
                                        <td id='title'>$product->product_id</td>
                                        <td><img alt = '' src = '\\pictures\\$product->product_image' style = 'max-width:200px;max-height:200px;' ></td>
                                        <td id='title'>$product->product_name</td>
                                        <td id='title'>$product->description</td>
                                        <td id='title'>$$product->price</td>
                                        <td id='title'>$product->quantity</td>
                                    </tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>