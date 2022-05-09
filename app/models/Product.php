<?php
    namespace app\models;

        class Product extends \app\core\Model {

            function __construct() {
                parent::__construct();
            }
               
            function get($product_id) {
                $SQL = 'SELECT * FROM product WHERE product_id = :product_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['product_id'=>$product_id]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Product");
                return $STMT->fetch();
            }
        
            function insert() {
                $SQL = 'INSERT INTO product(product_name, product_image, price, description, quantity) 
                VALUES(:product_name, :product_image, :price, :description, :quantity)';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['product_name'=>$this->product_name, 'product_image'=>$this->product_image,
                'price'=>$this->price, 'description'=>$this->description, 'quantity'=>$this->quantity]);
            }

            function delete() {
                $SQL = 'DELETE FROM product WHERE product_id = :product_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['product_id'=>$this->product_id]);
            }

            function update() {
                $SQL = 'UPDATE product SET product_name = :product_name, product_image = :product_image, price = :price, 
                description = :description, quantity = :quantity WHERE product_id = :product_id';
    
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['product_name'=>$this->product_name, 'product_image'=>$this->product_image, 
                'price'=>$this->price, 'description'=>$this->description, 'quantity'=>$this->quantity, 'product_id' =>$this->product_id]);
            }

            function getProducts() {
                $SQL = 'SELECT * FROM product';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute();
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Product");
                return $STMT->fetchAll();
            }

            function getProductsByName($term) {
                $SQL = 'SELECT * FROM product WHERE product_name LIKE :term';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['term'=>"%$term%"]);
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Product");
                return $STMT->fetchAll();
            } 
        }