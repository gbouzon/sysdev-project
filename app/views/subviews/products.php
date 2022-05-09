<body style = "background-color: #302c3c;">
    <h2 class = "text-center" style="text-align:center;white-space:pre-wrap;color:white;">Our Products:</h2><br><br>
    <p style="text-align:center;white-space:pre-wrap;color:white;">Feel great, have a fresh scent with sophisticated aroma, and keep your beard healthy.</p> <br> <br>
    <div class="row" style='text-align:center;'>
        <?php
            if ($data != null) {
                foreach ($data as $product) {
                    echo "<div class='col-lg-3 d-flex align-items-stretch'>
                    <div class='card' style='width: 18rem;text-align:center;'>
                        <img class=\"card-img-top\" alt = '' src = '\\pictures\\$product->product_image' style = 'width:280px;max-height:700px;display:block;margin-left:auto;margin-right:auto;'> 
                        <div class='card-body' style = 'background-color:#302c3c;'> 
                        <h5 class=\"card-title\"> <a href = '/Product/index/$product->product_id'>$product->product_name</a> </h5>
                        <h6 class=\"card-subtitle mb-2 text-muted\">Price: from $$product->price CAD</h6> <br>";

                        if (isset($_SESSION['role'])) {
                            if ($_SESSION['role'] == '0') {
                                if ($product->quantity >= 1)
                                    echo "<a class=\"btn btn-primary\" href='/Cart/addToCart/$product->product_id' 
                                        onclick='return confirm('Product successfully added to cart! ')' class='m-2'>Add to Cart </a> </div> </div></div>";
                                else 
                                    echo "<a class='btn btn-outline-secondary'>Out of Stock</a>
                                    </div> </div></div>";
                                
                            }
                            else if ($_SESSION['role'] == '1') {
                                echo "<a class=\"btn btn-primary\" href='/Product/update/$product->product_id' 
                                        class='m-2'>Update Product </a> <br> <br>

                                        <a class=\"btn btn-primary\" href='/Product/delete/$product->product_id' 
                                        class='m-2'>Delete Product </a> </div> </div></div>";
                            }
                        }
                        else {
                            if ($product->quantity >= 1)
                                    echo "<a class=\"btn btn-primary\" href='/Cart/addToCart/$product->product_id' 
                                        onclick='return confirm('Product successfully added to cart! ')' class='m-2'>Add to Cart </a> </div> </div></div>";
                            else {
                                echo "<a class='btn btn-outline-secondary'>Out of Stock</a>
                                </div> </div></div>";
                            }
                        }
                }
            }
            if ($_SESSION['role'] == '1') {
                echo " <br> <br><a class=\"btn btn-primary\" href='/Product/create/' 
                        class='m-2'>Add Product </a>";
            }
            else if ($data == null)
                echo "<h3>No products have been added!</h3>";
        ?>
    </div>
</body>