<html>
    <head>
            <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/app/public/css/navbar.css"> 
        <link rel="stylesheet" type="text/css" href="/app/public/css/summary.css">    
               
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <title>Cart</title>
    </head>
    <body>
        <div class='container'>
            <?php
                $this->view('subviews/navigation');
            ?>
            <br> <h1 class="text-center" id="title">Your Cart</h1> <br>
            <table class="table table-striped" style='text-align:center;'>
                <tr><th></th><th id="title">Name</th><th id="title">Quantity</th><th id="title">Price</th><th id="title">Action</th></tr>
                <?php
                    $sum = 0; 
                    if ($data != null) {
                        foreach ($data as $order_detail) {
                            $product = new \app\models\Product();
                            $product = $product->get($order_detail->product_id);
                            echo " <tr><td><img alt = '' src = '\\pictures\\$product->product_image' style = 'max-width:200px;max-height:200px;' ></td>
                                <td id='title'>$product->product_name</td><td id='title'>$order_detail->quantity</td><td id='title'>$$order_detail->price</td>
                                <td><a class = 'btn btn-success' href='/Cart/deleteFromCart/$order_detail->order_detail_id' onclick='return confirm(\"Are you sure?\");' class='m-2'>Delete</a></td></tr>";
                            
                            $sum += $order_detail->price;     
                        }
                        echo " <tr><th id='title'>Subtotal</th><th></th><th></th><th></th><th>$ $sum</th></tr>";
                    }
                    else 
                        echo "<tr><td colspan = '5' id='title'>Your cart is empty!</td></tr>";      
                ?>
            </table>

            <?php 
                if ($data != null) { 
                    echo "<a href='/Cart/clearCart/$order_detail->order_id' class='btn btn-success'>Clear Cart</a>
                        <a href='' class='btn btn-success'>Place Order</a>";
                }
            ?>
        </div>
    </body>
</html>