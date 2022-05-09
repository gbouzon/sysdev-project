<html>    
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>  
        <title>Summary Report</title>
    </head>
    <body>
        
        <div class='container' style='text-align:center;'>
            <?php
                $this->view('subviews/navigation');
            ?>
            <div>
                <br><h1>Summary Report of Product Inventory</h1> <br>
                <table class="table" style="text-align:center;">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <td><img alt = '' src = '\\pictures\\$product->product_image' style = 'max-width:200px;max-height:200px;' ></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($data as $product) {
                                echo "<tr>
                                        <td>$product->product_id</td>
                                        <td><img alt = '' src = '\\pictures\\$product->product_image' style = 'max-width:200px;max-height:200px;' ></td>
                                        <td>$product->product_name</td>
                                        <td>$product->description</td>
                                        <td>$$product->price</td>
                                        <td>$product->quantity</td>
                                    </tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>