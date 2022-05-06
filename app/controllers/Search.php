<?php
    namespace app\controllers;

        class Search extends \app\core\Controller {

            public function searchProducts() { //figure out what this entails
                $product = new \app\models\Product();
                $products = $product->getProducts(trim($_POST['search']));

                if (isset($_POST['action'])) 
                    $this->view('subviews/search', $products);
            }
        }