<?php
    namespace app\controllers;

        class Search extends \app\core\Controller {

            public function searchProducts() { //figure out what this entails
                $product = new \app\models\Product();
                if (isset($_POST['search'])) {
                    $products = $product->getProductsByName(trim($_POST['search']));

                    if (isset($_POST['action'])) 
                        $this->view('subviews/search', $products);

                        
                }
            }
        }