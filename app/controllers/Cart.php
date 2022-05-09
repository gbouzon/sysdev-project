<?php
    namespace app\controllers;

        #[\app\filters\Login]
        class Cart extends \app\core\Controller {

            public function index() {
                $cart = new \app\models\Order();
                $cart = $cart->getUserCart($_SESSION['user_id']);

                $products = new \app\models\OrderDetail();
                $products = $products->getOrder($cart->order_id);
                $this->view('Cart/index', $products);
            }

            public function createCart() {
                $cart = new \app\models\Order();
                $cart->user_id = $_SESSION['user_id'];
                $cart->order_status = 0; 
                $cart->order_id = $cart->create();
            }

            public function addToCart($product_id) {
                $product = new \app\models\Product();
                $product = $product->get($product_id);

                if ($product->quantity >= 1) {

                    $order = new \app\models\Order();
                    $order = $order->getUserCart($_SESSION['user_id']);


                    $newProduct = new \app\models\OrderDetail();
                    $newProduct->order_id = $order->order_id;
                    $newProduct->product_id = $product_id;
                    $newProduct->quantity = 1;
                    
                    $newProduct->unit_price = $product->price;
                    $newProduct->price = $product->price;
                    $newProduct->insert();

                    $product->quantity -= 1;
                    $product->update();
                    header('location:/Main/index/');
                }
                else 
                    header('location:/Main/index/'); 
            }

            public function deleteFromCart($order_detail_id) {
                $detail = new \app\models\OrderDetail();
                $detail = $detail->get($order_detail_id);

                $order= new \app\models\Order();
                $order = $order->get($detail->order_id);

                $product = new \app\models\Product();
                $product = $product->get($detail->product_id);

                if ($order->user_id == $_SESSION['user_id']) {
                    if ($detail->quantity != 1) {
                        $detail->quantity = $detail->quantity - 1;
                        $detail->price = $detail->price - $detail->unit_price;
                        $detail->updatePriceAndQty();
                    }
                    else 
                        $detail->delete(); 

                    $product->quantity += 1;
                    $product->update();
                    
                }
                header('location:/Cart/Index');   
            }

            public function clearCart($order_id) {
                $this->clear($order_id);
                header('location:/Cart/Index');   
            }

            public function clear($order_id) {
                $cart_products = new \app\models\OrderDetail();
                $cart_products = $cart_products->getOrder($order_id);

                $product = new \app\models\Product();
               
                $order= new \app\models\Order();
                $order = $order->get($order_id);

                if ($order->user_id == $_SESSION['user_id']) {
                    foreach ($cart_products as $item) {
                        $item->delete();  
                        $product = $product->get($item->product_id);
                        $product->quantity += $item->quantity;
                        $product->update();
                    }
                }
            }
        }