<?php
    namespace app\controllers;

        class Main extends \app\core\Controller {

            //displays products 
            public function index() { 
                $product = new \app\models\Product();
                $products = $product->getProducts();
                $this->view('Main/index', $products);
            }

            //home page with shop now button
            public function home() {
                $this->view('Main/home');
            }

            public function summary() {
                $product = new \app\models\Product();
                $products = $product->getProducts();
                $this->view('Main/summary', $products);
            }

            //for image uploads
            public static function imageUpload($file_uploaded) {
                $filename = false;
                $file = $_FILES[$file_uploaded];
        
                $acceptedTypes = ['image/jpeg'=>'jpg', 'image/gif'=>'gif', 'image/png'=>'png'];
 
                if (empty($file['tmp_name'])) {
                    return false;
                }
        
                $fileData = getimagesize($file['tmp_name']); 
                if ($fileData && in_array($fileData['mime'],array_keys($acceptedTypes))) {
                    $folder = 'pictures';
                    $filename = uniqid() . '.' . $acceptedTypes[$fileData['mime']];
                    move_uploaded_file($_FILES[$file_uploaded]['tmp_name'],"$folder\\$filename");
                }
        
                return $filename;
            }
        }