<?php
    namespace app\controllers;

        class Product extends \app\core\Controller {

            public function index($product_id) { 
                $myProduct = new \app\models\Product();
                $product = $myProduct->get($product_id);
                $this->view('Product/index', $product);
            }

            #[\app\filters\Admin] //to be implemented
            public function create() {
                    if (!isset($_POST['action'])) { 
                        $this->view('Product/create');
                    }
                    else { 
                        $filename = Main::imageUpload("product_image");

                        if (!$filename)
                            $filename = 'blank.png';
                            
                        $product = new \app\models\Product();
                        $product->product_name = trim($_POST['product_name']);
                        $product->product_image = $filename; 
                        $product->price = trim($_POST['product_price']);
                        $product->description = trim($_POST['product_description']);
                        $product->quantity = $_POST['product_quantity'];

                        $product->insert();
                        header("location:/Product/index/". $product->product_id);
                    }
            }

            #[\app\filters\Admin]
            public function update($product_id) {
                $product = new \app\models\Product(); 
                $product = $product->get($product_id);
                if (!isset($_POST['action'])) {	
                    $this->view('Product/update', $product);
               }
                else {
                    $filename = Main::imageUpload("product_image");
                    if ($filename) {
                        if ($product->product_image != 'blank.png')
                            unlink('pictures\\' . $product->product_image);

                        $product->product_image = $filename;
                    }

                    $product->product_name = trim($_POST['product_name']);
                    $product->price = trim($_POST['product_price']);
                    $product->description = trim($_POST['product_description']);
                    $product->quantity = trim($_POST['product_quantity']);

                    $product->update($product_id);        
                    header("location:/Product/index/". $product->product_id);
                }
            }

            #[\app\filters\Admin]
            public function delete($product_id) {
                $product = new \app\models\Product(); 
                $product = $product->get($product_id);
                if ($product->product_image != 'blank.png')
                    unlink('pictures\\' . $product->product_image);
                        
                $product->delete();
            } 
        }